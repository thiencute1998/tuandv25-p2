<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\Admin\PhotoEditingController;
use App\Http\Controllers\Admin\VirtualStagingController;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CalendarController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\LinkController;
use App\Http\Controllers\Viewer\IndexController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\TabHomeController;
use App\Http\Controllers\Admin\AboutController;

use App\Http\Controllers\Viewer\HomeController;
use App\Http\Controllers\PhotoEditingViewerController;
use App\Http\Controllers\VirtualStagingViewerController;
use App\Http\Controllers\FloorPlanViewerController;
use App\Http\Controllers\VideoSlideShowViewerController;
use App\Http\Controllers\Viewer\ContactUsController;
use App\Http\Controllers\Viewer\HowToWorkController as HowToWorkViewerController;
use Illuminate\Support\Facades\Storage;
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

//Route::get('products', function(Request $request) {
//    $query = \App\Models\Product::query();
//    $products = $query->paginate(5);
//    return view('admin.pages.product.products', compact('products'));
//});

Route::get('/login', [AuthController::class, 'index'])->name('login-index');

Route::post('/login', [AuthController::class, 'login'])->name('login-auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout-auth');


Route::prefix('admin')->middleware(['checkLogin'])->group(function () {
    Route::get('/', function() {
        return view('admin.index');
    })->name('admin-index');

    Route::prefix('banner')->group(function () {
        Route::get('/', [BannerController::class, 'index'])->name('admin-banner');
        Route::get('/create', [BannerController::class, 'create'])->name('admin-banner-create');
        Route::post('/store', [BannerController::class, 'store'])->name('admin-banner-store');
        Route::get('/edit/{id}', [BannerController::class, 'edit'])->name('admin-banner-edit');
        Route::post('/update/{id}', [BannerController::class, 'update'])->name('admin-banner-update');
        Route::get('/delete/{id}', [BannerController::class, 'delete'])->name('admin-banner-delete');
    });

    Route::prefix('manage')->group(function () {
        Route::prefix('users')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('users');
            Route::get('/create', [UserController::class, 'create'])->name('users-create');
            Route::post('/store', [UserController::class, 'store'])->name('users-store');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users-edit');
            Route::post('/update/{id}', [UserController::class, 'update'])->name('users-update');
            Route::get('/delete/{id}', [UserController::class, 'delete'])->name('users-delete');
            Route::post('/upload', [UserController::class, 'upload'])->name('users-upload');
            Route::get('/edit-password', [UserController::class, 'editPassword'])->name('edit-password');
            Route::post('/update-password', [UserController::class, 'updatePassword'])->name('update-password');
        });

    });

    Route::prefix('configs')->group(function () {
        Route::get('/', [ConfigController::class, 'index'])->name('configs');
        Route::post('/update', [ConfigController::class, 'update'])->name('configs-update');
    });

    //
    Route::prefix('category')->group(function() {
        Route::get('/', [CategoryController::class, 'index'])->name('admin-category');
        Route::get('/create', [CategoryController::class, 'create'])->name('admin-category-create');
        Route::post('/store', [CategoryController::class, 'store'])->name('admin-category-store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('admin-category-edit');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('admin-category-update');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('admin-category-delete');
        Route::post('/get-parent', [CategoryController::class, 'getParent'])->name('admin-category-get-parent');
    });

    Route::prefix('tag')->group(function() {
        Route::get('/', [TagController::class, 'index'])->name('admin-tag');
        Route::get('/create', [TagController::class, 'create'])->name('admin-tag-create');
        Route::post('/store', [TagController::class, 'store'])->name('admin-tag-store');
        Route::get('/edit/{id}', [TagController::class, 'edit'])->name('admin-tag-edit');
        Route::post('/update/{id}', [TagController::class, 'update'])->name('admin-tag-update');
        Route::get('/delete/{id}', [TagController::class, 'delete'])->name('admin-tag-delete');
        Route::post('/get-all', [TagController::class, 'getALl'])->name('admin-tag-get-all');
    });

    Route::prefix('post')->group(function() {
        Route::get('/', [PostController::class, 'index'])->name('admin-post');
        Route::get('/create', [PostController::class, 'create'])->name('admin-post-create');
        Route::post('/store', [PostController::class, 'store'])->name('admin-post-store');
        Route::get('/edit/{id}', [PostController::class, 'edit'])->name('admin-post-edit');
        Route::post('/update/{id}', [PostController::class, 'update'])->name('admin-post-update');
        Route::get('/delete/{id}', [PostController::class, 'delete'])->name('admin-post-delete');
        Route::post('/get-parent', [PostController::class, 'getParent'])->name('admin-post-get-parent');
        Route::post('/ckeditor/image_upload', [PostController::class, 'ckeditorUpload'])->name('admin-post-ckeditor-upload');
    });

    Route::prefix('calendar')->group(function() {
        Route::get('/', [CalendarController::class, 'index'])->name('admin-calendar');
        Route::get('/create', [CalendarController::class, 'create'])->name('admin-calendar-create');
        Route::post('/store', [CalendarController::class, 'store'])->name('admin-calendar-store');
        Route::get('/edit/{id}', [CalendarController::class, 'edit'])->name('admin-calendar-edit');
        Route::post('/update/{id}', [CalendarController::class, 'update'])->name('admin-calendar-update');
        Route::get('/delete/{id}', [CalendarController::class, 'delete'])->name('admin-calendar-delete');
        Route::post('/ckeditor/image_upload', [CalendarController::class, 'ckeditorUpload'])->name('admin-calendar-ckeditor-upload');
    });

    Route::prefix('link')->group(function () {
        Route::get('/', [LinkController::class, 'index'])->name('admin-link');
        Route::get('/create', [LinkController::class, 'create'])->name('admin-link-create');
        Route::post('/store', [LinkController::class, 'store'])->name('admin-link-store');
        Route::get('/edit/{id}', [LinkController::class, 'edit'])->name('admin-link-edit');
        Route::post('/update/{id}', [LinkController::class, 'update'])->name('admin-link-update');
        Route::get('/delete/{id}', [LinkController::class, 'delete'])->name('admin-link-delete');
    });

    Route::prefix('video')->group(function() {
        Route::get('/', [VideoController::class, 'index'])->name('admin-video');
        Route::get('/create', [VideoController::class, 'create'])->name('admin-video-create');
        Route::post('/store', [VideoController::class, 'store'])->name('admin-video-store');
        Route::get('/edit/{id}', [VideoController::class, 'edit'])->name('admin-video-edit');
        Route::post('/update/{id}', [VideoController::class, 'update'])->name('admin-video-update');
        Route::get('/delete/{id}', [VideoController::class, 'delete'])->name('admin-video-delete');
        Route::post('/ckeditor/image_upload', [VideoController::class, 'ckeditorUpload'])->name('admin-video-ckeditor-upload');
    });

    Route::prefix('tabhome')->group(function() {
        Route::get('/', [TabHomeController::class, 'index'])->name('admin-tabhome');
        Route::get('/create', [TabHomeController::class, 'create'])->name('admin-tabhome-create');
        Route::post('/store', [TabHomeController::class, 'store'])->name('admin-tabhome-store');
        Route::get('/edit/{id}', [TabHomeController::class, 'edit'])->name('admin-tabhome-edit');
        Route::post('/update/{id}', [TabHomeController::class, 'update'])->name('admin-tabhome-update');
        Route::get('/delete/{id}', [TabHomeController::class, 'delete'])->name('admin-tabhome-delete');
        Route::post('/ckeditor/image_upload', [TabHomeController::class, 'ckeditorUpload'])->name('admin-tabhome-ckeditor-upload');
    });

    Route::prefix('configs')->group(function () {
        Route::get('/', [ConfigController::class, 'index'])->name('admin-configs');
        Route::post('/update', [ConfigController::class, 'update'])->name('admin-configs-update');
    });

    Route::prefix('about')->group(function () {
        Route::get('/', [AboutController::class, 'index'])->name('admin-about');
        Route::post('/update', [AboutController::class, 'update'])->name('admin-about-update');
    });

    Route::prefix('email')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\EmailSignUpController::class, 'index'])->name('admin-email');
    });

});

