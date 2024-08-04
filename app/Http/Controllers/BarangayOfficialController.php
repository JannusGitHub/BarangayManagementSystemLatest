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
use App\Models\BarangayOfficial;

class BarangayOfficialController extends Controller
{
    public function viewBarangayOfficial(){
        $barangayOfficialDetails = BarangayOfficial::where('is_deleted', 0)->get();
        
        return DataTables::of($barangayOfficialDetails)
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
            ->addColumn('start_term', function($row){
                $result = "";

                $date = Carbon::parse($row->date)->locale('en');
                $result .= $date->translatedFormat('F Y g:i A');
                return $result;
            })
            ->addColumn('end_term', function($row){
                $result = "";

                $date = Carbon::parse($row->date)->locale('en');
                $result .= $date->translatedFormat('F Y g:i A');
                return $result;
            })
            ->addColumn('action', function($row){
                if($row->status == 1){
                    $result =   '<center>
                                <button ty  pe="button" class="btn btn-primary btn-xs text-center actionEditBarangayOfficial mr-1" barangay-official-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#modalAddBarangayOfficial" title="Edit Details">
                                    <i class="fa fa-xl fa-edit"></i> 
                                </button>
                                <button type="button" class="btn btn-danger btn-xs text-center actionEditBarangayOfficialStatus mr-1" barangay-official-id="' . $row->id . '" barangay-official-status="' . $row->status . '" data-bs-toggle="modal" data-bs-target="#modalEditBarangayOfficialStatus" title="Disabled">
                                    <i class="fa-solid fa-xl fa-ban"></i>
                                </button>
                            </center>';
                }else{
                    $result =   '<center>
                                <button type="button" class="btn btn-primary btn-xs text-center actionEditBarangayOfficial mr-1" barangay-official-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#modalAddBarangayOfficial" title="Edit Details">
                                    <i class="fa fa-xl fa-edit"></i> 
                                </button>
                                <button type="button" class="btn btn-warning btn-xs text-center actionEditBarangayOfficialStatus mr-1" barangay-official-id="' . $row->id . '" barangay-official-status="' . $row->status . '" data-bs-toggle="modal" data-bs-target="#modalEditBarangayOfficialStatus" title="Enabled">
                                    <i class="fa-solid fa-xl fa-arrow-rotate-right"></i>
                                </button>
                            </center>';
                }
                return $result;
            })
            ->addColumn('position', function($row){
                $result = '';
                if($row->position == 1){
                    $result = 'Chairman';
                }else if($row->position == 2){
                    $result = 'Councilor';
                }
                else if($row->position == 3){
                    $result = 'SK Chairman';
                }
                else if($row->position == 4){
                    $result = 'SK Councilor';
                }
                else if($row->position == 5){
                    $result = 'Treasurer';
                }
                else if($row->position == 6){
                    $result = 'Secretary';
                }
                else if($row->position == 7){
                    $result = 'BPSO Chief';
                }
                else if($row->position == 8){
                    $result = 'Deputy Chief';
                }
                else if($row->position == 9){
                    $result = 'Deputy On Operation';
                }
                else if($row->position == 10){
                    $result = 'Investigator';
                }
                else{
                    $result = 'Others';
                }
                return $result;
            })
            // ->addColumn('image', function($row){
            //     $result = "";
                
            //     if($row->image != null){
            //         $url = asset("/storage/official_attachments/$row->image");
            //         $result .= '<a href="'.$url.'" target="_blank" data-toggle="lightbox" data-caption="This describes the image">';
            //         $result .=    '<center><img width="80" height="80" class="img-fluid rounded" src="'.$url.'"></center>';
            //         $result .=  '</a>';
            //     }else{
            //         $result .= '<center><span class="badge badge-pill badge-secondary">No image</span></center>';
            //     }
            //     return $result;
            // })
        ->rawColumns(['status', 'start_term', 'end_term', 'action', 'position'])
        ->make(true);
    }

