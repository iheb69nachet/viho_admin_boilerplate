<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('inscription')->group(function() {
    Route::get('/', 'InscriptionController@index')->name('preregister');
    Route::get('/details/{id}', 'InscriptionController@showBlade')->name('inscriptions.show');

    Route::get('/pre', 'InscriptionController@register')->name('register');

    Route::get('/complete/{id}', 'InscriptionController@complete')->name('inscriptions.complete');

});
