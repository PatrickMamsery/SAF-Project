<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminPhotoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProfilePhotosController;

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
Route::get('/dash', [HomeController::class, 'indexDash'])->name('dash');
Route::get('/user_dash', [HomeController::class, 'userDash'])->name('user_dash');

/* Administrative dashboard routes */
Route::post('/adminDeletePhoto', [AdminPhotoController::class, 'deletePhoto'])->name('admin.deletePhoto');

/* User Dashboard routes */
Route::post('/deletePhoto', [PhotoController::class, 'deletePhoto'])->name('deletePhoto');
Route::post('/addProfilePhoto', [ProfilePhotosController::class, 'addProfilePhoto']);
Route::post('/editProfilePhoto', [ProfilePhotosController::class, 'editProfilePhoto']);

Route::get('/gallery', [GalleryController::class, 'getPhotos'])->name('gallery');
Route::get('/about', [PagesController::class, 'about'])->name('about');

/* Photo attributes : Likes, Comments, Views */
Route::post('/user/addLike', [PhotoController::class, 'addLike']);
Route::post('/user/addComment', [PhotoController::class, 'addComment'])->name('addComment');

/* Membership form routes */
Route::get('/membership_form', [UserController::class, 'index'])->name('membership_form');
Route::post('/addUserDetails', [UserController::class, 'store']);

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
    // $user = App\Models\User::with('profilePhoto')->find(auth()->user()->id);
    return view('index');
});

Route::get('test', function () {
	event(new App\Events\NewRegisteredMember('Patrick'));
	return "Event has been sent!";
});