    public function addBarangayOfficial(Request $request){
        date_default_timezone_set('Asia/Manila');
        session_start();
        
        $data = $request->all();
        /* For Insert */
        if(!isset($request->barangay_official_id)){
            $rules = [
                'name' => 'required|string',
                'position' => 'required|string',
                'start_term' => 'required|string',
                'end_term' => 'required|string',
            ];
            
            if($request->position == 1){
                $rules['signature'] = 'required';
            }else{
                $rules['signature'] = '';
            }
            
            $validator = Validator::make($data, $rules);
    
            if ($validator->fails()) {
                return response()->json(['validationHasError' => 1, 'error' => $validator->messages()]);
            } else {
                DB::beginTransaction();
                try {
                    
                    /**
                     * For uploading image
                     */
                    $image_name = null;
                    if(isset($request->image)){
                        $image_file = $request->file('image');
                        $image_name = $image_file->getClientOriginalName();
                        Storage::putFileAs('public/official_attachments/photo', $request->image, $image_name);
                    }

                    /**
                     * For uploading e-signature
                     */
                    $e_signature_name = null;
                    if(isset($request->signature)){
                        $e_signature_file = $request->file('signature');
                        $e_signature_name = $e_signature_file->getClientOriginalName();
                        Storage::putFileAs('public/official_attachments/e_signature', $request->signature, $e_signature_name);
                    }
                    
                    BarangayOfficial::insert([
                        'name' => $request->name,
                        'position' => $request->position,
                        'start_term' => $request->start_term,
                        'end_term' => $request->end_term,
                        'photo' => $image_name,
                        'signature' => $e_signature_name,
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
            $rules = [
                'name' => 'required|string',
                'position' => 'required|string',
                'start_term' => 'required|string',
                'end_term' => 'required|string',
            ];

            $signatureDetails = BarangayOfficial::where('id', $request->barangay_official_id)
                            ->get();

            if($request->position == 1 && isset($request->checkbox_image)){
                $rules['image'] = 'required';

                if(isset($request->checkbox_signature)){
                    $rules['signature'] = 'required';
                }
            }
            else if($request->position == 1 && isset($request->checkbox_signature)){
                $rules['signature'] = 'required';

                if(isset($request->checkbox_image)){
                    $rules['image'] = 'required';
                }
            }
            else if($request->position != 1 && isset($request->checkbox_image)){
                $rules['image'] = 'required';
            }
            else{
                $rules['signature'] = '';
            }

            $validator = Validator::make($data, $rules);
            if ($validator->fails()) {
                return response()->json(['validationHasError' => 1, 'error' => $validator->messages()]);
            } else {
                DB::beginTransaction();
                try {

                    /**
                     * For re-uploading image
                     */
                    // return isset($request->image) ? "image set" : "image not set";
                    $image_name = null;
                    if(isset($request->image)){
                        $image_file = $request->file('image');
                        $image_name = $image_file->getClientOriginalName();
                        Storage::putFileAs('public/official_attachments/photo', $request->image, $image_name);

                        BarangayOfficial::where('id', $request->barangay_official_id)->update([
                            'name' => $request->name,
                            'position' => $request->position,
                            'start_term' => $request->start_term,
                            'end_term' => $request->end_term,
                            'photo' => $image_name,
                            // 'signature' => $e_signature_name,
                            'updated_at' => date('Y-m-d H:i:s'),
                            'last_updated_by' => $_SESSION["session_user_id"],
                        ]);
                    }

                    /**
                     * For re-uploading e-signature
                     */
                    // return isset($request->signature) ? "signature set" : "signature not set";
                    $e_signature_name = null;
                    if(isset($request->signature)){
                        $e_signature_file = $request->file('signature');
                        $e_signature_name = $e_signature_file->getClientOriginalName();
                        Storage::putFileAs('public/official_attachments/e_signature', $request->signature, $e_signature_name);

                        BarangayOfficial::where('id', $request->barangay_official_id)->update([
                            'name' => $request->name,
                            'position' => $request->position,
                            'start_term' => $request->start_term,
                            'end_term' => $request->end_term,
                            // 'photo' => $image_name,
                            'signature' => $e_signature_name,
                            'updated_at' => date('Y-m-d H:i:s'),
                            'last_updated_by' => $_SESSION["session_user_id"],
                        ]);
                    }
                    
                    if(!isset($request->signature) && !isset($request->image)){
                        BarangayOfficial::where('id', $request->barangay_official_id)->update([
                            'name' => $request->name,
                            'position' => $request->position,
                            'start_term' => $request->start_term,
                            'end_term' => $request->end_term,
                            // 'photo' => $image_name,
                            // 'signature' => $e_signature_name,
                            'updated_at' => date('Y-m-d H:i:s'),
                            'last_updated_by' => $_SESSION["session_user_id"],
                        ]);
                    }

                    DB::commit();
                    return response()->json(['hasError' => 0]);
                } catch (\Exception $e) {
                    DB::rollback();
                    return response()->json(['hasError' => 1, 'exceptionError' => $e]);
                }
            }
        }
    }

    public function getBarangayOfficialById(Request $request){
        $barangayOfficialDetails = BarangayOfficial::where('id', $request->barangayOfficialId)->get();
        return response()->json(['barangayOfficialDetails' => $barangayOfficialDetails]);
    }


    public function editBarangayOfficialStatus(Request $request){
        date_default_timezone_set('Asia/Manila');
        session_start();

        $data = $request->all(); // collect all input fields

        $validator = Validator::make($data, [
            'barangay_official_id' => 'required',
            'status' => 'required',
        ]);

        if($validator->passes()){
            if($request->status == 1){
                BarangayOfficial::where('id', $request->barangay_official_id)
                    ->update([
                            'status' => 0,
                            'last_updated_by' => $_SESSION['session_user_id'],
                            'updated_at' => date('Y-m-d H:i:s'),
                        ]
                    );
                $status = BarangayOfficial::where('id', $request->barangay_official_id)->value('status');
                return response()->json(['hasError' => 0, 'status' => (int)$status]);
            }else{
                BarangayOfficial::where('id', $request->barangay_official_id)
                    ->update([
                            'status' => 1,
                            'last_updated_by' => $_SESSION['session_user_id'],
                            'updated_at' => date('Y-m-d H:i:s'),
                        ]
                    );
                $status = BarangayOfficial::where('id', $request->barangay_official_id)->value('status');
                return response()->json(['hasError' => 0, 'status' => (int)$status]);
            }
        }
        else{
            return response()->json(['validationHasError' => 1, 'error' => $validator->messages()]);
        }
    }

    public function getTotalBarangayOfficial(Request $request){
        $totalBarangayOfficialDetails = BarangayOfficial::where('status', 1)->get();
        return response()->json(['totalBarangayOfficialDetails' => $totalBarangayOfficialDetails]);
    }
}
