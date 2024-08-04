<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Auth; // or use Illuminate\Support\Facades\Auth;
use DataTables;
use Illuminate\Support\Facades\Storage;

use PDF;
use DOMElement;
use DOMXPath;
use Dompdf\Dompdf;
use Dompdf\Helpers;
use Dompdf\Exception;
use Dompdf\FontMetrics;

/**
 * Import Models here
 */
use App\Models\BarangayResident;
use App\Models\Cedula;
use App\Models\IssuanceConfiguration;

class CedulaController extends Controller
{
    public function viewCedula(){
        $cedulaDetails = Cedula::with([
                'resident_info.user_info',
                'issuance_configuration_info'
            ])
            ->where('is_deleted', 0)
            ->orderBy('id', 'desc')
            ->get();
        // return $cedulaDetails;
        return DataTables::of($cedulaDetails)

            ->addColumn('action', function($row){
                if($row->status != 4){ // 1-To be claimed, 2-Processing, 3-Pending, 4-Disapproved
                    $result ='<center>';
                    $result .=   '<button type="button" class="btn btn-primary btn-xs text-center actionEditCedula mr-1" cedula-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#modalAddCedula" title="Edit Details">';
                    $result .=       '<i class="fa fa-xl fa-edit"></i>';
                    $result .=   '</button>';
                    // $result .=   '<a href="cedula_pdf/'.$row->id.'" class="btn btn-info btn-xs text-center actionPrintBarangayClearanceCertificate mr-1" barangay-clearance-certificate-id="' . $row->id . '" title="Print Certificate">';
                    // $result .=       '<i class="fa fa-xl fa-print"></i>';
                    // $result .=   '</a>';
                    $result .='</center>';
                }
                else{
                    $result ='<center>';
                    $result .=   '<button type="button" class="btn btn-primary btn-xs text-center actionEditCedula mr-1" cedula-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#modalAddCedula" title="Edit Details">';
                    $result .=       '<i class="fa fa-xl fa-edit"></i>';
                    $result .=   '</button>';
                    $result .='</center>';
                }
                return $result;
            })
            ->addColumn('status', function($row){
                // 1-Approved, 2-Processing, 3-Pending, 4-Disapproved
                $result = "";
                if($row->status == 1){
                    $result .= '<center><span class="badge badge-pill badge-success">To be claimed</span></center>';
                }
                else if($row->status == 2){
                    $result .= '<center><span class="badge badge-pill badge-primary">Processing</span></center>';
                }
                else if($row->status == 3){
                    $result .= '<center><span class="badge badge-pill badge-secondary">Pending</span></center>';
                }
                else if($row->status == 4){
                    $result .= '<center><span class="badge badge-pill badge-danger">Disapproved</span></center>';
                }
                else{
                    $result .= '<center><span class="badge badge-pill text-secondary" style="background-color: #E6E6E6">Pending</span></center>';
                }
                return $result;
            })
            ->addColumn('processing_time', function($row){
                $result = "";
                if($row->issuance_configuration_info->processing_time == 1){
                    $result .= '<center><span class="badge badge-pill badge-info">1 Day</span></center>';
                }
                else if($row->issuance_configuration_info->processing_time == 2){
                    $result .= '<center><span class="badge badge-pill badge-info">2 Days</span></center>';
                }
                else if($row->issuance_configuration_info->processing_time == 3){
                    $result .= '<center><span class="badge badge-pill badge-info">3 Days</span></center>';
                }
                else if($row->issuance_configuration_info->processing_time == 4){
                    $result .= '<center><span class="badge badge-pill badge-info">4 Days</span></center>';
                }
                else if($row->issuance_configuration_info->processing_time == 5){
                    $result .= '<center><span class="badge badge-pill badge-info">5 Days</span></center>';
                }
                else if($row->issuance_configuration_info->processing_time == 6){
                    $result .= '<center><span class="badge badge-pill badge-info">1 Week</span></center>';
                }
                else if($row->issuance_configuration_info->processing_time == 7){
                    $result .= '<center><span class="badge badge-pill badge-info">2 Weeks</span></center>';
                }
                else if($row->issuance_configuration_info->processing_time == 8){
                    $result .= '<center><span class="badge badge-pill badge-info">3 Weeks</span></center>';
                }
                else if($row->issuance_configuration_info->processing_time == 9){
                    $result .= '<center><span class="badge badge-pill badge-info">1 Month</span></center>';
                }
                else{
                    $result .= '<center><span class="badge badge-pill text-secondary" style="background-color: #E6E6E6">Other</span></center>';
                }
                return $result;
            })
        ->rawColumns(['action', 'status', 'processing_time'])
        ->make(true);
    }

