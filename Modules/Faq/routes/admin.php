<?php

use Illuminate\Support\Facades\Route;
use Modules\Faq\app\Http\Controllers\Admin\FaqController;


Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin', 'verified', 'can:Manage Faqs'])->group(function () {

    Route::resource('faqs', FaqController::class)->except('destroy', 'show');
    Route::delete('faqs/deleteMulti', [FaqController::class, 'deleteMulti'])->name('faqs.deleteMulti');

});
