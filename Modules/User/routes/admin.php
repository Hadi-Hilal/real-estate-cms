<?php

use Illuminate\Support\Facades\Route;
use Modules\User\app\Http\Controllers\Admin\AdminController;
use Modules\User\app\Http\Controllers\Admin\UserController;

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin', 'verified', 'can:Manage Users & Admins'])->group(function () {
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::delete('/deleteMulti', [UserController::class, 'deleteMulti'])->name('deleteMulti');
        Route::get('/switch/{user}', [UserController::class, 'switch'])->name('switch');
    });

    Route::prefix('admins')->name('admins.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::delete('/deleteMulti', [AdminController::class, 'deleteMulti'])->name('deleteMulti');
        Route::get('/switch/{user}', [AdminController::class, 'switch'])->name('switch');
    });

});
