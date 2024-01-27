<?php


use Illuminate\Support\Facades\Route;
use Modules\Settings\app\Http\Controllers\Admin\SeoController;
use Modules\Settings\app\Http\Controllers\Admin\SettingsController;

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin', 'verified', 'can:Manage Settings'])->group(function () {
    Route::resource('settings', SettingsController::class)->only('index', 'store');
    Route::resource('seo', SeoController::class)->only('index', 'store');

});