    public function addCedula(Request $request){
        date_default_timezone_set('Asia/Manila');
        session_start();
        
        $data = $request->all();
        /* For Insert */
        if(!isset($request->cedula_id)){
            $validator = Validator::make($data, [
                'barangay_resident_id' => 'required',
                // 'purok' => 'required',
                // 'block' => 'required',
                // 'lot' => 'required',
                // 'street' => 'required',
                // 'nationality' => 'required',
                'birth_place' => 'required',
                'gender' => 'required',
                'civil_status' => 'required',
                'cedula_number' => 'required',
                'or_number' => 'required',
                'height' => 'required',
                'weight' => 'required',
                'date_issued' => 'required',
                'issued_at' => 'required',
                'status' => 'required',

                'issuance_configuration_id' => 'required',
                'total_amount' => 'required',
                'cedula_processing_time' => 'required',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['validationHasError' => 1, 'error' => $validator->messages()]);
            } else {
                DB::beginTransaction();
                
                $status = isset($request->status) ? $request->status : 3;// 1-Approved, 2-Processing, 3-Pending, 4-Disapproved
                try {
                    $cedulaId = Cedula::insertGetId([
                        'barangay_resident_id' => $request->barangay_resident_id,
                        'issuance_configuration_id' => $request->issuance_configuration_id,
                        'cedula_number' => $request->cedula_number,
                        'or_number' => $request->or_number,
                        'height' => $request->height,
                        'weight' => $request->weight,
                        'tin_number' => $request->tin_number,
                        'date_issued' => $request->date_issued,
                        'issued_at' => $request->issued_at,
                        'total_amount' => $request->total_amount,
                        'status' => $status,
                        'created_at' => date('Y-m-d H:i:s'),
                        'created_by' => $_SESSION["session_user_id"],
                        'is_deleted' => 0
                    ]);

                    $ticketDate = date("Y-m-d");
                    $ticketNumber = "TN-" . date("Ymd") .'-'. $cedulaId;
                    Cedula::where('id', $cedulaId)->update([
                        'ticket_number' => $ticketNumber,
                        'ticket_datetime' => $ticketDate,
                    ]);

                    DB::commit();
                    return response()->json(['hasError' => 0]);
                } catch (\Exception $e) {
                    DB::rollback();
                    return response()->json(['hasError' => 1, 'exceptionError' => $e]);
                }
            }
        }else{ /* For Update */
            // return $data;
            $validator = Validator::make($data, [
                'barangay_resident_id' => 'required',
                // 'purok' => 'required',
                // 'block' => 'required',
                // 'lot' => 'required',
                // 'street' => 'required',
                // 'nationality' => 'required',
                'birth_place' => 'required',
                'gender' => 'required',
                'civil_status' => 'required',
                'cedula_number' => 'required',
                'or_number' => 'required',
                'height' => 'required',
                'weight' => 'required',
                'date_issued' => 'required',
                'issued_at' => 'required',
                'status' => 'required',

                'issuance_configuration_id' => 'required',
                'total_amount' => 'required',
                'cedula_processing_time' => 'required',
            ]);
            
            if ($validator->fails()) {
                return response()->json(['validationHasError' => 1, 'error' => $validator->messages()]);
            } else {
                DB::beginTransaction();
                try {
                    Cedula::where('id', $request->cedula_id)->update([
                        'barangay_resident_id' => $request->barangay_resident_id,
                        'issuance_configuration_id' => $request->issuance_configuration_id,
                        'cedula_number' => $request->cedula_number,
                        'or_number' => $request->or_number,
                        'height' => $request->height,
                        'weight' => $request->weight,
                        'tin_number' => $request->tin_number,
                        'date_issued' => $request->date_issued,
                        'issued_at' => $request->issued_at,
                        'total_amount' => $request->total_amount,
                        'status' => $request->status,
                        'updated_at' => date('Y-m-d H:i:s'),
                        'last_updated_by' => $_SESSION["session_user_id"]
                    ]);

                    DB::commit();
                    return response()->json(['hasError' => 0]);
                } catch (\Exception $e) {
                    DB::rollback(); 
                    return response()->json(['hasError' => 1, 'exceptionError' => $e]);
                }
            }
        }
    }

    public function getIssuanceConfiguration(Request $request){
        $issuanceConfigurationDetails = IssuanceConfiguration::where('name',$request->id)->get();
        return response()->json(['issuanceConfigurationDetails' => $issuanceConfigurationDetails]);
    }

    public function getCedulaById(Request $request){
        $cedulaDetails = Cedula::with('issuance_configuration_info')->where('id', $request->cedulaId)->get();
        return response()->json(['cedulaDetails' => $cedulaDetails]);
    }

