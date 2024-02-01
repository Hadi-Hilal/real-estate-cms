<?php

use Illuminate\Support\Facades\Route;
use Modules\Blog\app\Http\Controllers\Admin\CategoreyController;


Route::prefix('admin/blogs')->name('admin.blogs.')->middleware(['auth', 'admin', 'verified', 'can:Manage Blogs'])->group(function () {

    Route::resource('categories', CategoreyController::class)->only('index', 'store', 'update');
    Route::delete('categories/deleteMulti', [CategoreyController::class, 'deleteMulti'])->name('categories.deleteMulti');
});
