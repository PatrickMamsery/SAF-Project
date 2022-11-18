<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminPhotoController;
use App\Http\Controllers\Admin\AdminPagesController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminInfoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProfilePhotosController;
// use App\Http\Controllers\MailController;

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
Route::get('/admin/users', [AdminPagesController::class, 'getUsers'])->name('users'); // Need to change this
Route::get('/admin/posts', [AdminPagesController::class, 'getPosts'])->name('posts');
Route::get('/admin/infos', [AdminInfoController::class, 'getInfos'])->name('info_list');
Route::get('/admin/addInfo', [AdminInfoController::class, 'addInfoView'])->name('addInfo');
Route::get('/admin/home', [AdminPagesController::class, 'overview'])->name('dash');

/* Admin actions --> search routes */
Route::get('search_users/{q?}', [AdminUserController::class, 'search']);

/* Administrative dashboard routes */
Route::post('/adminDeletePhoto', [AdminPhotoController::class, 'deletePhoto'])->name('admin.deletePhoto');
Route::post('/adminDeleteUser', [AdminUserController::class, 'deleteUser'])->name('admin.deleteUser');
Route::post('/adminElevateUserRole', [AdminUserController::class, 'elevateUserRole'])->name('admin.elevateUserRole');
Route::post('/adminDemoteAccess', [AdminUserController::class, 'demoteAccess'])->name('admin.demoteAccess');
Route::post('/adminResetPassword', [AdminUserController::class, 'resetPassword'])->name('admin.resetPassword');

/* New admininistrative dashboard routes and actions */
Route::post('/adminBulkUploadUsers', [AdminUserController::class, 'bulkUploadUsers'])->name('admin.bulkUploadUsers');

/* Info Routes */
Route::post('/adminAddInfo', [AdminInfoController::class, 'addInfo'])->name('admin.addInfo');
Route::post('/adminDeleteInfo', [AdminInfoController::class, 'deleteInfo'])->name('admin.deleteInfo');

/* Mail Routes */
// Route::get('/send-mail', [MailController::class, 'sendEmail']);

// User Dashboard routes
Route::get('/user/user_profile/{id}', [UserController::class, 'userDash'])->name('user_dash');
Route::get('/user/posts/{id}', [UserController::class, 'getUserPosts'])->name('user_posts');
Route::post('/user/{id}/password_reset', [UserController::class, 'passwordReset'])->name('user.passwordReset');

/* Membership form routes */
Route::get('/membership_form', [UserController::class, 'index'])->name('membership_form');
Route::post('/addUserDetails', [UserController::class, 'store']);


Route::post('/deletePhoto', [PhotoController::class, 'deletePhoto'])->name('deletePhoto');
Route::post('/addProfilePhoto', [ProfilePhotosController::class, 'addProfilePhoto']);
Route::post('/editProfilePhoto', [ProfilePhotosController::class, 'editProfilePhoto']);

Route::get('/gallery', [GalleryController::class, 'getPhotos'])->name('gallery');
Route::get('/about', [PagesController::class, 'about'])->name('about');

/* Photo attributes : Likes, Comments, Views */
Route::post('/user/addLike', [PhotoController::class, 'addLike']);
Route::post('/user/addComment', [PhotoController::class, 'addComment'])->name('addComment');


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
    $infos = App\Models\Info::where('inhouse', 0)->get();
    return view('index', [
        'infos' => $infos,
    ]);
});

/* Redirect if server is down */
// Route::get('/site-down', function() {
//     return view('site_down');
// });

Route::get('test', function () {
	event(new App\Events\NewRegisteredMember('Patrick'));
	return "Event has been sent!";
});
