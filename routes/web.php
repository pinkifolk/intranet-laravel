<?php

use App\Http\Controllers\BenefitController;
use App\Http\Controllers\NormativeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProcedureController;
use App\Http\Controllers\ValueController;

use App\Http\Controllers\HomeController;
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
