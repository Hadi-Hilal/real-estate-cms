<?php

use Illuminate\Support\Facades\Route;
use Modules\FileManger\app\Http\Controllers\Admin\FileMangerController;


Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin', 'verified', 'can:Manage FileManger'])->group(function () {

    Route::resource('file-manger', FileMangerController::class)->only('index');

});
