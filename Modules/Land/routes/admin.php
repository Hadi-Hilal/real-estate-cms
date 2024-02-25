<?php

use Illuminate\Support\Facades\Route;
use Modules\Land\app\Http\Controllers\Admin\LandController;
use Modules\Land\app\Http\Controllers\Admin\LandTypeController;
use Modules\Land\app\Http\Controllers\Admin\LandFeatureController;

Route::prefix('admin/lands')->name('admin.lands.')->middleware(['auth', 'admin', 'verified', 'can:Manage Lands'])->group(function () {

    Route::resource('types', LandTypeController::class)->only('index', 'store', 'update');
    Route::delete('types/deleteMulti', [LandTypeController::class, 'deleteMulti'])->name('types.deleteMulti');

    Route::resource('features', LandFeatureController::class)->only('index', 'store', 'update');
    Route::delete('features/deleteMulti', [LandFeatureController::class, 'deleteMulti'])->name('features.deleteMulti');

    Route::resource('lists', LandController::class)->except('destroy', 'show');
    Route::delete('lists/deleteMulti', [LandController::class, 'deleteMulti'])->name('lists.deleteMulti');

});
