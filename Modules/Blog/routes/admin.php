<?php

use Illuminate\Support\Facades\Route;
use Modules\Blog\app\Http\Controllers\Admin\CategoreyController;
use Modules\Blog\app\Http\Controllers\Admin\PostController;

Route::prefix('admin/blogs')->name('admin.blogs.')->middleware(['auth', 'admin', 'verified', 'can:Manage Blogs'])->group(function () {

    Route::resource('categories', CategoreyController::class)->only('index', 'store', 'update');
    Route::delete('categories/deleteMulti', [CategoreyController::class, 'deleteMulti'])->name('categories.deleteMulti');


    Route::resource('posts', PostController::class)->except('show', 'destroy');
    Route::delete('posts/deleteMulti', [PostController::class, 'deleteMulti'])->name('posts.deleteMulti');
    Route::get('getCat', [PostController::class, 'getCat'])->name('getCat');

});
