<?php

use App\Http\Controllers\Administrators;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BenefitController;
use App\Http\Controllers\BenefitsController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\DepartmentController;
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
Route::get('/inicio', [PostController::class, 'getseven'])->name('home');
Route::get('/perfil', [ProfileController::class, 'index'])->name('profile');
Route::get('/procedimientos', [ProcedureController::class, 'index'])->name('procedure');
Route::get('/beneficios', [BenefitController::class, 'index'])->name('benefit');
Route::get('/normativas', [NormativeController::class, 'index'])->name('normative');
Route::get('/valores', [ValueController::class, 'index'])->name('our-values');
Route::get('/equipo', [TeamController::class, 'index'])->name('teams');
Route::get('/noticias', [PostController::class, 'index'])->name('post');
Route::get('/noticias/{slug}', [PostController::class, 'show'])->name('post.show');


/*Routes for admin user */
Auth::routes();

Route::get('admin/', [HomeController::class, 'index'])->name('admin');
Route::post('admin/', [LoginController::class, 'loginAdmin'])->name('login.admin');
Route::get('admin/dashboard', [Dashboard::class, 'index'])->name('admin.home');

Route::get('admin/procedimientos', [ProceduresController::class, 'index'])->name('procedures.index');

Route::get('admin/beneficios', [BenefitsController::class, 'index'])->name('benefits.index');

Route::get('admin/normativas', [NormativesController::class, 'index'])->name('normative.index');

Route::get('admin/nuestros-valores', [ValuesController::class, 'index'])->name('values.index');

Route::get('admin/equipo', [PersonalController::class, 'index'])->name('personal.index');

Route::get('admin/departamentos', [DepartmentController::class, 'index'])->name('department.index');
Route::get('admin/noticias', [NewsController::class, 'index'])->name('news.index');
Route::get('admin/noticias/new', [NewsController::class, 'create'])->name('news.new');
Route::post('admin/noticias/store', [NewsController::class, 'store'])->name('news.store');
Route::get('admin/noticias/{item}', [NewsController::class, 'edit'])->name('news.edit');
Route::patch('admin/noticias/{item}', [NewsController::class, 'update'])->name('news.update');


Route::get('admin/comunicados', [NewsController::class, 'release'])->name('releases.release');
Route::post('admin/comunicados', [NewsController::class, 'releaseStore'])->name('releases.store');
Route::get('admin/administradores', [Administrators::class, 'index'])->name('adminstrators.index');
