<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\BadgeController;
use App\Http\Controllers\Admin\GuildController;

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Usuarios
    Route::prefix('users')->middleware('permission:users.view')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.users.index');
        Route::middleware('permission:users.create')->group(function () {
            Route::get('/create', [UserController::class, 'create'])->name('admin.users.create');
            Route::post('/', [UserController::class, 'store'])->name('admin.users.store');
        });
        Route::middleware('permission:users.edit')->group(function () {
            Route::get('/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
            Route::put('/{id}', [UserController::class, 'update'])->name('admin.users.update');
        });
        Route::delete('/{id}', [UserController::class, 'destroy'])->middleware('permission:users.delete')->name('admin.users.destroy');
        Route::post('/{id}/suspend', [UserController::class, 'suspend'])->middleware('permission:users.suspend')->name('admin.users.suspend');
        Route::get('/{id}', [UserController::class, 'show'])->name('admin.users.show');
    });

    // Roles y permisos
    Route::get('/roles', [RoleController::class, 'index'])->middleware('permission:roles.view')->name('admin.roles.index');
    Route::post('/roles/assign', [RoleController::class, 'assign'])->middleware('permission:roles.assign');
    Route::get('/roles/{id}/permissions', [RoleController::class, 'permissions'])->middleware('permission:permissions.view')->name('admin.roles.permissions');

    // Configuración
    Route::get('/settings', [SettingsController::class, 'manage'])->middleware('permission:settings.manage')->name('admin.settings');
    Route::get('/settings/advanced', [SettingsController::class, 'advanced'])->middleware('permission:admin.system.configure')->name('admin.settings.advanced');

    // Reportes y logs
    Route::get('/reports', [ReportController::class, 'all'])->middleware('permission:admin.reports.view_all');
    Route::get('/analytics', [ReportController::class, 'analytics'])->middleware('permission:admin.analytics.view');
    Route::get('/logs', [ReportController::class, 'logs'])->middleware('permission:logs.view');
});
