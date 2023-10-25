<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::resource('projects', App\Http\Controllers\ProjectController::class);
Route::resource('projectStatuses', App\Http\Controllers\Project_statusController::class);
Route::resource('projectUsers', App\Http\Controllers\Project_userController::class);
Route::resource('todos', App\Http\Controllers\TodoController::class);
Route::resource('todoStatuses', App\Http\Controllers\Todo_statusController::class);
Route::resource('users', App\Http\Controllers\UserController::class);
Route::resource('roles', App\Http\Controllers\RoleController::class);
Route::resource('permissions', App\Http\Controllers\PermissionController::class);