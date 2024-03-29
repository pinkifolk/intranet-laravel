<?php

use App\Http\Controllers\Administrators;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BenefitController;
use App\Http\Controllers\BenefitsController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
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

Route::get('/', [LoginController::class, 'formLogin'])->name('login');
Route::get('/inicio', [PostController::class, 'getseven'])->middleware('auth')->name('home');
Route::get('/perfil', [ProfileController::class, 'index'])->middleware('auth')->name('profile');
Route::get('/procedimientos', [ProcedureController::class, 'index'])->middleware('auth')->name('procedure');
Route::get('/beneficios', [BenefitController::class, 'index'])->middleware('auth')->name('benefit');
Route::get('/normativas', [NormativeController::class, 'index'])->middleware('auth')->name('normative');
Route::get('/valores', [ValueController::class, 'index'])->middleware('auth')->name('our-values');
Route::get('/equipo', [TeamController::class, 'index'])->middleware('auth')->name('teams');
Route::get('/equipo/{department}', [TeamController::class, 'department'])->name('department');
Route::get('/galeria/', [GalleryController::class, 'index'])->name('gallery');
Route::get('/galeria/{slug}', [GalleryController::class, 'show'])->name('gallery.show');
Route::get('/noticias', [PostController::class, 'index'])->middleware('auth')->name('post');
Route::get('/noticias/{slug}', [PostController::class, 'show'])->middleware('auth')->name('post.show');


/*Routes for admin user */
Auth::routes(['register' => false]);


Route::get('admin/dashboard', [Dashboard::class, 'index'])->middleware('admins')->name('admin.home');
Route::get('admin/procedimientos', [ProceduresController::class, 'index'])->middleware('admins')->name('procedures.index');

Route::get('admin/beneficios', [BenefitsController::class, 'index'])->middleware('admins')->name('benefits.index');

Route::get('admin/normativas', [NormativesController::class, 'index'])->middleware('admins')->name('normative.index');

Route::get('admin/nuestros-valores', [ValuesController::class, 'index'])->middleware('admins')->name('values.index');

Route::get('admin/equipo', [PersonalController::class, 'index'])->middleware('admins')->name('personal.index');

Route::get('admin/departamentos', [DepartmentController::class, 'index'])->middleware('admins')->name('department.index');
Route::get('admin/galeria', [GalleryController::class, 'admin'])->middleware('admins')->name('gallery.admin');
Route::get('admin/noticias', [NewsController::class, 'index'])->middleware('admins')->name('news.index');
Route::get('admin/noticias/new', [NewsController::class, 'create'])->middleware('admins')->name('news.new');
Route::post('admin/noticias/store', [NewsController::class, 'store'])->middleware('admins')->name('news.store');
Route::post('admin/noticias/upload', [NewsController::class, 'upload'])->middleware('auth')->name('admin.upload');
Route::get('admin/noticias/{news}', [NewsController::class, 'edit'])->middleware('admins')->name('news.edit');
Route::patch('admin/noticias/{news}', [NewsController::class, 'update'])->middleware('admins')->name('news.update');


Route::get('admin/comunicados', [NewsController::class, 'release'])->middleware('admins')->name('releases.release');
Route::post('admin/comunicados', [NewsController::class, 'releaseStore'])->middleware('admins')->name('releases.store');
Route::get('admin/administradores', [Administrators::class, 'index'])->middleware('admins')->name('adminstrators.index');



