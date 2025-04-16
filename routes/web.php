<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CkeditorController;
Route::get('/login', [AuthenticationController::class, 'index'])->name('login');
Route::post('/post-login', [AuthenticationController::class, 'postLogin'])->name('postLogin');
Route::get('/register', [AuthenticationController::class, 'register'])->name('register');
Route::post('/post-register', [AuthenticationController::class, 'postRegister'])->name('postRegister');
// logout 
Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');

// Route::prefix('dashboard')->group(function () {
//     Route::get('/', [AdminController::class, 'index'])->name('dashboard.index');
//     // Route::resource('categories', CategoryController::class);

// });
Route::prefix('dashboard')->middleware(['admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard.index');
    Route::get('categories', [\App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('categories.index');
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class)->except(['index']);
    Route::get('products', [\App\Http\Controllers\Admin\ProductController::class, 'index'])->name('products.index');
    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class)->except(['index']);

    // Route cho CKEditor upload
    Route::post('ckeditor/upload', [CkeditorController::class, 'upload'])->name('ckeditor.upload');

    //
    Route::resource('posts', PostController::class);


});