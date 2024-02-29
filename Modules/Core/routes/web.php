<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Core\app\Http\Controllers\CountryController;
use Modules\Core\app\Http\Controllers\HomeController;


Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('turkish-citizenship', [HomeController::class, 'citizenship'])->name('citizenship');

    Route::get('getStates', [CountryController::class, 'getStates'])->name('getStates');

    Route::get('getCities', [CountryController::class, 'getCities'])->name('getCities');

    Route::get('getDistricts', [CountryController::class, 'getDistricts'])->name('getDistricts');

});

