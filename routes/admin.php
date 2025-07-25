<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ModerationController;
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
    });

    // Roles y permisos
    Route::post('/roles/assign', [RoleController::class, 'assign'])->middleware('permission:roles.assign');
    Route::get('/roles/{id}/permissions', [RoleController::class, 'permissions'])->middleware('permission:permissions.view')->name('admin.roles.permissions');

    // Configuración
    Route::get('/settings', [SettingsController::class, 'manage'])->middleware('permission:settings.manage');
    Route::get('/settings/advanced', [SettingsController::class, 'advanced'])->middleware('permission:admin.system.configure');

    // Eventos
    Route::prefix('events')->group(function () {
        Route::get('/', [EventController::class, 'manage'])->middleware('permission:admin.events.manage');
        Route::post('/', [EventController::class, 'create'])->middleware('permission:admin.events.create');
        Route::put('/{id}', [EventController::class, 'update'])->middleware('permission:admin.events.manage');
        Route::delete('/{id}', [EventController::class, 'destroy'])->middleware('permission:admin.events.manage');
    });

    // Insignias globales
    Route::prefix('badges')->middleware('permission:admin.badges.global.create')->group(function () {
        Route::get('/', [BadgeController::class, 'index']);
        Route::post('/', [BadgeController::class, 'create']);
        Route::put('/{id}', [BadgeController::class, 'update']);
        Route::delete('/{id}', [BadgeController::class, 'destroy']);
    });

    // Gremios
    Route::prefix('guilds')->middleware('permission:guild.codes.view')->group(function () {
        Route::get('/', [GuildController::class, 'index']);
        Route::post('/', [GuildController::class, 'create']);
        Route::put('/{id}', [GuildController::class, 'update']);
        Route::delete('/{id}', [GuildController::class, 'destroy']);
        Route::get('/codes', [GuildController::class, 'codes']);
    });

    // Reportes y logs
    Route::get('/reports', [ReportController::class, 'all'])->middleware('permission:admin.reports.view_all');
    Route::get('/analytics', [ReportController::class, 'analytics'])->middleware('permission:admin.analytics.view');
    Route::get('/logs', [ReportController::class, 'logs'])->middleware('permission:logs.view');

    // Moderación
    Route::get('/moderation', [ModerationController::class, 'manage'])->middleware('permission:admin.moderation.manage');
});
