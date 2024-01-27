<?php

use Illuminate\Support\Facades\Route;
use Modules\Subscriber\app\Http\Controllers\Admin\SubscriberController;

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin', 'verified', 'can:Manage Subscribers'])->group(function () {
    Route::prefix('subscribers')->name('subscribers.')->group(function () {
        Route::get('/', [SubscriberController::class, 'index'])->name('index');
        Route::delete('/deleteMulti', [SubscriberController::class, 'deleteMulti'])->name('deleteMulti');
        Route::get('/export', [SubscriberController::class, 'export'])->name('export');
        Route::post('/import', [SubscriberController::class, 'import'])->name('import');
    });
});
