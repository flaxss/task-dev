<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserAuth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', [UserAuth::class, 'userLogin_get']);
Route::post('/login', [UserAuth::class, 'userLogin_post']);
Route::post('/logout', [UserAuth::class, 'logout']);

Route::get('/user-management', [UserController::class, 'user'])->name('view.user');
Route::get('/add-user', [UserController::class, 'add_user_get']);
Route::post('/add-user', [UserController::class, 'add_user_post'])->name('add.user');

Route::get('/update-user/{id}', [UserController::class, 'update_user_get'])->name('update.user');
Route::post('/update-user/{id}', [UserController::class, 'update_user_post'])->name('update.user');

Route::get('/disable-user/{id}', [UserController::class, 'disable_user'])->name('disable.user');
Route::get('/enable-user/{id}', [UserController::class, 'enable_user'])->name('enable.user');

Route::get('/roles', [UserController::class, 'role'])->name('view.role');
Route::post('/roles', [UserController::class, 'add_role'])->name('add.role');
Route::get('/disable-role/{id}', [UserController::class, 'disable_role'])->name('disable.role');
Route::get('/enable-role/{id}', [UserController::class, 'enable_role'])->name('enable.role');

Route::get('/departments', [UserController::class, 'department'])->name('view.department');
Route::post('/departments', [UserController::class, 'add_department'])->name('add.department');

Route::get('/disable-department/{id}', [UserController::class, 'disable_department'])->name('disable.department');
Route::get('/enable-department/{id}', [UserController::class, 'enable_department'])->name('enable.department');

Route::get('/monitoring', [UserController::class, 'monitoring'])->name('view.monitoring');
Route::get('/login-records', [UserController::class, 'login_record'])->name('view.logs');