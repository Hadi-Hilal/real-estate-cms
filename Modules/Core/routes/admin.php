<?php

use Illuminate\Support\Facades\Route;
use Modules\Core\app\Http\Controllers\Admin\CoreController;


Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin', 'verified'])->group(function () {
    Route::prefix('core')->name('core.')->group(function () {
        Route::resource('core', CoreController::class);
    });
});
