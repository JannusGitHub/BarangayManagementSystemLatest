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
use App\Models\IssuanceConfiguration;

class CedulaBasisController extends Controller
{
    public function viewCedulaBasis(){
        $cedulaBasisDetails = IssuanceConfiguration::where('is_deleted', 0)->get();
        
        return DataTables::of($cedulaBasisDetails)
            ->addColumn('name', function($row){
                $result = "";
                if($row->name == 1){
                    $result .= '<center><span >Brgy. Clearance</span></center>';
                }
                else if($row->name == 2){
                    $result .= '<center><span >Indigency</span></center>';
                }
                else if($row->name == 3){
                    $result .= '<center><span >Residency</span></center>';
                }
                else if($row->name == 4){
                    $result .= '<center><span >Registration</span></center>';
                }
                else if($row->name == 5){
                    $result .= '<center><span >License & Permit</span></center>';
                }
                else if($row->name == 6){
                    $result .= '<center><span >Cedula</span></center>';
                }
                return $result;
            })
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
            ->addColumn('processing_time', function($row){
                $result = "";
                if($row->processing_time == 1){
                    $result .= '<center><span class="badge badge-pill badge-info">1 Day</span></center>';
                }
                else if($row->processing_time == 2){
                    $result .= '<center><span class="badge badge-pill badge-info">2 Days</span></center>';
                }
                else if($row->processing_time == 3){
                    $result .= '<center><span class="badge badge-pill badge-info">3 Days</span></center>';
                }
                else if($row->processing_time == 4){
                    $result .= '<center><span class="badge badge-pill badge-info">4 Days</span></center>';
                }
                else if($row->processing_time == 5){
                    $result .= '<center><span class="badge badge-pill badge-info">5 Days</span></center>';
                }
                else if($row->processing_time == 6){
                    $result .= '<center><span class="badge badge-pill badge-info">1 Week</span></center>';
                }
                else if($row->processing_time == 7){
                    $result .= '<center><span class="badge badge-pill badge-info">2 Weeks</span></center>';
                }
                else if($row->processing_time == 8){
                    $result .= '<center><span class="badge badge-pill badge-info">3 Weeks</span></center>';
                }
                else if($row->processing_time == 9){
                    $result .= '<center><span class="badge badge-pill badge-info">1 Month</span></center>';
                }
                else{
                    $result .= '<center><span class="badge badge-pill text-secondary" style="background-color: #E6E6E6">Other</span></center>';
                }
                return $result;
            })
            ->addColumn('action', function($row){
                if($row->status == 1){
                    $result =   '<center>
                                <button type="button" class="btn btn-primary btn-xs text-center actionEditCedulaBasis mr-1" cedula-basis-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#modalAddCedulaBasis" title="Edit Details">
                                    <i class="fa fa-xl fa-edit"></i> 
                                </button>
                            </center>';
                    // $result =   '<center>
                    //             <button type="button" class="btn btn-primary btn-xs text-center actionEditCedulaBasis mr-1" cedula-basis-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#modalAddCedulaBasis" title="Edit Details">
                    //                 <i class="fa fa-xl fa-edit"></i> 
                    //             </button>
                    //             <button type="button" class="btn btn-danger btn-xs text-center actionEditCedulaBasisStatus mr-1" cedula-basis-id="' . $row->id . '" cedula-basis-status="' . $row->status . '" data-bs-toggle="modal" data-bs-target="#modalEditCedulaBasisStatus" title="Deactivate">
                    //                 <i class="fa-solid fa-xl fa-ban"></i>
                    //             </button>
                    //         </center>';
                }else{
                    $result =   '<center>
                                <button type="button" class="btn btn-primary btn-xs text-center actionEditCedulaBasis mr-1" cedula-basis-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#modalAddCedulaBasis" title="Edit Details">
                                    <i class="fa fa-xl fa-edit"></i> 
                                </button>
                            </center>';
                    // $result =   '<center>
                    //             <button type="button" class="btn btn-primary btn-xs text-center actionEditCedulaBasis mr-1" cedula-basis-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#modalAddCedulaBasis" title="Edit Details">
                    //                 <i class="fa fa-xl fa-edit"></i> 
                    //             </button>
                    //             <button type="button" class="btn btn-warning btn-xs text-center actionEditCedulaBasisStatus mr-1" cedula-basis-id="' . $row->id . '" cedula-basis-status="' . $row->status . '" data-bs-toggle="modal" data-bs-target="#modalEditCedulaBasisStatus" title="Activate">
                    //                 <i class="fa-solid fa-xl fa-arrow-rotate-right"></i>
                    //             </button>
                    //         </center>';
                }
                return $result;
            })
        ->rawColumns(['name','status', 'action', 'processing_time'])
        ->make(true);
    }

    public function addCedulaBasis(Request $request){
        date_default_timezone_set('Asia/Manila');
        session_start();
        
        $data = $request->all();
        /* For Insert */
        if(!isset($request->cedula_basis_id)){
            $validator = Validator::make($data, [
                'name' => 'required|string',
                'amount' => 'required|string',
                'processing_time' => 'required|string',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['validationHasError' => 1, 'error' => $validator->messages()]);
            } else {
                DB::beginTransaction();
                try {
                    IssuanceConfiguration::insert([
                        'name' => $request->name,
                        'amount' => $request->amount,
                        'processing_time' => $request->processing_time,
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
                'name' => 'required|string',
                'amount' => 'required|string',
                'processing_time' => 'required|string',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['validationHasError' => 1, 'error' => $validator->messages()]);
            } else {
                DB::beginTransaction();
                try {
                    IssuanceConfiguration::where('id', $request->cedula_basis_id)->update([
                        'name' => $request->name,
                        'amount' => $request->amount,
                        'processing_time' => $request->processing_time,
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
    
    public function getCedulaBasisById(Request $request){
        $cedulaBasisDetails = IssuanceConfiguration::where('id', $request->cedulaBasisId)->get();
        return response()->json(['cedulaBasisDetails' => $cedulaBasisDetails]);
    }

    public function getCedulaBasisExistence(Request $request){
        $cedulaBasisDetails = IssuanceConfiguration::get();
        // return $cedulaBasisDetails;
        return response()->json(['cedulaBasisDetails' => $cedulaBasisDetails]);
    }

    public function editCedulaBasisStatus(Request $request){        
        date_default_timezone_set('Asia/Manila');
        session_start();

        $data = $request->all(); // collect all input fields

        $validator = Validator::make($data, [
            'cedula_basis_id' => 'required',
            'status' => 'required',
        ]);

        if($validator->passes()){
            if($request->status == 1){
                IssuanceConfiguration::where('id', $request->cedula_basis_id)
                    ->update([
                            'status' => 0,
                            'last_updated_by' => $_SESSION['session_user_id'],
                            'updated_at' => date('Y-m-d H:i:s'),
                        ]
                    );
                $status = IssuanceConfiguration::where('id', $request->cedula_basis_id)->value('status');
                return response()->json(['hasError' => 0, 'status' => (int)$status]);
            }else{
                IssuanceConfiguration::where('id', $request->cedula_basis_id)
                    ->update([
                            'status' => 1,
                            'last_updated_by' => $_SESSION['session_user_id'],
                            'updated_at' => date('Y-m-d H:i:s'),
                        ]
                    );
                $status = IssuanceConfiguration::where('id', $request->cedula_basis_id)->value('status');
                return response()->json(['hasError' => 0, 'status' => (int)$status]);
            }
        }
        else{
            return response()->json(['validationHasError' => 1, 'error' => $validator->messages()]);
        }
    }
}
