<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Ebook;
use App\Models\Video;
use App\Models\Content;
use App\Models\Setting;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EbookController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\UserEbookController;
use App\Http\Controllers\UserVideoController;
use App\Http\Controllers\AdminEbookController;
use App\Http\Controllers\AdminVideoController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\AdminContentController;
use App\Http\Controllers\AdminNewUserController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AdminSubContentController;
use App\Http\Controllers\AdminAnnouncementController;
use App\Http\Controllers\AdminPostCategoryController;
use App\Http\Controllers\UserPlaylistVideoController;
use App\Http\Controllers\AdminAdvertisementController;
use App\Http\Controllers\AdminEbookCategoryController;
use App\Http\Controllers\AdminSubSubContentController;
use App\Http\Controllers\UserChangePasswordController;
use App\Http\Controllers\AdminChangePasswordController;
use App\Http\Controllers\AdminPlaylistVideoController;

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
    return view('index', [
        'posts' => Post::orderBy('created_at', 'DESC')->limit(9)->get(),
        'ebooks' => Ebook::orderBy('created_at', 'DESC')->limit(10)->get(),
        'videos' => Video::orderBy('created_at', 'DESC')->limit(5)->get(),
        'primaryAds' => Advertisement::where('type', 'primary')->get(),
        'secondaryAds' => Advertisement::where('type', 'seccondary')->get(),
        'contents' => Content::with(['subContents', 'subContents.subSubContents'])->get(),
        'isPopularVideos' => Video::with('user')->where('is_popular', true)->orderBy('created_at', 'DESC')->get(),
        'data' => Setting::all()
    ]);
});

Route::controller(ContentController::class)->group(function () {
    Route::get('content/{content:slug}', 'show');
    Route::get('sub-content/{subContent:slug}', 'subshow');
    Route::get('sub-sub-content/{subSubContent:slug}', 'subsubshow');
});

Route::resource('/posts', PostController::class);
Route::resource('/ebooks', EbookController::class);
Route::get('/ebooks/{ebook:slug}/read', [EbookController::class, 'read']);
Route::resource('/videos', VideoController::class);
Route::resource('/announcements', AnnouncementController::class);
Route::get('/announcements/{announcement:slug}/pdf', [AnnouncementController::class, 'pdf']);

Route::middleware('guest')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'index');
        Route::post('/login', 'authenticate');
        Route::get('/register', 'register');
        Route::post('register', 'authenticateRegister');
        Route::get('/forgot-password', 'forgotPassword');
        Route::post('/forgot-password', 'checkDataForgotPassword');
        Route::get('/change-password', 'changeForgotPassword');
        Route::post('/change-password', 'changePassword');
        Route::post('/logout', 'logout');
    });
});


// Admin Route
Route::middleware('auth', 'is_admin')->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard.index', [
            'data' => Setting::all(),
            'users' => User::where('role', 'author')->count(),
            'posts' => Post::all(),
            'ebooks' => Ebook::all(),
            'videos' => Video::all(),
        ]);
    });
    Route::resource('/admin/users', AdminUserController::class);

    Route::controller(AdminNewUserController::class)->group(function () {
        Route::get('/admin/new-users', 'index');
        Route::get('/admin/new-users/{user:username}', 'show');
        Route::delete('/admin/new-users/{user:username}', 'destroy');
    });

    Route::post('/admin/send-register-mail', [MailController::class, 'sendRegisterMail']);

    Route::resource('/admin/posts', AdminPostController::class);
    Route::resource('/admin/post-categories', AdminPostCategoryController::class);
    Route::resource('/admin/ebooks', AdminEbookController::class);
    Route::resource('/admin/ebook-categories', AdminEbookCategoryController::class);
    Route::resource('/admin/videos', AdminVideoController::class);
    Route::resource('/admin/playlist-videos', AdminPlaylistVideoController::class);
    Route::resource('/admin/announcements', AdminAnnouncementController::class);
    Route::resource('/admin/advertisements', AdminAdvertisementController::class);
    Route::resource('/admin/contents', AdminContentController::class);
    Route::resource('/admin/sub-contents', AdminSubContentController::class);
    Route::resource('/admin/sub-sub-contents', AdminSubSubContentController::class);
    Route::resource('/admin/settings', SettingController::class);
    Route::resource('/admin/profiles', AdminProfileController::class);
    Route::resource('/admin/change-password', AdminChangePasswordController::class);
});


// User Route
Route::middleware('auth', 'is_user')->group(function () {
    Route::get('/user', function () {
        return view('user.dashboard.index', [
            'data' => Setting::all(),
            'posts' => Post::where('user_id', auth()->user()->id)->get(),
            'ebooks' => Ebook::where('user_id', auth()->user()->id)->get(),
            'videos' => Video::where('user_id', auth()->user()->id)->get(),
        ]);
    });
    Route::resource('/user/posts', UserPostController::class);
    Route::resource('/user/ebooks', UserEbookController::class);
    Route::resource('/user/videos', UserVideoController::class);
    Route::resource('/user/playlist-videos', UserPlaylistVideoController::class);
    Route::resource('/user/profiles', UserProfileController::class);
    Route::resource('/user/change-password', UserChangePasswordController::class);
});
