
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\PublicPostController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RssController;
use App\Http\Controllers\MarketDataController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\StatisticsController;
// Quản lý danh mục: chỉ admin đã đăng nhập được truy cập
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::resource('categories', CategoryController::class)
            ->except(['show']);
    });

Route::get('/', [HomeController::class, 'index'])->name('home');

// Đăng ký và đăng nhập
Route::middleware('guest')->group(function () {
    Route::get('/dang-ky', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/dang-ky', [AuthController::class, 'register'])
        ->name('register.store');

    Route::get('/dang-nhap', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/dang-nhap', [AuthController::class, 'login'])
        ->name('login.store');
});

// Đăng xuất
Route::post('/dang-xuat', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Chi tiết bài viết
Route::get('/bai-viet/{id}', [PublicPostController::class, 'show'])
    ->name('posts.show');
// Quản lý bài viết
Route::prefix('admin')
    ->name('admin.')
    ->controller(PostController::class)
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/posts', 'index')->name('posts.index');
        Route::get('/posts/create', 'create')->name('posts.create');
        Route::post('/posts', 'store')->name('posts.store');
        Route::get('/posts/{id}', 'show')->name('posts.show');
        Route::get('/posts/{id}/edit', 'edit')->name('posts.edit');
        Route::put('/posts/{id}', 'update')->name('posts.update');
        Route::delete('/posts/{id}', 'destroy')->name('posts.destroy');
    });
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::resource('categories', CategoryController::class)
            ->except(['show']);
    });

Route::post('/bai-viet/{id}/binh-luan', [CommentController::class, 'store'])
    ->middleware('auth')
    ->name('comments.store');

    // Sửa bình luận
Route::get('/binh-luan/{id}/sua', [CommentController::class, 'edit'])
    ->middleware('auth')
    ->name('comments.edit');

// Cập nhật bình luận
Route::put('/binh-luan/{id}', [CommentController::class, 'update'])
    ->middleware('auth')
    ->name('comments.update');

// Xóa bình luận
Route::delete('/binh-luan/{id}', [CommentController::class, 'destroy'])
    ->middleware('auth')
    ->name('comments.destroy');

Route::get('/rss', [RssController::class, 'index'])
    ->name('rss.index');
Route::get('/market/gold', [MarketDataController::class, 'gold'])
    ->name('market.gold');

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->controller(UserController::class)
    ->group(function () {
        Route::get('/users', 'index')->name('users.index');
        Route::patch('/users/{user}/role', 'updateRole')
            ->name('users.updateRole');
        Route::delete('/users/{user}', 'destroy')
            ->name('users.destroy');
    });
// Tài khoản cá nhân: chỉ người đã đăng nhập
Route::middleware('auth')->prefix('tai-khoan')->name('account.')->controller(AccountController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::put('/', 'update')->name('update');
    Route::put('/mat-khau', 'updatePassword')->name('password');
    Route::delete('/', 'destroy')->name('destroy');
});
// Quản lý thống kê: chỉ admin được truy cập
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/statistics', [StatisticsController::class, 'index'])
            ->name('statistics.index');
    });