<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Currency\app\Models\Currency;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    require __DIR__ . '/admin.php';

    Route::get('setCurrency/{currency}', function (Currency $currency) {
        session()->put('currencyVal', $currency->exchange_rate);
        session()->put('currencyCode', $currency->code);
        return back();
    })->name('setCurrency');
});

