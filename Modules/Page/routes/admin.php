<?php
use Illuminate\Support\Facades\Route;
use Modules\Page\app\Http\Controllers\Admin\PageController;


Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin', 'verified' , 'can:Manage Pages'])->group(function () {

        Route::resource('pages', PageController::class)->except('destroy', 'show');
        Route::delete('pages/deleteMulti', [PageController::class, 'deleteMulti'])->name('pages.deleteMulti');

});
