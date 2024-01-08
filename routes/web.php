<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileController;
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

    Route::get('/users', \App\Livewire\Users\Index::class)->name('users.index');
    Route::get('/users/{user}', \App\Livewire\Users\Preview::class)->name('users.preview');

    Route::get('/files', [FileController::class, 'index'])->name('files.index');
    Route::get('/files/{file}', [FileController::class, 'view'])->name('files.view');
    Route::post('/files/{file}/delete', [FileController::class, 'delete'])->name('files.delete');
    Route::get('/files/{file}/get', [FileController::class, 'get'])->name('files.get');
    Route::get('/files/{file}/download', [FileController::class, 'download'])->name('files.download');
});
