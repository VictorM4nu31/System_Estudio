<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Usuarios
    Route::prefix('users')->middleware('permission:users.view')->group(function () {
        Route::get('/', [UserController::class, 'index']);
        Route::middleware('permission:users.create')->group(function () {
            Route::get('/create', [UserController::class, 'create']);
            Route::post('/', [UserController::class, 'store']);
        });
        Route::middleware('permission:users.edit')->group(function () {
            Route::get('/{id}/edit', [UserController::class, 'edit']);
            Route::put('/{id}', [UserController::class, 'update']);
        });
        Route::delete('/{id}', [UserController::class, 'destroy'])->middleware('permission:users.delete');
        Route::post('/{id}/suspend', [UserController::class, 'suspend'])->middleware('permission:users.suspend');
    });

    // Roles y permisos
    Route::post('/roles/assign', [RoleController::class, 'assign'])->middleware('permission:roles.assign');
    Route::get('/roles/{id}/permissions', [RoleController::class, 'permissions'])->middleware('permission:permissions.view');

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

require __DIR__.'/auth.php';