    /**
     * For User
     * Requests Cedula
     */
    public function viewRequestCedula(Request $request){
        $userId = $request->userId;
        // return $userId;
        $cedulaDetails = Cedula::with(['resident_info.user_info', 'issuance_configuration_info'])
        ->whereHas('resident_info.user_info', function($query) use($userId){
            $query->where('id', $userId);
        })
        ->where('is_deleted', 0)
        ->orderBy('id', 'desc')
        ->get();
        // return $cedulaDetails;
        return DataTables::of($cedulaDetails)
            // ->addColumn('action', function($row){
            //     if($row->status != 4){ // 1-To be claimed, 2-Processing, 3-Pending, 4-Disapproved
            //         $result ='<center>';
            //         $result .=   '<button type="button" class="btn btn-primary btn-xs text-center actionEditCedula mr-1" cedula-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#modalAddCedula" title="Edit Details">';
            //         $result .=       '<i class="fa fa-xl fa-edit"></i>';
            //         $result .=   '</button>';
            //         // $result .=   '<a href="cedula_pdf/'.$row->id.'" class="btn btn-info btn-xs text-center actionPrintBarangayClearanceCertificate mr-1" barangay-clearance-certificate-id="' . $row->id . '" title="Print Certificate">';
            //         // $result .=       '<i class="fa fa-xl fa-print"></i>';
            //         // $result .=   '</a>';
            //         $result .='</center>';
            //     }
            //     else{
            //         $result ='<center>';
            //         $result .=   '<button type="button" class="btn btn-primary btn-xs text-center actionEditCedula mr-1" cedula-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#modalAddCedula" title="Edit Details">';
            //         $result .=       '<i class="fa fa-xl fa-edit"></i>';
            //         $result .=   '</button>';
            //         $result .='</center>';
            //     }
            //     return $result;
            // })
            ->addColumn('status', function($row){
                // 1-Approved, 2-Processing, 3-Pending, 4-Disapproved
                $result = "";
                if($row->status == 1){
                    $result .= '<center><span class="badge badge-pill badge-success">To be claimed</span></center>';
                }
                else if($row->status == 2){
                    $result .= '<center><span class="badge badge-pill badge-primary">Processing</span></center>';
                }
                else if($row->status == 3){
                    $result .= '<center><span class="badge badge-pill badge-secondary">Pending</span></center>';
                }
                else if($row->status == 4){
                    $result .= '<center><span class="badge badge-pill badge-danger">Disapproved</span></center>';
                }
                else{
                    $result .= '<center><span class="badge badge-pill text-secondary" style="background-color: #E6E6E6">Pending</span></center>';
                }
                return $result;
            })
            ->addColumn('processing_time', function($row){
                $result = "";
                if($row->issuance_configuration_info->processing_time == 1){
                    $result .= '<center><span class="badge badge-pill badge-info">1 Day</span></center>';
                }
                else if($row->issuance_configuration_info->processing_time == 2){
                    $result .= '<center><span class="badge badge-pill badge-info">2 Days</span></center>';
                }
                else if($row->issuance_configuration_info->processing_time == 3){
                    $result .= '<center><span class="badge badge-pill badge-info">3 Days</span></center>';
                }
                else if($row->issuance_configuration_info->processing_time == 4){
                    $result .= '<center><span class="badge badge-pill badge-info">4 Days</span></center>';
                }
                else if($row->issuance_configuration_info->processing_time == 5){
                    $result .= '<center><span class="badge badge-pill badge-info">5 Days</span></center>';
                }
                else if($row->issuance_configuration_info->processing_time == 6){
                    $result .= '<center><span class="badge badge-pill badge-info">1 Week</span></center>';
                }
                else if($row->issuance_configuration_info->processing_time == 7){
                    $result .= '<center><span class="badge badge-pill badge-info">2 Weeks</span></center>';
                }
                else if($row->issuance_configuration_info->processing_time == 8){
                    $result .= '<center><span class="badge badge-pill badge-info">3 Weeks</span></center>';
                }
                else if($row->issuance_configuration_info->processing_time == 9){
                    $result .= '<center><span class="badge badge-pill badge-info">1 Month</span></center>';
                }
                else{
                    $result .= '<center><span class="badge badge-pill text-secondary" style="background-color: #E6E6E6">Other</span></center>';
                }
                return $result;
            })
        ->rawColumns(['action', 'status', 'processing_time'])
        ->make(true);
    }

