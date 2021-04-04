<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AuthController;

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

/***********************************************************************************
 ************************** ROTAS PARA CHAMAR AS USUÁRIO ***************************
 ***********************************************************************************/
Route::get('/', [SiteController::class, 'searchRegister'])->name('search.register');
Route::get('/nome', [SiteController::class, 'searchName'])->name('search.name');
Route::get('/cpf', [SiteController::class, 'searchCpf'])->name('search.cpf');


/****************************************************************************************** */
// ------------------------------------- FUNCIONALIDADES ------------------------------------/
Route::get('/nome/buscar', [SiteController::class, 'findName'])->name('find.name');
Route::get('/cpf/buscar', [SiteController::class, 'findCpf'])->name('find.cpf');
Route::get('/search/buscar', [SiteController::class, 'findRegister'])->name('find.register');


/***********************************************************************************
 ****************** ROTAS PARA CHAMAR AS TELAS ADMINISTRAÇÃO ***********************
 ***********************************************************************************/
Route::get('/admin', [AuthController::class, 'index'])->name('admin.index');
Route::get('/admin/editar/{student}', [AuthController::class, 'edit'])->name('admin.edit');
Route::get('/admin/novo', [AuthController::class, 'new'])->name('admin.new');
Route::get('/admin/login', [AuthController::class, 'formLogin'])->name('admin.login');
Route::get('/admin/login/primeiro', [AuthController::class, 'firstAccess'])->name('admin.first.access');


/****************************************************************************************** */
// ------------------------------------- FUNCIONALIDADES ------------------------------------/
Route::put('/admin/put/{student}', [AuthController::class, 'formEdit'])->name('admin.form.edit');
Route::post('/admin/store', [AuthController::class, 'create'])->name('admin.store');
Route::get('/admin/destroy/{student}', [AuthController::class, 'destroy'])->name('admin.destroy');
Route::post('/admin/login/do', [AuthController::class, 'login'])->name('admin.login.do');
Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
Route::put('/admin/login/primeiro/put/{adm}', [AuthController::class, 'firstAccessDo'])->name('admin.first.do');

