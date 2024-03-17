<?php

use Illuminate\Support\Facades\Route;
use Modules\Contact\app\Http\Controllers\Admin\ContactController;


Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin', 'verified', 'can:Manage Contacts'])->group(function () {

    Route::get('contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('contacts/export', [ContactController::class, 'export'])->name('contacts.export');
    Route::delete('contacts/deleteMulti', [ContactController::class, 'deleteMulti'])->name('contacts.deleteMulti');

});
