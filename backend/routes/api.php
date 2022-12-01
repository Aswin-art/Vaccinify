<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\SpotController;
use App\Http\Controllers\VaccinationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('v1')->group(function(){
    Route::prefix('auth')->group(function(){
        Route::post('login', [AuthController::class, 'loginSociety']);
        Route::post('logout', [AuthController::class, 'logoutSociety'])->middleware('logged');
    });

    Route::prefix('consultations')->middleware('logged')->group(function(){
        Route::post('', [ConsultationController::class, 'postConsultation']);
        Route::get('', [ConsultationController::class, 'getConsultation']);
    });

    Route::prefix('spots')->middleware('logged')->group(function(){
        Route::get('', [SpotController::class, 'getSpot']);
        Route::get('/{id}', [SpotController::class, 'showSpot']);
    });

    Route::prefix('vaccinations')->middleware('logged')->group(function(){
        Route::post('', [VaccinationController::class, 'postVaccine']);
        Route::get('', [VaccinationController::class, 'getVaccine']);
    });
});
