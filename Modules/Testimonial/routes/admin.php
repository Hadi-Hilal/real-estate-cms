<?php


use Illuminate\Support\Facades\Route;
use Modules\Testimonial\app\Http\Controllers\Admin\TestimonialController;

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin', 'verified', 'can:Manage Testimonials'])->group(function () {
    Route::resource('testimonials', TestimonialController::class)->except('destroy', 'show');
    Route::delete('testimonials/deleteMulti', [TestimonialController::class, 'deleteMulti'])->name('testimonials.deleteMulti');
});
