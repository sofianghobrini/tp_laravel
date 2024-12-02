<?php

use App\Http\Controllers\NotesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\EvaluationEleveController;
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

Route::resource('eleves', EleveController::class);
Route::resource('modules', ModuleController::class);
Route::resource('evaluations', EvaluationController::class);
Route::resource('evaluationEleve', EvaluationEleveController::class);

Route::get('/notes/evaluation/{id}', [NotesController::class, 'showEvaluation'])->name('notes.evaluation');
Route::get('/notes/eleve/{id}', [NotesController::class, 'showEleve'])->name('notes.eleve');
Route::get('/notes/insuffisants/{id}', [NotesController::class, 'showInsuffisants'])->name('notes.insuffisants');

