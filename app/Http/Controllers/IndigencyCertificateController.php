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
use App\Models\IndigencyCertificate;
use App\Models\BarangayResident;
use App\Models\BarangayOfficial;

class IndigencyCertificateController extends Controller
{
    public function viewIndigencyCertificate(){
        $indigencyCertificateDetails = IndigencyCertificate::with('resident_info.user_info')->where('is_deleted', 0)->orderBy('id', 'desc')->get();
        // return $indigencyCertificateDetails;
        return DataTables::of($indigencyCertificateDetails)

            ->addColumn('action', function($row){
                if($row->status != 4){ // 1-Approved, 2-Processing, 3-Pending, 4-Disapproved
                    $result ='<center>';
                    $result .=   '<button type="button" class="btn btn-primary btn-xs text-center actionEditIndigencyCertificate mr-1" indigency-certificate-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#modalAddIndigencyCertificate" title="Edit Details">';
                    $result .=       '<i class="fa fa-xl fa-edit"></i>';
                    $result .=   '</button>';
                    $result .=   '<a href="indigency_certificate_pdf/'.$row->id.'" class="btn btn-info btn-xs text-center actionPrintBarangayClearanceCertificate mr-1" barangay-clearance-certificate-id="' . $row->id . '" title="Print Certificate">';
                    $result .=       '<i class="fa fa-xl fa-print"></i>';
                    $result .=   '</a>';
                    $result .='</center>';
                }
                else{
                    $result ='<center>';
                    $result .=   '<button type="button" class="btn btn-primary btn-xs text-center actionEditIndigencyCertificate mr-1" indigency-certificate-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#modalAddIndigencyCertificate" title="Edit Details">';
                    $result .=       '<i class="fa fa-xl fa-edit"></i>';
                    $result .=   '</button>';
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
        ->rawColumns(['action', 'gender', 'civil_status', 'status'])
        ->make(true);
    }

    public function viewAuditTrail(){
        $viewAuditTrailDetails = BarangayResident::with([
            'user_info',
            'barangay_clearance_details.issuance_configuration_info',
            'indigency_details.issuance_configuration_info',
            'residency_details.issuance_configuration_info',
            'registration_details.issuance_configuration_info',
            'license_permit_details.issuance_configuration_info',
            'cedula_details.issuance_configuration_info',
        ])->where('is_deleted', 0)->orderBy('id', 'desc')->get();
        return $viewAuditTrailDetails;
        return DataTables::of($viewAuditTrailDetails)
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
        ->rawColumns(['action', 'gender', 'civil_status', 'status'])
        ->make(true);
    }

    public function addIndigencyCertificate(Request $request){
        date_default_timezone_set('Asia/Manila');
        session_start();
        
        $data = $request->all();
        /* For Insert */
        if(!isset($request->indigency_certificate_id)){
            $validator = Validator::make($data, [
                'barangay_resident_id' => 'required',
                'purpose' => 'required',
                'or_number' => 'required',
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
                
                $status = isset($request->status) ? $request->status : 3;// 1-Approved, 2-Processing, 3-Pending, 4-Disapproved
                try {
                    $indigencyId = IndigencyCertificate::insertGetId([
                        'barangay_resident_id' => $request->barangay_resident_id,
                        'purpose' => $request->purpose,
                        'or_number' => $request->or_number,
                        'issued_on' => $request->issued_on,
                        'remarks' => $request->remarks,
                        'status' => $status,
                        'created_at' => date('Y-m-d H:i:s'),
                        'created_by' => $_SESSION["session_user_id"],
                        'is_deleted' => 0,

                        'issuance_configuration_id' => $request->issuance_configuration_id,
                        'total_amount_paid' => $request->total_amount_paid,
                    ]);

                    $ticketDate = date("Y-m-d");
                    $ticketNumber = "TN-" . date("Ymd") .'-'. $indigencyId;
                    IndigencyCertificate::where('id', $indigencyId)->update([
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
                    IndigencyCertificate::where('id', $request->indigency_certificate_id)->update([
                        'barangay_resident_id' => $request->barangay_resident_id,
                        'purpose' => $request->purpose,
                        'or_number' => $request->or_number,
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

    public function getIndigencyCertificateById(Request $request){
        $indigencyCertificateDetails = IndigencyCertificate::with('issuance_configuration_info')->where('id', $request->indigencyCertificateId)->get();
        return response()->json(['indigencyCertificateDetails' => $indigencyCertificateDetails]);
    }

    public function indigency_certificate_pdf(Request $request, $id)
    {
        $barangayResidentDetails = IndigencyCertificate::with('resident_info.user_info')
                                ->where('id', $id)
                                ->where('is_deleted', 0)->orderBy('id', 'desc')
                                ->get();

        $officialsDetails = BarangayOfficial::where('position', 1)->where('is_deleted', 0)->orderBy('id', 'desc')
        ->get();
        // return $barangayResidentDetails;
        $first_name = $barangayResidentDetails[0]->resident_info->user_info->firstname;
        $middle_initial = $barangayResidentDetails[0]->resident_info->user_info->middle_initial;
        $lastname = $barangayResidentDetails[0]->resident_info->user_info->lastname;
        $age = $barangayResidentDetails[0]->resident_info->age;
        $address = $barangayResidentDetails[0]->resident_info->address;

        $first_middle_array = array($first_name,$middle_initial);
        $imploded_first_middle = implode(" ",$first_middle_array);
        $name_lastname_array = array($lastname,$imploded_first_middle);

        $imploded_name = implode(", ",$name_lastname_array);

        // return $imploded_name;

        $data = [
            'repub_title' => 'REPUBLIC OF THE PHILIPPINES',
            'province_title' => 'PROVINCE OF LAGUNA',
            'city_title' => 'CITY OF CALAMBA',
            'brgy_title' => "BARANGAY IV",
            'telephone_title' => "Telephone No.: (049)-502-6234",
            'name' => $imploded_name,
            'age' => $age,
            'address' => $address,
            'data' => $barangayResidentDetails,
            'officialsDetails' => $officialsDetails,
        ];

        $pdf = PDF::loadView('indigency_certificate_pdf', $data);

        // return $pdf->download('itsolutionstuff.pdf');
        // $pdf->setPaper('A5', 'Landscape');
        return $pdf->stream('Indigency Certificacte PDF File'.".pdf");
    }

    public function indigency_certificates_report_pdf(Request $request)
    {
        $indigencyCertificatesDetails = IndigencyCertificate::with('resident_info.user_info')
            ->get();

            
        // return $indigencyCertificatesDetails;
        $data = [
            'repub_title' => 'REPUBLIC OF THE PHILIPPINES',
            'province_title' => 'PROVINCE OF LAGUNA',
            'city_title' => 'CITY OF CALAMBA',
            'brgy_title' => "BARANGAY IV",
            'telephone_title' => "Telephone No.: (049)-502-6234",
            'data' => $indigencyCertificatesDetails,
        ];

        $pdf = PDF::loadView('indigency_certificate_report_pdf', $data);

        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('Indigency Certificate Report PDF File'.".pdf");
    }

    /**
     * For User
     * Requests Certificate
     */
    public function viewRequestIndigencyCertificate(Request $request){
        $userId = $request->userId;
        $indigencyCertificateDetails = IndigencyCertificate::with('resident_info.user_info')
        ->whereHas('resident_info.user_info', function($query) use($userId){
            $query->where('id', $userId);
        })
        ->where('is_deleted', 0)
        ->orderBy('id', 'desc')
        ->get();
        return DataTables::of($indigencyCertificateDetails)
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
        ->rawColumns(['gender', 'civil_status', 'status'])
        ->make(true);
    }

    public function addRequestIndigencyCertificate(Request $request){
        date_default_timezone_set('Asia/Manila');
        session_start();
        
        $data = $request->all();
        
        $barangayResidentId = BarangayResident::
            where('user_id', $request->user_id)
            ->value('id');
            // return $barangayResidentId;
            
        /* For Insert */
        if(!isset($request->request_indigency_certificate_id)){
            $validator = Validator::make($data, [
                'user_id' => 'required',
                'purpose' => 'required',
                // 'or_number' => 'required',
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
                
                $status = isset($request->status) ? $request->status : 3;// 1-Approved, 2-Processing, 3-Pending, 4-Disapproved
                try {
                    $indigencyId = IndigencyCertificate::insertGetId([
                        'barangay_resident_id' => $barangayResidentId,
                        'purpose' => $request->purpose,
                        // 'or_number' => $request->or_number,
                        // 'issued_on' => $request->issued_on,
                        'remarks' => $request->remarks,
                        'status' => $status,
                        'created_at' => date('Y-m-d H:i:s'),
                        'created_by' => $_SESSION["session_user_id"],
                        'is_deleted' => 0,

                        'issuance_configuration_id' => $request->issuance_configuration_id,
                        'total_amount_paid' => $request->total_amount_paid,
                    ]);

                    $ticketDate = date("Y-m-d");
                    $ticketNumber = "TN-" . date("Ymd") .'-'. $indigencyId;
                    IndigencyCertificate::where('id', $indigencyId)->update([
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
