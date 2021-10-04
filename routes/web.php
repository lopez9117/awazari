<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/admin', function () {
    return view('admin.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// usuarios

Route::get('/usuarios', [App\Http\Controllers\UserController::class, 'index'])->name('admin.users');

Route::get('crear/usuarios', [App\Http\Controllers\UserController::class, 'vewCreateUSers'])->name('register-new-users');

Route::post('nuevo/usuario', [App\Http\Controllers\UserController::class, 'create'])->name('new-user');

Route::get('usuario/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('admin.usuarios.edit');

Route::put('update/usuarios', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');


Route::get('usuario/destroy', [App\Http\Controllers\UserController::class, 'destroy'])->name('admin.usuarios.destroy');

// roles

Route::get('/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('index-roles');

Route::get('create/role', [App\Http\Controllers\RoleController::class, 'viewCreateRole'])->name('create-role');

Route::post('nuevo/role', [App\Http\Controllers\RoleController::class, 'store'])->name('create-role-new');

Route::get('store/edit', [App\Http\Controllers\RoleController::class, 'edit'])->name('admin.roles.edit');

Route::put('role/upsate', [App\Http\Controllers\RoleController::class, 'update'])->name('roles.update');

Route::post('role/destroy', [App\Http\Controllers\RoleController::class, 'destroy'])->name('role.destroy');