<?php

use Illuminate\Support\Facades\Route;
use Modules\Role\app\Http\Controllers\Admin\RoleController;

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin', 'verified', 'can:Manage Roles'])->group(function () {

    Route::prefix('roles')->name('roles.')->group(function () {
        Route::post('assign_users', [RoleController::class, 'assignUsersToRole'])->name('assign_users');
        Route::post('remove_user_from_role', [RoleController::class, 'removeUserFromRole'])->name('remove_user_from_role');
        Route::post('remove_users_from_role', [RoleController::class, 'removeUsersFromRole'])->name('remove_users_from_role');
        Route::get('delete_role/{id}', [RoleController::class, 'delete_role'])->name('delete_role');
    });
    Route::resource('roles', RoleController::class);
});
