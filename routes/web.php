<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegsterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;

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
    return view('layouts.app');
});
Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');
Route::get('/crear-cuenta',[RegsterController::class, 'index'])->name('register');
Route::post('/nuevo-usuario',[RegsterController::class, 'store']);

Route::get('/muro',[PostController::class, 'index'])->name('post.index');
