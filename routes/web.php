<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegsterController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
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
Route::get('/crear-cuenta',[RegsterController::class, 'index'])->name('register');
Route::post('/nuevo-usuario',[RegsterController::class, 'store']);

Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/{user:username}',[PostController::class, 'index'])->name('post.index'); //RoRoute Model Building
Route::get('post/create', [PostController::class, 'create'])->name('post.create');
Route::post('/posts', [PostController::class, 'store'])->name('post.store');
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name('post.show');
Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('post.destroy');

Route::post('/{user:username}/posts/{post}', [ComentarioController::class, 'store'])->name('comentarios.store');

Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');

Route::post('/posts/{post}/likes', [LikeController::class, 'store'])->name('post.likes.store');