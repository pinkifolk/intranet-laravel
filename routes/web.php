<?php

use App\Http\Controllers\BenefitController;
use App\Http\Controllers\BenefitsController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NormativeController;
use App\Http\Controllers\NormativesController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProcedureController;
use App\Http\Controllers\ProceduresController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ValuesController;
use App\Http\Controllers\ValueController;
use Illuminate\Support\Facades\Route;

/*Route for user */

Route::get('/', [PostController::class, 'getfive'])->name('home');
Route::get('/noticias', [PostController::class, 'index'])->name('post');
Route::get('/procedimientos', [ProcedureController::class, 'index'])->name('procedure');
Route::get('/beneficios', [BenefitController::class, 'index'])->name('benefit');
Route::get('/normativas', [NormativeController::class, 'index'])->name('normative');
Route::get('/valores', [ValueController::class, 'index'])->name('our-values');
Route::get('/equipo', [TeamController::class, 'index'])->name('teams');
Route::get('/noticias', [PostController::class, 'index'])->name('post');


/*Routes for admin user */
Auth::routes();

Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.home');

Route::get('admin/procedimientos', [ProceduresController::class, 'index'])->name('procedures.index');
Route::post('admin/procedimientos', [ProceduresController::class, 'store'])->name('procedures.store');

Route::get('admin/beneficios', [BenefitsController::class, 'index'])->name('benefits.index');
Route::post('admin/beneficios', [BenefitsController::class, 'store'])->name('benefits.store');

Route::get('admin/normativas', [NormativesController::class, 'index'])->name('normative.index');
Route::post('admin/normativas', [NormativesController::class, 'store'])->name('normative.store');

Route::get('admin/nuestros-valores', [ValuesController::class, 'index'])->name('values.index');
Route::post('admin/nuestros-valores', [ValuesController::class, 'store'])->name('values.store');

Route::get('admin/equipo', [PersonalController::class, 'index'])->name('personal.index');
Route::post('admin/equipo', [PersonalController::class, 'store'])->name('personal.store');

Route::get('admin/departamentos', [DepartmentController::class, 'index'])->name('department.index');
Route::post('admin/departamentos', [DepartmentController::class, 'store'])->name('department.store');
