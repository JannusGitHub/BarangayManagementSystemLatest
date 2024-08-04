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
use App\Models\BarangayResidentBlotter;

class BarangayResidentBlotterController extends Controller
{
    public function viewBarangayResidentBlotter(Request $request){
        $barangayBlotterDetails = BarangayResidentBlotter::with( 'resident_info.user_info')
            ->where('is_deleted', 0)
            ->orderBy('id', 'desc')
            ->when($request->dateRangeFrom, function ($query) use ($request) {
                return $query ->where('created_at', '>=', $request->dateRangeFrom);
            })
            ->when($request->dateRangeTo, function ($query) use ($request) {
                return $query ->where('created_at', '<=', $request->dateRangeTo);
            })
            ->get();
        return DataTables::of($barangayBlotterDetails)
            ->addColumn('status', function($row){
                $result = "";
                if($row->status == 1){
                    $result .= '<center><span class="badge badge-pill badge-secondary">New</span></center>';
                }
                else if($row->status == 2){
                    $result .= '<center><span class="badge badge-pill badge-primary">On-Going</span></center>';
                }
                else if($row->status == 3){
                    $result .= '<center><span class="badge badge-pill badge-warning">Pending</span></center>';
                }
                else if($row->status == 4){
                    $result .= '<center><span class="badge badge-pill badge-info">Report</span></center>';
                }
                else if($row->status == 5){
                    $result .= '<center><span class="badge badge-pill badge-success">Solved</span></center>';
                }
                else if($row->status == 6){
                    $result .= '<center><span class="badge badge-pill badge-danger">Not Solved</span></center>';
                }
                // else{
                //     $result .= '<center><span class="badge badge-pill text-secondary" style="background-color: #E6E6E6">Inactive</span></center>';
                // }
                return $result;
            })
            ->addColumn('created_at', function($row){
                $result = "";
                $result .= Carbon::parse($row->created_at)->format('M d, Y h:ia');
                return $result;
            })
            ->addColumn('action', function($row){
                if($row->status == 1){
                    $result ='<center>';
                    // $result .=   '<button type="button" class="btn btn-info btn-xs text-center actionViewBarangayResidentBlotter mr-1" barangay-resident-blotter-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#modalViewBarangayResidentBlotter" title="View Details">';
                    // $result .=       '<i class="fa fa-xl fa-eye"></i>';
                    // $result .=   '</button>';
                    $result .=   '<button type="button" class="btn btn-primary btn-xs text-center actionEditBarangayResidentBlotter mr-1" barangay-resident-blotter-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#modalAddBarangayResidentBlotter" title="Edit Details">';
                    $result .=       '<i class="fa fa-xl fa-edit"></i>';
                    $result .=   '</button>';
                    $result .=   '<a href="barangay_blotter_pdf/'.$row->id.'" class="btn btn-info btn-xs text-center actionPrintBarangayBlotter mr-1" barangay-blotter-id="' . $row->id . '" title="Print Blotter">';
                    $result .=       '<i class="fa fa-xl fa-print"></i>';
                    $result .=   '</a>';
                    // $result .=   '<button type="button" class="btn btn-danger btn-xs text-center actionEditBarangayResidentBlotterStatus mr-1" barangay-resident-blotter-id="' . $row->id . '" barangay-resident-blotter-status="' . $row->status . '" data-bs-toggle="modal" data-bs-target="#modalEditBarangayResidentBlotterStatus" title="Disable">';
                    // $result .=       '<i class="fa-solid fa-xl fa-ban"></i>';
                    // $result .=   '</button>';
                    $result .='</center>';
                }
                else{
                    $result =   '<center>
                                <button type="button" class="btn btn-primary btn-xs text-center actionEditBarangayResidentBlotter mr-1" barangay-resident-blotter-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#modalAddBarangayResidentBlotter" title="Edit Details">
                                    <i class="fa fa-xl fa-edit"></i> 
                                </button>
                            </center>';
                }
                return $result;
            })
        ->rawColumns(['status', 'action', 'created_at'])
        ->make(true);
    }

