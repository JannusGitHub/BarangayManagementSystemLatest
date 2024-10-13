<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\WaterLevel;

class WaterLevelController extends Controller
{
    public function addWaterLevelValue(Request $request){
        date_default_timezone_set('Asia/Manila');
        DB::beginTransaction();
        try {
            $userId = WaterLevel::insertGetId([
                'water_level_value' => $request->water_level_value,
                'created_at' => date('Y-m-d H:i:s')
            ]);

            DB::commit();
            return response()->json(['hasError' => 0]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['hasError' => 1, 'exceptionError' => $e]);
        }
    }

    public function getWaterLevel() {
        DB::beginTransaction();
        try {
            $data = WaterLevel::orderBy('id', 'desc')->get()->take(1);
            return response()->json(['data' => $data]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['hasError' => true, 'exceptionError' => $e->getMessage()]);
        }
    }
}
