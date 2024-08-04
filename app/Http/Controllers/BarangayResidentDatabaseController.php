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
use App\Models\BarangayResidentDatabase;

class BarangayResidentDatabaseController extends Controller
{
    public function viewBarangayResidentDatabase(){
        $barangayResidentDatabaseDetails = BarangayResidentDatabase::where('is_deleted', 0)->orderBy('id', 'desc')->get();
        
        return DataTables::of($barangayResidentDatabaseDetails)
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
                    $result =   '<center>
                                <button type="button" class="btn btn-primary btn-xs text-center actionEditBarangayResidentDatabase mr-1" barangay-resident-database-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#modalAddBarangayResidentDatabase" title="Edit Details">
                                    <i class="fa fa-xl fa-edit"></i> 
                                </button>
                                <button type="button" class="btn btn-danger btn-xs text-center actionEditBarangayResidentDatabaseStatus mr-1" barangay-resident-database-id="' . $row->id . '" barangay-resident-database-status="' . $row->status . '" data-bs-toggle="modal" data-bs-target="#modalEditBarangayResidentDatabaseStatus" title="Disable">
                                    <i class="fa-solid fa-xl fa-ban"></i>
                                </button>
                            </center>';
                }else{
                    $result =   '<center>
                                <button type="button" class="btn btn-primary btn-xs text-center actionEditBarangayResidentDatabase mr-1" barangay-resident-database-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#modalAddBarangayResidentDatabase" title="Edit Details">
                                    <i class="fa fa-xl fa-edit"></i> 
                                </button>
                                <button type="button" class="btn btn-warning btn-xs text-center actionEditBarangayResidentDatabaseStatus mr-1" barangay-resident-database-id="' . $row->id . '" barangay-resident-database-status="' . $row->status . '" data-bs-toggle="modal" data-bs-target="#modalEditBarangayResidentDatabaseStatus" title="Enable">
                                    <i class="fa-solid fa-xl fa-arrow-rotate-right"></i>
                                </button>
                            </center>';
                }
                return $result;
            })
            ->addColumn('gender', function($row){
                $result = "";
                if($row->gender == 1){
                    $result .= '<center><span class="badge badge-pill badge-info">Male</span></center>';
                }
                else if($row->gender == 2){
                    $result .= '<center><span class="badge badge-pill badge-info">Female</span></center>';
                }
                else{
                    $result .= '<center><span class="badge badge-pill badge-info">Other</span></center>';
                }
                return $result;
            })
            ->addColumn('address', function($row){
                $result = "";
                if($row->address == "IV"){
                    $result .= '<center><span class="badge badge-pill badge-primary">IV</span></center>';
                }
                else if($row->address == "Other"){
                    $result .= '<center><span class="badge badge-pill badge-warning">Other</span></center>';
                }
                return $result;
            })
        ->rawColumns(['status', 'action', 'gender', 'address'])
        ->make(true);
    }

    public function addBarangayResidentDatabase(Request $request){
        date_default_timezone_set('Asia/Manila');
        session_start();
        
        $data = $request->all();
        /* For Insert */
        if(!isset($request->barangay_resident_database_id)){
            $validator = Validator::make($data, [
                'firstname' => 'required|string',
                'lastname' => 'required|string',
                // 'middle_initial' => 'required|string',
                'address' => 'required|string',
                'gender' => 'required|string',
                // 'age' => 'numeric',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['validationHasError' => 1, 'error' => $validator->messages()]);
            } else {
                DB::beginTransaction();
                try {
                    BarangayResidentDatabase::insert([
                        'firstname' => strtolower($request->firstname),
                        'lastname' => strtolower($request->lastname),
                        'middle_initial' => strtolower($request->middle_initial),
                        'address' => $request->address,
                        'gender' => $request->gender,
                        'age' => $request->age,
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
                'firstname' => 'required|string',
                'lastname' => 'required|string',
                // 'middle_initial' => 'required|string',
                'address' => 'required|string',
                'gender' => 'required|string',
                // 'age' => 'numeric',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['validationHasError' => 1, 'error' => $validator->messages()]);
            } else {
                DB::beginTransaction();
                try {
                    BarangayResidentDatabase::where('id', $request->barangay_resident_database_id)->update([
                        'firstname' => strtolower($request->firstname),
                        'lastname' => strtolower($request->lastname),
                        'middle_initial' => strtolower($request->middle_initial),
                        'address' => $request->address,
                        'gender' => $request->gender,
                        'age' => $request->age,
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

    public function getBarangayResidentDatabaseById(Request $request){
        $barangayResidentDatabaseDetails = BarangayResidentDatabase::where('id', $request->barangayResidentDatabaseId)->get();
        return response()->json(['barangayResidentDatabaseDetails' => $barangayResidentDatabaseDetails]);
    }

    public function editBarangayResidentDatabaseStatus(Request $request){
        date_default_timezone_set('Asia/Manila');
        session_start();

        $data = $request->all(); // collect all input fields

        $validator = Validator::make($data, [
            'barangay_resident_database_id' => 'required',
            'status' => 'required',
        ]);

        if($validator->passes()){
            if($request->status == 1){
                BarangayResidentDatabase::where('id', $request->barangay_resident_database_id)
                    ->update([
                            'status' => 0,
                            'last_updated_by' => $_SESSION['session_user_id'],
                            'updated_at' => date('Y-m-d H:i:s'),
                        ]
                    );
                $status = BarangayResidentDatabase::where('id', $request->barangay_resident_database_id)->value('status');
                return response()->json(['hasError' => 0, 'status' => (int)$status]);
            }else{
                BarangayResidentDatabase::where('id', $request->barangay_resident_database_id)
                    ->update([
                            'status' => 1,
                            'last_updated_by' => $_SESSION['session_user_id'],
                            'updated_at' => date('Y-m-d H:i:s'),
                        ]
                    );
                $status = BarangayResidentDatabase::where('id', $request->barangay_resident_database_id)->value('status');
                return response()->json(['hasError' => 0, 'status' => (int)$status]);
            }
                
        }
        else{
            return response()->json(['validationHasError' => 1, 'error' => $validator->messages()]);
        }
    }
}
