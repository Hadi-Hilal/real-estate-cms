<?php

use Illuminate\Support\Facades\Route;
use Modules\Currency\app\Http\Controllers\Admin\CurrencyController;


Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin', 'verified', 'can:Manage Currencies'])->group(function () {

    Route::resource('currencies', CurrencyController::class)->except('destroy', 'show');
    Route::delete('currencies/deleteMulti', [CurrencyController::class, 'deleteMulti'])->name('currencies.deleteMulti');

});
