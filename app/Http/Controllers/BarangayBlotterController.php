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

/**
 * Import Models here
 */
use App\Models\User;
use App\Models\BarangayBlotter;

class BarangayBlotterController extends Controller
{
    public function viewBarangayBlotter(){
        $barangayBlotterDetails = BarangayBlotter::with('user_info')->where('is_deleted', 0)->orderBy('id', 'desc')->get();
        return DataTables::of($barangayBlotterDetails)
            ->addColumn('status', function($row){
                $result = "";
                if($row->status == 1){
                    $result .= '<center><span class="badge badge-pill badge-success">Active</span></center>';
                }
                else{
                    $result .= '<center><span class="badge badge-pill text-secondary" style="background-color: #E6E6E6">Inactive</span></center>';
                }
                return $result;
            })
            ->addColumn('action', function($row){
                if($row->status == 1){
                    $result ='<center>';
                    // $result .=   '<button type="button" class="btn btn-info btn-xs text-center actionViewBarangayBlotter mr-1" barangay-blotter-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#modalViewBarangayBlotter" title="View Details">';
                    // $result .=       '<i class="fa fa-xl fa-eye"></i>';
                    // $result .=   '</button>';
                    $result .=   '<button type="button" class="btn btn-primary btn-xs text-center actionEditBarangayBlotter mr-1" barangay-blotter-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#modalAddBarangayBlotter" title="Edit Details">';
                    $result .=       '<i class="fa fa-xl fa-edit"></i>';
                    $result .=   '</button>';
                    // $result .=   '<button type="button" class="btn btn-danger btn-xs text-center actionEditBarangayBlotterStatus mr-1" barangay-blotter-id="' . $row->id . '" barangay-blotter-status="' . $row->status . '" data-bs-toggle="modal" data-bs-target="#modalEditBarangayBlotterStatus" title="Disable">';
                    // $result .=       '<i class="fa-solid fa-xl fa-ban"></i>';
                    // $result .=   '</button>';
                    $result .='</center>';
                }
                else{
                    $result =   '<center>
                                <button type="button" class="btn btn-primary btn-xs text-center actionEditBarangayBlotter mr-1" barangay-blotter-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#modalAddBarangayBlotter" title="Edit Details">
                                    <i class="fa fa-xl fa-edit"></i> 
                                </button>
                            </center>';
                }
                return $result;
            })
        ->rawColumns(['status', 'action'])
        ->make(true);
    }

    public function addBarangayBlotter(Request $request){
        date_default_timezone_set('Asia/Manila');
        session_start();
        
        $data = $request->all();
        /* For Insert */
        if(!isset($request->barangay_blotter_id)){
            $validator = Validator::make($data, [
                'case_number' => 'required',
                'user_id' => 'required',
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
                
                $date = date_create("$request->birthdate");
                $birthdate = date_format($date,"Y-m-d");
                try {
                    $barangayBlotterId = BarangayBlotter::insertGetId([
                        'case_number' => $request->case_number,
                        'user_id' => $request->user_id,
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
                'user_id' => 'required',
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
                    BarangayBlotter::where('id', $request->barangay_blotter_id)->update([
                        'case_number' => $request->case_number,
                        'user_id' => $request->user_id,
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

    public function getBarangayBlotterById(Request $request){
        $barangayBlotterDetails = BarangayBlotter::where('id', $request->barangayBlotterId)->get();
        return response()->json(['barangayBlotterDetails' => $barangayBlotterDetails]);
    }
    
}
