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
use App\Models\BarangayMissionVision;

class BarangayMissionVisionController extends Controller
{
    public function viewBarangayMissionVision(){
        $barangayMissionVisionDetails = BarangayMissionVision::where('is_deleted', 0)->orderBy('id', 'desc')->get();
        
        return DataTables::of($barangayMissionVisionDetails)
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
                                <button type="button" class="btn btn-primary btn-xs text-center actionEditBarangayMissionVision mr-1" barangay-mission-vision-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#modalAddBarangayMissionVision" title="Edit Details">
                                    <i class="fa fa-xl fa-edit"></i> 
                                </button>
                                <button type="button" class="btn btn-danger btn-xs text-center actionEditBarangayMissionVisionStatus mr-1" barangay-mission-vision-id="' . $row->id . '" barangay-mission-vision-status="' . $row->status . '" data-bs-toggle="modal" data-bs-target="#modalEditBarangayMissionVisionStatus" title="Deactivate">
                                    <i class="fa-solid fa-xl fa-ban"></i>
                                </button>
                            </center>';
                }else{
                    $result =   '<center>
                                <button type="button" class="btn btn-primary btn-xs text-center actionEditBarangayMissionVision mr-1" barangay-mission-vision-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#modalAddBarangayMissionVision" title="Edit Details">
                                    <i class="fa fa-xl fa-edit"></i> 
                                </button>
                                <button type="button" class="btn btn-warning btn-xs text-center actionEditBarangayMissionVisionStatus mr-1" barangay-mission-vision-id="' . $row->id . '" barangay-mission-vision-status="' . $row->status . '" data-bs-toggle="modal" data-bs-target="#modalEditBarangayMissionVisionStatus" title="Activate">
                                    <i class="fa-solid fa-xl fa-arrow-rotate-right"></i>
                                </button>
                            </center>';
                }
                return $result;
            })
        ->rawColumns(['status', 'action'])
        ->make(true);
    }

    public function addBarangayMissionVision(Request $request){
        date_default_timezone_set('Asia/Manila');
        session_start();
        
        $data = $request->all();
        /* For Insert */
        if(!isset($request->barangay_mission_vision_id)){
            $validator = Validator::make($data, [
                'mission' => 'required|string',
                'vision' => 'required|string',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['validationHasError' => 1, 'error' => $validator->messages()]);
            } else {
                DB::beginTransaction();
                try {
                    BarangayMissionVision::insert([
                        'mission' => $request->mission,
                        'vision' => $request->vision,
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
                'mission' => 'required|string',
                'vision' => 'required|string',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['validationHasError' => 1, 'error' => $validator->messages()]);
            } else {
                DB::beginTransaction();
                try {
                    BarangayMissionVision::where('id', $request->barangay_mission_vision_id)->update([
                        'mission' => $request->mission,
                        'vision' => $request->vision,
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

    public function getBarangayMissionVisionById(Request $request){
        $barangayMissionVisionDetails = BarangayMissionVision::where('id', $request->barangayMissionVisionId)->get();
        return response()->json(['barangayMissionVisionDetails' => $barangayMissionVisionDetails]);
    }

    public function editBarangayMissionVisionStatus(Request $request){        
        date_default_timezone_set('Asia/Manila');
        session_start();

        $data = $request->all(); // collect all input fields

        $validator = Validator::make($data, [
            'barangay_mission_vision_id' => 'required',
            'status' => 'required',
        ]);

        if($validator->passes()){
            if($request->status == 1){
                BarangayMissionVision::where('id', $request->barangay_mission_vision_id)
                    ->update([
                            'status' => 0,
                            'last_updated_by' => $_SESSION['session_user_id'],
                            'updated_at' => date('Y-m-d H:i:s'),
                        ]
                    );
                $status = BarangayMissionVision::where('id', $request->barangay_mission_vision_id)->value('status');
                return response()->json(['hasError' => 0, 'status' => (int)$status]);
            }else{
                BarangayMissionVision::where('id', $request->barangay_mission_vision_id)
                    ->update([
                            'status' => 1,
                            'last_updated_by' => $_SESSION['session_user_id'],
                            'updated_at' => date('Y-m-d H:i:s'),
                        ]
                    );
                $status = BarangayMissionVision::where('id', $request->barangay_mission_vision_id)->value('status');
                return response()->json(['hasError' => 0, 'status' => (int)$status]);
            }
                
        }
        else{
            return response()->json(['validationHasError' => 1, 'error' => $validator->messages()]);
        }
    }

    public function getTotalBarangayMissionVision(Request $request){
        $totalBarangayMissionVisionDetails = BarangayMissionVision::where('status', 1)->orderBy('id', 'desc')->get();
        return response()->json(['totalBarangayMissionVisionDetails' => $totalBarangayMissionVisionDetails]);
    }
}

