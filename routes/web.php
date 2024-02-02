<?php

use App\Http\Controllers\AuthController;
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
    Route::get('/dashboard', \App\Livewire\Dashboard\Pages\Index::class)->name('dashboard');

    Route::get('/users', \App\Livewire\Users\Pages\Index::class)->name('users.index');
    Route::get('/users/{user}', \App\Livewire\Users\Pages\Preview::class)->name('users.preview');

    Route::get('/files', \App\Livewire\Files\Pages\Index::class)->name('files.index');
    Route::get('/files/{file}', \App\Livewire\Files\Pages\Preview::class)->name('files.preview');

    Route::get('/settings', \App\Livewire\Settings\Pages\Index::class)->name('settings.index');
});
