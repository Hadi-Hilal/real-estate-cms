<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Contact\app\Http\Controllers\ContactUsController;


Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    require __DIR__ . '/admin.php';

    Route::get('contact-us', [ContactUsController::class, 'index'])->name('contact-us');
    Route::post('contact-us', [ContactUsController::class, 'store'])->name('contact-us');
    Route::get('thanks', [ContactUsController::class, 'thanks'])->name('thanks');
});

