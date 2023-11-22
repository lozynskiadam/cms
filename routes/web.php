<?php

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

Route::get('/', function () {
    return redirect(route(Auth::check() ? 'dashboard' : 'login'));
});

Route::get('/login', fn() => view('pages.welcome'))->name('login');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', fn() => view('pages.welcome'))->name('dashboard');
});
