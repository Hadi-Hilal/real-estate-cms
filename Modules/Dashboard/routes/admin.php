<?php


use Illuminate\Support\Facades\Route;


Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin', 'verified'])->group(function () {
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');

});
