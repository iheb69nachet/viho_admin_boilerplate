<?php

use Illuminate\Http\Request;
use Modules\Translation\Http\Controllers\TranslationController;

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

Route::middleware('auth:api')->get('/translation', function (Request $request) {
    return $request->user();
});
Route::get('/translations/{languageId}', [TranslationController::class, 'getTranslations']);
Route::get('/translations-api/{languageName}', [TranslationController::class, 'getTranslationsApi']);
Route::put('/languages/{language}/translations/{key}', [TranslationController::class, 'update']);

Route::post('/translations', [TranslationController::class, 'storeTranslation']);
Route::post('/translations/{languageId}/{key}', [TranslationController::class, 'updateTranslation']);