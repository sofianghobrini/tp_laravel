<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModeleController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\EvaluationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('modele', ModeleController::class);
Route::resource('evaluation', EvaluationController::class);
Route::resource('evaluation-eleves', EleveController::class);

Route::get('/eleves/{id}/notes', [EleveController::class, 'showNotes'])->name('eleve.notes');
Route::get('/evaluations/{id}/notes', [EvaluationController::class, 'showNotes'])->name('evaluation.notes');
Route::get('/evaluations/{id}/eleves-sans-moyenne', [EvaluationController::class, 'elevesSansMoyenne'])->name('evaluation.elevesSansMoyenne');