    public function addBarangayResidentBlotter(Request $request){
        date_default_timezone_set('Asia/Manila');
        session_start();
        
        $data = $request->all();
        /* For Insert */
        if(!isset($request->barangay_resident_blotter_id)){
            // return $data;
            $validator = Validator::make($data, [
                'case_number' => 'required',
                'barangay_resident_id' => 'required',
                'complainant_statement' => 'required',
                'respondent' => 'required',
                'respondent_age' => 'required|string',
                'respondent_address' => 'required|string',
                'respondent_contact_number' => 'required|string',
                'person_involved' => 'required|string',
                'incident_location' => 'required|string',
                'incident_date' => 'required|string',
                'status' => 'required|string',
                'action_taken' => 'required|string',
                'remarks' => 'required|string', 
            ]);
    
            if ($validator->fails()) {
                return response()->json(['validationHasError' => 1, 'error' => $validator->messages()]);
            } else {
                DB::beginTransaction();
                try {
                    $barangayBlotterId = BarangayResidentBlotter::insertGetId([
                        'barangay_resident_id' => $request->barangay_resident_id,
                        'case_number' => $request->case_number,
                        'complainant_statement' => $request->complainant_statement,
                        'respondent' => $request->respondent,
                        'respondent_age' => $request->respondent_age,
                        'respondent_address' => $request->respondent_address,
                        'respondent_contact_number' => $request->respondent_contact_number,
                        'person_involved' => $request->person_involved,
                        'incident_location' => $request->incident_location,
                        'incident_date' => $request->incident_date,
                        'action_taken' => $request->action_taken,
                        'status' => $request->status,
                        'remarks' => $request->remarks,
                        'created_at' => date('Y-m-d H:i:s'),
                        'created_by' => $_SESSION["session_user_id"],
                        'is_deleted' => 0
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
                'case_number' => 'required',
                'barangay_resident_id' => 'required',
                'complainant_statement' => 'required',
                'respondent' => 'required',
                'respondent_age' => 'required|string',
                'respondent_address' => 'required|string',
                'respondent_contact_number' => 'required|string',
                'person_involved' => 'required|string',
                'incident_location' => 'required|string',
                'incident_date' => 'required|string',
                'status' => 'required|string',
                'action_taken' => 'required|string',
                'remarks' => 'required|string', 
            ]);
    
            if ($validator->fails()) {
                return response()->json(['validationHasError' => 1, 'error' => $validator->messages()]);
            } else {
                DB::beginTransaction();
                try {
                    BarangayResidentBlotter::where('id', $request->barangay_resident_blotter_id)->update([
                        'case_number' => $request->case_number,
                        'barangay_resident_id' => $request->barangay_resident_id,
                        'complainant_statement' => $request->complainant_statement,
                        'respondent' => $request->respondent,
                        'respondent_age' => $request->respondent_age,
                        'respondent_address' => $request->respondent_address,
                        'respondent_contact_number' => $request->respondent_contact_number,
                        'person_involved' => $request->person_involved,
                        'incident_location' => $request->incident_location,
                        'incident_date' => $request->incident_date,
                        'action_taken' => $request->action_taken,
                        'status' => $request->status,
                        'remarks' => $request->remarks,
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

    public function getBarangayResidentBlotterById(Request $request){
        $barangayResidentBlotterDetails = BarangayResidentBlotter::where('id', $request->barangayResidentBlotterId)->get();
        return response()->json(['barangayResidentBlotterDetails' => $barangayResidentBlotterDetails]);
    }

    public function blotter_report_pdf(Request $request)
    {
        $blotterDetails = BarangayResidentBlotter::with('resident_info.user_info')
            ->get();
        // return $blotterDetails;
        $data = [
            'repub_title' => 'REPUBLIC OF THE PHILIPPINES',
            'province_title' => 'PROVINCE OF LAGUNA',
            'city_title' => 'CITY OF CALAMBA',
            'brgy_title' => "BARANGAY IV",
            'telephone_title' => "Telephone No.: (049)-502-6234",
            'data' => $blotterDetails,
        ];

        $pdf = PDF::loadView('blotter_report_pdf', $data);

        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('Resident Report PDF File'.".pdf");
    }
    
    /**
     * PDF
     */
    public function barangay_blotter_pdf(Request $request, $id)
    {
        // $barangayResidentDetails = BarangayResident::with('user_info', 'barangay_resident_blotter_details')->where('is_deleted', 0)->orderBy('id', 'desc')->get();
        $barangayBlotterDetails = BarangayResidentBlotter::with('resident_info.user_info')
                                ->where('id', $id)
                                ->where('is_deleted', 0)->orderBy('id', 'desc')
                                ->get();
                                // dd($barangayBlotterDetails);

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
            'data' => $barangayBlotterDetails,
            // 'name' => $imploded_name,
            // 'age' => $age,
            // 'address' => $address,
        ];

        $pdf = PDF::loadView('barangay_blotter_pdf', $data);

        // $pdf->setPaper('A5', 'Landscape');
        return $pdf->stream('Barangay Blotter PDF File'.".pdf");
    }
}
