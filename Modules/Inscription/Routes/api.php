<?php

use Illuminate\Http\Request;
use Modules\Inscription\Http\Controllers\InscriptionController;
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

Route::middleware('auth:api')->get('/inscription', function (Request $request) {
    return $request->user();
});
Route::post('/flight-details', [InscriptionController::class, 'store']);
Route::post('/flight-details/{id}', [InscriptionController::class, 'update']);

Route::get('/flight-details/{id}', [InscriptionController::class, 'show']);

