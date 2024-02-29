<?php

use Illuminate\Support\Facades\Route;
use Modules\Contact\app\Http\Controllers\Admin\ContactController;


Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin', 'verified', 'can:Manage Contacts'])->group(function () {

    Route::resource('contacts', ContactController::class)->except('destroy', 'show');
    Route::delete('contacts/deleteMulti', [ContactController::class, 'deleteMulti'])->name('contacts.deleteMulti');

});
