<?php
use Modules\Translation\Http\Controllers\TranslationController;

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

Route::prefix('translation')->group(function() {
    Route::get('/', 'TranslationController@index')->name('lang');
});
Route::get('/languages/{language}/translations', [TranslationController::class, 'strings'])->name('translations.index');
Route::get('/languages/{language}/translations/create', [TranslationController::class, 'create'])->name('translations.create');
Route::get('/languages/{language}/translations/{key}/edit', [TranslationController::class, 'edit'])->name('translations.edit');
Route::post('/languages/{language}/translations', [TranslationController::class, 'store'])->name('translations.store');
Route::put('/languages/{language}/translations/{key}', [TranslationController::class, 'update'])->name('translations.update');