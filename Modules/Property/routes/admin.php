<?php

use Illuminate\Support\Facades\Route;
use Modules\Property\app\Http\Controllers\Admin\PropertyController;
use Modules\Property\app\Http\Controllers\Admin\PropertyFeatureController;
use Modules\Property\app\Http\Controllers\Admin\PropertyTypeController;

Route::prefix('admin/properties')->name('admin.properties.')->middleware(['auth', 'admin', 'verified', 'can:Manage Properties'])->group(function () {

    Route::resource('types', PropertyTypeController::class)->only('index', 'store', 'update');
    Route::delete('types/deleteMulti', [PropertyTypeController::class, 'deleteMulti'])->name('types.deleteMulti');

    Route::resource('features', PropertyFeatureController::class)->only('index', 'store', 'update');
    Route::delete('features/deleteMulti', [PropertyFeatureController::class, 'deleteMulti'])->name('features.deleteMulti');

    Route::resource('lists', PropertyController::class)->except('destroy', 'show');
    Route::delete('lists/deleteMulti', [PropertyController::class, 'deleteMulti'])->name('lists.deleteMulti');




});
