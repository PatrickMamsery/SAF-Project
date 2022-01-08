<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PhotoController;

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

/* Dashboard routes */
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
Route::get('/dash', [HomeController::class, 'indexDash'])->name('dash');
Route::get('/user_dash', [HomeController::class, 'userDash'])->name('user_dash');

Route::get('/gallery', [GalleryController::class, 'getPhotos'])->name('gallery');
Route::get('/about', [PagesController::class, 'about'])->name('about');

/* Register routes */
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/logout', [LoginController::class, 'logout']);

/* Add Photo Posts routes */
Route::post('/addPhoto', [PhotoController::class, 'addPhoto']);

Route::get('/', function () {
    return view('index');
});
