<?php

use App\Http\Controllers\BenefitsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NormativesController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\ProceduresController;
use App\Http\Controllers\ValuesController;
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
    return view('inicio');
});
// Route::get('/noticias', [PostController::class, 'index'])->name('post');
// Route::get('/procedimientos', [ProcedureController::class, 'index'])->name('procedure');
// Route::get('/beneficios', [BenefitController::class, 'index'])->name('benefit');
// Route::get('/normativas', [NormativeController::class, 'index'])->name('normative');
// Route::get('/valores', [ValueController::class, 'index'])->name('our-values');

Auth::routes();

Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.home');
Route::get('admin/procedimientos', [ProceduresController::class, 'index'])->name('admin.procedures');
Route::post('admin/procedimientos', [ProceduresController::class, 'store'])->name('procedures.store');
Route::get('admin/beneficios', [BenefitsController::class, 'index'])->name('admin.benefits');
Route::get('admin/normativas', [NormativesController::class, 'index'])->name('admin.normative');
Route::get('admin/nuestros-valores', [ValuesController::class, 'index'])->name('admin.values');
Route::get('admin/equipo', [PersonalController::class, 'index'])->name('admin.personal');
