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
use App\Models\User;
use App\Models\BarangayResident;
use App\Models\BarangayClearanceCertificate;
use App\Models\BarangayOfficial;

class BarangayClearanceCertificateController extends Controller
{
    public function viewBarangayClearanceCertificate(){
        $barangayClearanceCertificateDetails = BarangayClearanceCertificate::with('resident_info.user_info')->where('is_deleted', 0)->orderBy('id', 'desc')->get();
        // return $barangayClearanceCertificateDetails;
        return DataTables::of($barangayClearanceCertificateDetails)

            ->addColumn('action', function($row){
                if($row->status != 4){ // 1-Approved, 2-Processing, 3-Pending, 4-Disapproved
                    $result ='<center>';
                    $result .=   '<button type="button" class="btn btn-primary btn-xs text-center actionEditBarangayClearanceCertificate mr-1" barangay-clearance-certificate-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#modalAddBarangayClearanceCertificate" title="Edit Details">';
                    $result .=       '<i class="fa fa-xl fa-edit"></i>';
                    $result .=   '</button>';
                    $result .=   '<a href="barangay_clerance_pdf/'.$row->id.'" class="btn btn-info btn-xs text-center actionPrintBarangayClearanceCertificate mr-1" barangay-clearance-certificate-id="' . $row->id . '" title="Print Certificate">';
                    $result .=       '<i class="fa fa-xl fa-print"></i>';
                    $result .=   '</a>';
                    $result .='</center>';
                }
                else{
                    $result ='<center>';
                    $result .=   '<button type="button" class="btn btn-primary btn-xs text-center actionEditBarangayClearanceCertificate mr-1" barangay-clearance-certificate-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#modalAddBarangayClearanceCertificate" title="Edit Details">';
                    $result .=       '<i class="fa fa-xl fa-edit"></i>';
                    $result .=   '</button>';
                    // $result .=   '<button type="button" class="btn btn-info btn-xs text-center actionViewBarangayClearanceCertificate mr-1" barangay-clearance-certificate-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#modalViewBarangayClearanceCertificate" title="Print Certificate">';
                    // $result .=       '<i class="fa fa-xl fa-print"></i>';
                    // $result .=   '</button>';
                    $result .='</center>';
                }
                return $result;
            })
            ->addColumn('gender', function($row){
                $result = "";
                if($row->resident_info->gender == 1){
                    $result .= '<center><span>Male</span></center>';
                }
                else if($row->resident_info->gender == 2){
                    $result .= '<center><span>Female</span></center>';
                }
                else{
                    $result .= '<center><span>Other</span></center>';
                }
                return $result;
            })
            ->addColumn('civil_status', function($row){
                // 1-Single, 2-Married, 3-Widow/er, 4-Annulled, 5-Legally Separated, 6-Others
                $result = "";
                if($row->resident_info->civil_status == 1){
                    $result .= '<center><span>Single</span></center>';
                }
                else if($row->resident_info->civil_status == 2){
                    $result .= '<center><span>Married</span></center>';
                }
                else if($row->resident_info->civil_status == 3){
                    $result .= '<center><span>Widow/er</span></center>';
                }
                else if($row->resident_info->civil_status == 4){
                    $result .= '<center><span>Annulled</span></center>';
                }
                else if($row->resident_info->civil_status == 5){
                    $result .= '<center><span>Legally Separated</span></center>';
                }
                else if($row->resident_info->civil_status == 6){
                    $result .= '<center><span>Others</span>';
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
            ->addColumn('ticket_datetime', function($row){
                $result = "";
                $result .= Carbon::parse($row->ticket_datetime)->format('M d, Y');
                return $result;
            })
        ->rawColumns(['action', 'gender', 'civil_status', 'status'])
        ->make(true);
    }

    public function addBarangayClearanceCertificate(Request $request){
        date_default_timezone_set('Asia/Manila');
        session_start();

        $data = $request->all();
        /* For Insert */
        if(!isset($request->barangay_clearance_certificate_id)){
            $validator = Validator::make($data, [
                'barangay_resident_id' => 'required',
                'purpose' => 'required',
                'or_number' => 'required',
                'amount_collection' => 'required',
                'issued_on' => 'required',
                // 'status' => 'required',
                // 'remarks' => 'required',
                
                'issuance_configuration_id' => 'required',
                'total_amount_paid' => 'required',
                'cedula_processing_time' => 'required',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['validationHasError' => 1, 'error' => $validator->messages()]);
            } else {
                DB::beginTransaction();
                
                try {
                    $barangayClearanceId = BarangayClearanceCertificate::insertGetId([
                        'barangay_resident_id' => $request->barangay_resident_id,
                        'purpose' => $request->purpose,
                        'or_number' => $request->or_number,
                        'amount_collection' => $request->amount_collection,
                        'issued_on' => $request->issued_on,
                        'remarks' => $request->remarks,
                        'status' => $request->status, // 1-Approved, 2-Processing, 3-Pending, 4-Disapproved
                        'created_at' => date('Y-m-d H:i:s'),
                        'created_by' => $_SESSION["session_user_id"],
                        'is_deleted' => 0,

                        'issuance_configuration_id' => $request->issuance_configuration_id,
                        'total_amount_paid' => $request->total_amount_paid,
                    ]);

                    $ticketDate = date("Y-m-d");
                    $ticketNumber = "TN-" . date("Ymd") .'-'. $barangayClearanceId;
                    BarangayClearanceCertificate::where('id', $barangayClearanceId)->update([
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
            $validator = Validator::make($data, [
                'barangay_resident_id' => 'required',
                'purpose' => 'required',
                'or_number' => 'required',
                'amount_collection' => 'required',
                'issued_on' => 'required',
                // 'status' => 'required',
                // 'remarks' => 'required',

                'issuance_configuration_id' => 'required',
                'total_amount_paid' => 'required',
                'cedula_processing_time' => 'required',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['validationHasError' => 1, 'error' => $validator->messages()]);
            } else {
                DB::beginTransaction();
                try {
                    BarangayClearanceCertificate::where('id', $request->barangay_clearance_certificate_id)->update([
                        'barangay_resident_id' => $request->barangay_resident_id,
                        'purpose' => $request->purpose,
                        'or_number' => $request->or_number,
                        'amount_collection' => $request->amount_collection,
                        'issued_on' => $request->issued_on,
                        'remarks' => $request->remarks,
                        'status' => $request->status, // 1-Approved, 2-Processing, 3-Pending, 4-Disapproved
                        'updated_at' => date('Y-m-d H:i:s'),
                        'last_updated_by' => $_SESSION["session_user_id"],

                        'issuance_configuration_id' => $request->issuance_configuration_id,
                        'total_amount_paid' => $request->total_amount_paid,
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

    public function getBarangayClearanceCertificateById(Request $request){
        $barangayClearanceCertificateDetails = BarangayClearanceCertificate::with('issuance_configuration_info')->where('id', $request->barangayClearanceCertificateId)->get();
        return response()->json(['barangayClearanceCertificateDetails' => $barangayClearanceCertificateDetails]);
    }

    /**
     * PDF
     */
    public function barangay_clerance_pdf(Request $request, $id)
    {
        // $barangayResidentDetails = BarangayResident::with('user_info', 'barangay_resident_blotter_details')->where('is_deleted', 0)->orderBy('id', 'desc')->get();
        $barangayResidentDetails = BarangayClearanceCertificate::with(['resident_info.user_info', 'issuance_configuration_info'])
                                ->where('id', $id)
                                ->where('is_deleted', 0)->orderBy('id', 'desc')
                                ->get();

        $officialsDetails = BarangayOfficial::where('position', 1)->where('is_deleted', 0)->orderBy('id', 'desc')
                                ->get();

        // $first_name = $barangayResidentDetails[2]->firstname;
        // $middle_initial = $barangayResidentDetails[2]->middle_initial;
        // $lastname = $barangayResidentDetails[2]->lastname;
        // $age = $barangayResidentDetails[2]->age;
        // $address = $barangayResidentDetails[2]->address;

        // $first_middle_array = array($first_name,$middle_initial);
        // $imploded_first_middle = implode(" ",$first_middle_array);
        // $name_lastname_array = array($lastname,$imploded_first_middle);

        // $imploded_name = implode(", ",$name_lastname_array);

        // return $imploded_name;

        // return $barangayResidentDetails;

        $data = [
            'repub_title' => 'REPUBLIC OF THE PHILIPPINES',
            'province_title' => 'PROVINCE OF LAGUNA',
            'city_title' => 'CITY OF CALAMBA',
            'brgy_title' => "BARANGAY IV",
            'telephone_title' => "Telephone No.: (049)-502-6234",
            'data' => $barangayResidentDetails,
            'officialsDetails' => $officialsDetails,
            // 'name' => $imploded_name,
            // 'age' => $age,
            // 'address' => $address,
        ];

        $pdf = PDF::loadView('barangay_clearance_pdf', $data);

        // $pdf->setPaper('A5', 'Landscape');
        return $pdf->stream('Barangay Clearance PDF File'.".pdf");
    }

    public function barangay_clearance_certificates_report_pdf(Request $request)
    {
        $barangayClearanceCertificatesDetails = BarangayClearanceCertificate::with(['resident_info.user_info', 'issuance_configuration_info'])
            ->get();
        // return $barangayClearanceCertificatesDetails;
        $data = [
            'repub_title' => 'REPUBLIC OF THE PHILIPPINES',
            'province_title' => 'PROVINCE OF LAGUNA',
            'city_title' => 'CITY OF CALAMBA',
            'brgy_title' => "BARANGAY IV",
            'telephone_title' => "Telephone No.: (049)-502-6234",
            'data' => $barangayClearanceCertificatesDetails,
        ];

        $pdf = PDF::loadView('barangay_clearance_certificate_report_pdf', $data);

        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('Brgy. Clearance Certificate Report PDF File'.".pdf");
    }

    /**
     * For User
     * Requests Certificate
     */

    public function viewRequestBarangayClearanceCertificate(Request $request){
        $userId = $request->userId;
        $barangayClearanceCertificateDetails = BarangayClearanceCertificate::with('resident_info.user_info')
        ->whereHas('resident_info.user_info', function($query) use($userId){
            $query->where('id', $userId);
        })
        ->where('is_deleted', 0)
        ->orderBy('id', 'desc')
        ->get();
        // return $barangayClearanceCertificateDetails;
        return DataTables::of($barangayClearanceCertificateDetails)
            ->addColumn('gender', function($row){
                $result = "";
                if($row->resident_info->gender == 1){
                    $result .= '<center><span>Male</span></center>';
                }
                else if($row->resident_info->gender == 2){
                    $result .= '<center><span>Female</span></center>';
                }
                else{
                    $result .= '<center><span>Other</span></center>';
                }
                return $result;
            })
            ->addColumn('civil_status', function($row){
                // 1-Single, 2-Married, 3-Widow/er, 4-Annulled, 5-Legally Separated, 6-Others
                $result = "";
                if($row->resident_info->civil_status == 1){
                    $result .= '<center><span>Single</span></center>';
                }
                else if($row->resident_info->civil_status == 2){
                    $result .= '<center><span>Married</span></center>';
                }
                else if($row->resident_info->civil_status == 3){
                    $result .= '<center><span>Widow/er</span></center>';
                }
                else if($row->resident_info->civil_status == 4){
                    $result .= '<center><span>Annulled</span></center>';
                }
                else if($row->resident_info->civil_status == 5){
                    $result .= '<center><span>Legally Separated</span></center>';
                }
                else if($row->resident_info->civil_status == 6){
                    $result .= '<center><span>Others</span>';
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
                    $result .= '<center><span class="badge badge-pill text-secondary">Pending</span></center>';
                }
                else if($row->status == 4){
                    $result .= '<center><span class="badge badge-pill badge-danger">Disapproved</span></center>';
                }
                else{
                    $result .= '<center><span class="badge badge-pill text-secondary" style="background-color: #E6E6E6">Pending</span></center>';
                }
                return $result;
            })
            ->addColumn('ticket_datetime', function($row){
                $result = "";
                $result .= Carbon::parse($row->ticket_datetime)->format('M d, Y');
                return $result;
            })
        ->rawColumns(['gender', 'civil_status', 'status'])
        ->make(true);
    }

    public function addRequestBarangayClearanceCertificate(Request $request){
        date_default_timezone_set('Asia/Manila');
        session_start();
        
        $data = $request->all();
        
        $barangayResidentId = BarangayResident::
            where('user_id', $request->user_id)
            ->value('id');
            // return $barangayResidentId;
            
        /* For Insert */
        if(!isset($request->request_barangay_clearance_certificate_id)){
            $validator = Validator::make($data, [
                'user_id' => 'required',
                'purpose' => 'required',
                // 'or_number' => 'required',
                // 'amount_collection' => 'required',
                // 'issued_on' => 'required',
                // 'status' => 'required',
                // 'remarks' => 'required',
                'issuance_configuration_id' => 'required',
                'total_amount_paid' => 'required',
                'cedula_processing_time' => 'required',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['validationHasError' => 1, 'error' => $validator->messages()]);
            } else {
                DB::beginTransaction();
                
                try {
                    $barangayClearanceCertificateId = BarangayClearanceCertificate::insertGetId([
                        'barangay_resident_id' => $barangayResidentId,
                        'purpose' => $request->purpose,
                        'issuance_configuration_id' => $request->issuance_configuration_id,
                        'total_amount_paid' => $request->total_amount_paid,
                        // 'or_number' => $request->or_number,
                        // 'amount_collection' => $request->amount_collection,
                        // 'issued_on' => $request->issued_on,
                        'remarks' => $request->remarks,
                        'status' => 3, // 1-Approved, 2-Processing, 3-Pending, 4-Disapproved
                        'created_at' => date('Y-m-d H:i:s'),
                        'created_by' => $_SESSION["session_user_id"],
                        'is_deleted' => 0
                    ]);

                    $ticketDate = date("Y-m-d");
                    $ticketNumber = "TN-" . date("Ymd") .'-'. $barangayClearanceCertificateId;
                    BarangayClearanceCertificate::where('id', $barangayClearanceCertificateId)->update([
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
        }
    }
}
