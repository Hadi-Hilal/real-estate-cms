<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Faq\app\Http\Controllers\FaqController;


Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    require __DIR__ . '/admin.php';

    Route::get('{country}/faqs', [FaqController::class, 'index'])->name('faqs');
});

