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

Route::get('/usuarios', [App\Http\Controllers\UserController::class, 'index'])->name('admin.users');

Route::get('crear/usuarios', [App\Http\Controllers\UserController::class, 'vewCreateUSers'])->name('register-new-users');

Route::post('nuevo/usuario', [App\Http\Controllers\UserController::class, 'create'])->name('new-user');

// roles

Route::get('/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('index-roles');

Route::get('create/role', [App\Http\Controllers\RoleController::class, 'viewCreateRole'])->name('create-role');

Route::post('nuevo/role', [App\Http\Controllers\RoleController::class, 'create'])->name('create-role-new');

Route::get('store/edit', [App\Http\Controllers\RoleController::class, 'store'])->name('edithRole');