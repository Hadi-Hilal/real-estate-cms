<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Blog\app\Http\Controllers\ArticleController;

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    require __DIR__ . '/admin.php';

    Route::get('{country}/articles', [ArticleController::class, 'index'])->name('articles');
    Route::get('articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');
});

