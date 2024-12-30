<?php

use App\Http\Controllers\EleveController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\EvaluationEleveController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



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

Route::middleware(['auth'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('can:is-prof')->group(function () {
    // Routes pr les evaluations
    Route::get('/evaluations', [EvaluationController::class, 'index'])->name('evaluations.index');
    Route::get('/evaluations/create', [EvaluationController::class, 'create'])->name('evaluations.create');
    Route::post('/evaluations', [EvaluationController::class, 'store'])->name('evaluations.store');
    Route::get('/evaluations/{id}/edit', [EvaluationController::class, 'edit'])->name('evaluations.edit');
    Route::put('/evaluations/{id}', [EvaluationController::class, 'update'])->name('evaluations.update');
    Route::delete('/evaluations/{id}', [EvaluationController::class, 'destroy'])->name('evaluations.destroy');

    // Routes pour les modules (CRUD complet)
    Route::get('/modules', [ModuleController::class, 'index'])->name('modules.index');
    Route::get('/modules/create', [ModuleController::class, 'create'])->name('modules.create');
    Route::post('/modules', [ModuleController::class, 'store'])->name('modules.store');
    Route::get('/modules/{id}/edit', [ModuleController::class, 'edit'])->name('modules.edit');
    Route::put('/modules/{id}', [ModuleController::class, 'update'])->name('modules.update');
    Route::delete('/modules/{id}', [ModuleController::class, 'destroy'])->name('modules.destroy');

    // Routes pour les évaluations des élèves (consultation)
    Route::get('/evaluationEleve', [EvaluationEleveController::class, 'index'])->name('evaluation-eleve.index');
    Route::get('/evaluationEleve/evaluation/{id}', [EvaluationEleveController::class, 'showEvaluation'])->name('evaluation-eleve.showEvaluation');
    Route::get('/evaluationEleve/eleve/{id}', [EvaluationEleveController::class, 'showEleve'])->name('evaluation-eleve.showEleve');

    // Routes pour la gestion des élèves (CRUD complet)
    Route::get('/eleves', [EleveController::class, 'index'])->name('eleves.index');
    Route::get('/eleves/create', [EleveController::class, 'create'])->name('eleves.create');
    Route::post('/eleves', [EleveController::class, 'store'])->name('eleves.store');
    Route::get('/eleves/{id}/edit', [EleveController::class, 'edit'])->name('eleves.edit');
    Route::put('/eleves/{id}', [EleveController::class, 'update'])->name('eleves.update');
    Route::delete('/eleves/{id}', [EleveController::class, 'destroy'])->name('eleves.destroy');
});

// Groupe pour les élèves
Route::middleware('can:is-eleve')->group(function (){
    // Consultation des modules (liste et détails uniquement)
    Route::get('/modules', [ModuleController::class, 'index'])->name('modules.index');
    Route::get('/modules/{id}', [ModuleController::class, 'show'])->name('modules.show');

    // Consultation des évaluations des élèves
    Route::get('/evaluationEleve/evaluation/{id}', [EvaluationEleveController::class, 'showEvaluation'])->name('evaluation-eleve.showEvaluation');
    Route::get('/evaluationEleve/eleve/{id}', [EvaluationEleveController::class, 'showEleve'])->name('evaluation-eleve.showEleve');
});
require __DIR__.'/auth.php';
