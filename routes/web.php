<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
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
    return view('home');
})->name('home');

// Auth routes
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

// Guest routes
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

// Non-guest routes
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::post('/posts', [PostController::class, 'store']);
Route::post('/posts/download', [PostController::class, 'download'])->name('download');
Route::get('/posts/{id}', [PostController::class, 'getPost'])->name('posts.view');


Route::get('/posts/edit/{id}', [PostController::class, 'editForm'])->name('posts.edit');
Route::post('/posts/edit/{id}', [PostController::class, 'edit']);
Route::get('/posts/delete/{id}', [PostController::class, 'deleteForm'])->name('posts.delete');
Route::post('/posts/delete/{id}', [PostController::class, 'delete']);
