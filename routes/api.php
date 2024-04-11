<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('patients', [Api\PatientsController::class, 'index']);
Route::post('patients', [Api\PatientsController::class, 'store']);
Route::get('patients/{patient}', [Api\PatientsController::class, 'show']);
Route::put('patients/{patient}', [Api\PatientsController::class, 'update']);
Route::delete('patients/{patient}', [Api\PatientsController::class, 'destroy']);
