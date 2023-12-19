<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', fn () => redirect(route(Auth::check() ? 'dashboard' : 'login')));

Route::get('/login', fn() => view('pages.login'))->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::any('/logout', [AuthController::class, 'logout']);

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/dashboard', fn() => view('pages.dashboard'))->name('dashboard');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [UserController::class, 'view'])->name('users.view');
    Route::post('/users/{user}/delete', [UserController::class, 'delete'])->name('users.delete');

    Route::get('/files', [FileController::class, 'index'])->name('files.index');
    Route::get('/files/{file}', [FileController::class, 'view'])->name('files.view');
    Route::post('/files/{file}/delete', [FileController::class, 'delete'])->name('files.delete');
});