Route::get('/', [IndexController::class, 'index'])->name('index');
//Route::get('category/{cate}', [IndexController::class, 'getCate'])->name('get-cate');
Route::get('event/{event}', [IndexController::class, 'getEventCalendar'])->name('get-event-calendar');
Route::post('/get-event', [IndexController::class, 'getEvent'])->name('get-event');
Route::get('/events', [IndexController::class, 'events'])->name('events');
Route::get('/tag/{post}', [IndexController::class, 'getTag'])->name('tag');
Route::get('/tim-nha-tho-gan-day', [IndexController::class, 'findChurch'])->name('find-church');
Route::get('/video/{video}', [IndexController::class, 'getVideo'])->name('get-video');
Route::get('/danh-sach-giao-hat-xu-ho', [IndexController::class, 'getMap'])->name('get-map');
Route::get('/{post}', [IndexController::class, 'getPost'])->name('get-post');
Route::post('/search-post', [IndexController::class, 'searchPost'])->name('search-post');
Route::get('/search-all-post/{post}', [IndexController::class, 'searchAllPost'])->name('search-all-post');
Route::post('sign-up-email', [IndexController::class, 'signUpEmail'])->name('sign-up-email');
Route::post('/plus-view-post', [IndexController::class, 'plusViewPost'])->name('plus-view-post');
Route::post('/plus-view-event', [IndexController::class, 'plusViewEvent'])->name('plus-view-event');

Route::get('/test/data', function() {
    $data = \App\Models\Post::whereNotNull('category_id')->get();
    $arr = [];
    foreach ($data as $item) {
        $arr[] = [
            "category_id"=> $item->category_id,
            "post_id"=> $item->id
        ];
    }

    \App\Models\PostCategory::insert($arr);

    return 1;
});



