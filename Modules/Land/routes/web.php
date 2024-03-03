<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Land\app\Http\Controllers\LandController;


Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    require __DIR__ . '/admin.php';
    Route::get('{country}/lands/', [LandController::class, 'index'])->name('lands');
    Route::get('lands/{slug}', [LandController::class, 'show'])->name('lands.show');
});

