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
use App\Models\BarangayDemography;

class BarangayDemographyController extends Controller
{
    public function viewBarangayDemography(){
        $barangayDemographyDetails = BarangayDemography::where('is_deleted', 0)->get();
        
        return DataTables::of($barangayDemographyDetails)
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
                                <button ty  pe="button" class="btn btn-primary btn-xs text-center actionEditBarangayDemography mr-1" barangay-demography-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#modalAddBarangayDemography" title="Edit Details">
                                    <i class="fa fa-xl fa-edit"></i> 
                                </button>
                                <button type="button" class="btn btn-danger btn-xs text-center actionEditBarangayDemographyStatus mr-1" barangay-demography-id="' . $row->id . '" barangay-demography-status="' . $row->status . '" data-bs-toggle="modal" data-bs-target="#modalEditBarangayDemographyStatus" title="Deactivate">
                                    <i class="fa-solid fa-xl fa-ban"></i>
                                </button>
                            </center>';
                }else{
                    $result =   '<center>
                                <button type="button" class="btn btn-primary btn-xs text-center actionEditBarangayDemography mr-1" barangay-demography-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#modalAddBarangayDemography" title="Edit Details">
                                    <i class="fa fa-xl fa-edit"></i> 
                                </button>
                                <button type="button" class="btn btn-warning btn-xs text-center actionEditBarangayDemographyStatus mr-1" barangay-demography-id="' . $row->id . '" barangay-demography-status="' . $row->status . '" data-bs-toggle="modal" data-bs-target="#modalEditBarangayDemographyStatus" title="Activate">
                                    <i class="fa-solid fa-xl fa-arrow-rotate-right"></i>
                                </button>
                            </center>';
                }
                return $result;
            })
        ->rawColumns(['status', 'action'])
        ->make(true);
    }

    public function addBarangayDemography(Request $request){
        date_default_timezone_set('Asia/Manila');
        session_start();
        
        $data = $request->all();
        /* For Insert */
        if(!isset($request->barangay_demography_id)){
            $validator = Validator::make($data, [
                'year' => 'required|string',
                'total_population' => 'required|string',
                'number_of_household' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json(['validationHasError' => 1, 'error' => $validator->messages()]);
            } else {
                DB::beginTransaction();
                try {
                    BarangayDemography::insert([
                        'year' => $request->year,
                        'total_population' => $request->total_population,
                        'number_of_household' => $request->number_of_household,
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
                'year' => 'required|string',
                'total_population' => 'required|string',
                'number_of_household' => 'required|string',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['validationHasError' => 1, 'error' => $validator->messages()]);
            } else {
                DB::beginTransaction();
                try {
                    BarangayDemography::where('id', $request->barangay_demography_id)->update([
                        'year' => $request->year,
                        'total_population' => $request->total_population,
                        'number_of_household' => $request->number_of_household,
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

    public function getBarangayDemographyById(Request $request){
        $barangayDemographyDetails = BarangayDemography::where('id', $request->barangayDemographyId)->get();
        return response()->json(['barangayDemographyDetails' => $barangayDemographyDetails]);
    }

    public function editBarangayDemographyStatus(Request $request){        
        date_default_timezone_set('Asia/Manila');
        session_start();

        $data = $request->all(); // collect all input fields

        $validator = Validator::make($data, [
            'barangay_demography_id' => 'required',
            'status' => 'required',
        ]);

        if($validator->passes()){
            if($request->status == 1){
                BarangayDemography::where('id', $request->barangay_demography_id)
                    ->update([
                            'status' => 0,
                            'last_updated_by' => $_SESSION['session_user_id'],
                            'updated_at' => date('Y-m-d H:i:s'),
                        ]
                    );
                $status = BarangayDemography::where('id', $request->barangay_demography_id)->value('status');
                return response()->json(['hasError' => 0, 'status' => (int)$status]);
            }else{
                BarangayDemography::where('id', $request->barangay_demography_id)
                    ->update([
                            'status' => 1,
                            'last_updated_by' => $_SESSION['session_user_id'],
                            'updated_at' => date('Y-m-d H:i:s'),
                        ]
                    );
                $status = BarangayDemography::where('id', $request->barangay_demography_id)->value('status');
                return response()->json(['hasError' => 0, 'status' => (int)$status]);
            }
                
        }
        else{
            return response()->json(['validationHasError' => 1, 'error' => $validator->messages()]);
        }
    }

    public function getTotalBarangayDemography(Request $request){
        $totalBarangayDemographyDetails = BarangayDemography::where('status', 1)->get();
        return response()->json(['totalBarangayDemographyDetails' => $totalBarangayDemographyDetails]);
    }
}