    public function getResidentForCedulaByUserId(Request $request){
        $userId = $request->userId;
        // return $userId;
        $cedulaDetails = BarangayResident::with(['user_info', 'barangay_resident_blotter_details'])
        ->whereHas('user_info', function($query) use($userId){
            $query->where('id', $userId);
        })
        ->where('is_deleted', 0)
        ->orderBy('id', 'desc')
        ->get();
        
        return response()->json(['cedulaDetails' => $cedulaDetails]);
    }

    public function addRequestCedula(Request $request){
        date_default_timezone_set('Asia/Manila');
        session_start();
        
        $data = $request->all();

        $barangayResidentId = BarangayResident::
            where('user_id', $request->user_id)
            ->value('id');

        /* For Insert */
        if(!isset($request->cedula_id)){
            $validator = Validator::make($data, [
                'user_id' => 'required',
                // 'purok' => 'required',
                // 'block' => 'required',
                // 'lot' => 'required',
                // 'street' => 'required',
                // 'nationality' => 'required',
                'birth_place' => 'required',
                'gender' => 'required',
                'civil_status' => 'required',
                // 'cedula_number' => 'required',
                // 'or_number' => 'required',
                'height' => 'required',
                'weight' => 'required',
                // 'date_issued' => 'required',
                // 'issued_at' => 'required',
                // 'status' => 'required',

                'issuance_configuration_id' => 'required',
                'total_amount' => 'required',
                'cedula_processing_time' => 'required',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['validationHasError' => 1, 'error' => $validator->messages()]);
            } else {
                DB::beginTransaction();
                
                $status = isset($request->status) ? $request->status : 3;// 1-Approved, 2-Processing, 3-Pending, 4-Disapproved
                try {
                    $cedulaId = Cedula::insertGetId([
                        'barangay_resident_id' => $barangayResidentId,
                        'issuance_configuration_id' => $request->issuance_configuration_id,
                        'cedula_number' => $request->cedula_number,
                        'or_number' => $request->or_number,
                        'height' => $request->height,
                        'weight' => $request->weight,
                        'tin_number' => $request->tin_number,
                        'date_issued' => $request->date_issued,
                        'issued_at' => $request->issued_at,
                        'total_amount' => $request->total_amount,
                        'status' => $status,
                        'created_at' => date('Y-m-d H:i:s'),
                        'created_by' => $_SESSION["session_user_id"],
                        'is_deleted' => 0
                    ]);

                    $ticketDate = date("Y-m-d");
                    $ticketNumber = "TN-" . date("Ymd") .'-'. $cedulaId;
                    Cedula::where('id', $cedulaId)->update([
                        'ticket_number' => $ticketNumber,
                        'ticket_datetime' => $ticketDate,
                    ]);

                    DB::commit();
                    return response()->json(['hasError' => 0]);
                } catch (\Exception $e) {
                    DB::rollback();
                    return response()->json(['hasError' => 1, 'exceptionError' => $e]);
                }
            }
        }else{ /* For Update */
            // return $data;
            $validator = Validator::make($data, [
                'user_id' => 'required',
                // 'purok' => 'required',
                // 'block' => 'required',
                // 'lot' => 'required',
                // 'street' => 'required',
                'nationality' => 'required',
                'birth_place' => 'required',
                'gender' => 'required',
                'civil_status' => 'required',
                // 'cedula_number' => 'required',
                // 'or_number' => 'required',
                'height' => 'required',
                'weight' => 'required',
                // 'date_issued' => 'required',
                // 'issued_at' => 'required',
                // 'status' => 'required',

                'issuance_configuration_id' => 'required',
                'total_amount' => 'required',
                'cedula_processing_time' => 'required'
            ]);
            
            if ($validator->fails()) {
                return response()->json(['validationHasError' => 1, 'error' => $validator->messages()]);
            } else {
                DB::beginTransaction();
                try {
                    Cedula::where('id', $request->cedula_id)->update([
                        'barangay_resident_id' => $barangayResidentId,
                        'issuance_configuration_id' => $request->issuance_configuration_id,
                        'cedula_number' => $request->cedula_number,
                        'or_number' => $request->or_number,
                        'height' => $request->height,
                        'weight' => $request->weight,
                        'tin_number' => $request->tin_number,
                        'date_issued' => $request->date_issued,
                        'issued_at' => $request->issued_at,
                        'total_amount' => $request->total_amount,
                        'status' => $request->status,
                        'updated_at' => date('Y-m-d H:i:s'),
                        'last_updated_by' => $_SESSION["session_user_id"]
                    ]);

                    DB::commit();
                    return response()->json(['hasError' => 0]);
                } catch (\Exception $e) {
                    DB::rollback(); 
                    return response()->json(['hasError' => 1, 'exceptionError' => $e]);
                }
            }
        }
    }
}
