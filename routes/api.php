<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WaterLevelController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/add_water_level_value', [WaterLevelController::class, 'addWaterLevelValue'])->name('add_water_level_value');
Route::get('/get_water_level', [WaterLevelController::class, 'getWaterLevel'])->name('get_water_level');