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
use App\Models\BarangayOther;

class BarangayOthersController extends Controller
{
    public function viewBarangayOthers(){
        $barangayOthersDetails = BarangayOther::where('is_deleted', 0)->get();
        
        return DataTables::of($barangayOthersDetails)
            ->addColumn('status', function($row){
                $result = "";
                if($row->status == 1){
                    $result .= '<center><span class="badge badge-pill badge-success">Active</span></center>';
                }
                else{
                    $result .= '<center><span class="badge badge-pill text-distance_to_poblacion" style="background-color: #E6E6E6">Inactive</span></center>';
                }
                return $result;
            })
            ->addColumn('action', function($row){
                if($row->status == 1){
                    $result =   '<center>
                                <button ty  pe="button" class="btn btn-primary btn-xs text-center actionEditBarangayOthers mr-1" barangay-others-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#modalAddBarangayOthers" title="Edit Details">
                                    <i class="fa fa-xl fa-edit"></i> 
                                </button>
                                <button type="button" class="btn btn-danger btn-xs text-center actionEditBarangayOthersStatus mr-1" barangay-others-id="' . $row->id . '" barangay-others-status="' . $row->status . '" data-bs-toggle="modal" data-bs-target="#modalEditBarangayOthersStatus" title="Deactivate">
                                    <i class="fa-solid fa-xl fa-ban"></i>
                                </button>
                            </center>';
                }else{
                    $result =   '<center>
                                <button type="button" class="btn btn-primary btn-xs text-center actionEditBarangayOthers mr-1" barangay-others-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#modalAddBarangayOthers" title="Edit Details">
                                    <i class="fa fa-xl fa-edit"></i> 
                                </button>
                                <button type="button" class="btn btn-warning btn-xs text-center actionEditBarangayOthersStatus mr-1" barangay-others-id="' . $row->id . '" barangay-others-status="' . $row->status . '" data-bs-toggle="modal" data-bs-target="#modalEditBarangayOthersStatus" title="Activate">
                                    <i class="fa-solid fa-xl fa-arrow-rotate-right"></i>
                                </button>
                            </center>';
                }
                return $result;
            })
        ->rawColumns(['status', 'action'])
        ->make(true);
    }

    public function addBarangayOthers(Request $request){
        date_default_timezone_set('Asia/Manila');
        session_start();
        
        $data = $request->all();
        /* For Insert */
        if(!isset($request->barangay_others_id)){
            $validator = Validator::make($data, [
                'classification' => 'required|string',
                'zoning_classification' => 'required|string',
                'fiesta' => 'required|string',
                'distance_to_poblacion' => 'required|string',
                'travel_time_to_poblacion' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json(['validationHasError' => 1, 'error' => $validator->messages()]);
            } else {
                DB::beginTransaction();
                try {
                    BarangayOther::insert([
                        'classification' => $request->classification,
                        'zoning_classification' => $request->zoning_classification,
                        'fiesta' => $request->fiesta,
                        'distance_to_poblacion' => $request->distance_to_poblacion,
                        'travel_time_to_poblacion' => $request->travel_time_to_poblacion,
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
                'classification' => 'required|string',
                'zoning_classification' => 'required|string',
                'fiesta' => 'required|string',
                'distance_to_poblacion' => 'required|string',
                'travel_time_to_poblacion' => 'required|string',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['validationHasError' => 1, 'error' => $validator->messages()]);
            } else {
                DB::beginTransaction();
                try {
                    BarangayOther::where('id', $request->barangay_others_id)->update([
                        'classification' => $request->classification,
                        'zoning_classification' => $request->zoning_classification,
                        'fiesta' => $request->fiesta,
                        'distance_to_poblacion' => $request->distance_to_poblacion,
                        'travel_time_to_poblacion' => $request->travel_time_to_poblacion,
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

    public function getBarangayOthersById(Request $request){
        $barangayOthersDetails = BarangayOther::where('id', $request->barangayOthersId)->get();
        return response()->json(['barangayOthersDetails' => $barangayOthersDetails]);
    }

    public function editBarangayOthersStatus(Request $request){        
        date_default_timezone_set('Asia/Manila');
        session_start();

        $data = $request->all(); // collect all input fields

        $validator = Validator::make($data, [
            'barangay_others_id' => 'required',
            'status' => 'required',
        ]);

        if($validator->passes()){
            if($request->status == 1){
                BarangayOther::where('id', $request->barangay_others_id)
                    ->update([
                            'status' => 0,
                            'last_updated_by' => $_SESSION['session_user_id'],
                            'updated_at' => date('Y-m-d H:i:s'),
                        ]
                    );
                $status = BarangayOther::where('id', $request->barangay_others_id)->value('status');
                return response()->json(['hasError' => 0, 'status' => (int)$status]);
            }else{
                BarangayOther::where('id', $request->barangay_others_id)
                    ->update([
                            'status' => 1,
                            'last_updated_by' => $_SESSION['session_user_id'],
                            'updated_at' => date('Y-m-d H:i:s'),
                        ]
                    );
                $status = BarangayOther::where('id', $request->barangay_others_id)->value('status');
                return response()->json(['hasError' => 0, 'status' => (int)$status]);
            }
                
        }
        else{
            return response()->json(['validationHasError' => 1, 'error' => $validator->messages()]);
        }
    }

    public function getTotalBarangayOthers(Request $request){
        $totalBarangayOthersDetails = BarangayOther::where('status', 1)->get();
        return response()->json(['totalBarangayOthersDetails' => $totalBarangayOthersDetails]);
    }
}
