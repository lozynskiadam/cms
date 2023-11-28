<?php

use App\Http\Controllers\AuthController;
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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', fn() => view('pages.dashboard'))->name('dashboard');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users/factory', [UserController::class, 'factory'])->name('users.factory');
    Route::get('/users/{user}', [UserController::class, 'view'])->name('users.view');
    Route::post('/users/{user}', [UserController::class, 'delete'])->name('users.delete');
});
