<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Property\app\Http\Controllers\PropertyController;

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    require __DIR__ . '/admin.php';
    Route::get('{country}/properties', [PropertyController::class, 'index'])->name('properties');
    Route::get('properties/{slug}', [PropertyController::class, 'show'])->name('properties.show');
});

