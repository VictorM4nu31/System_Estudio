<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\MissionController as StudentMissionController;
use App\Http\Controllers\Student\TaskController as StudentTaskController;
use App\Http\Controllers\Student\RewardController as StudentRewardController;
use App\Http\Controllers\Student\BadgeController as StudentBadgeController;
use App\Http\Controllers\Student\GuildController as StudentGuildController;
use App\Http\Controllers\Student\InventoryController as StudentInventoryController;
use App\Http\Controllers\Student\ActivityController as StudentActivityController;
use App\Http\Controllers\Student\NotificationController as StudentNotificationController;
use App\Http\Controllers\Student\AcademicDataController as StudentAcademicDataController;

Route::middleware(['auth', 'role:student'])->prefix('student')->group(function () {
    // Gremios
    Route::get('guilds', [StudentGuildController::class, 'index'])->name('student.guilds.index');
    Route::get('guilds/create', [StudentGuildController::class, 'create'])->name('student.guilds.create');
    Route::post('guilds', [StudentGuildController::class, 'store'])->name('student.guilds.store');
    Route::get('guilds/{guild}', [StudentGuildController::class, 'show'])->name('student.guilds.show');
    Route::get('guilds/{guild}/edit', [StudentGuildController::class, 'edit'])->name('student.guilds.edit');
    Route::put('guilds/{guild}', [StudentGuildController::class, 'update'])->name('student.guilds.update');
    Route::delete('guilds/{guild}', [StudentGuildController::class, 'destroy'])->name('student.guilds.destroy');

    // Misiones
    Route::get('missions', [StudentMissionController::class, 'index'])->name('student.missions.index');
    Route::get('missions/create', [StudentMissionController::class, 'create'])->name('student.missions.create');
    Route::post('missions', [StudentMissionController::class, 'store'])->name('student.missions.store');
    Route::get('missions/{mission}', [StudentMissionController::class, 'show'])->name('student.missions.show');
    Route::get('missions/{mission}/edit', [StudentMissionController::class, 'edit'])->name('student.missions.edit');
    Route::put('missions/{mission}', [StudentMissionController::class, 'update'])->name('student.missions.update');
    Route::delete('missions/{mission}', [StudentMissionController::class, 'destroy'])->name('student.missions.destroy');

    // Tareas
    Route::get('tasks', [StudentTaskController::class, 'index'])->name('student.tasks.index');
    Route::get('tasks/create', [StudentTaskController::class, 'create'])->name('student.tasks.create');
    Route::post('tasks', [StudentTaskController::class, 'store'])->name('student.tasks.store');
    Route::get('tasks/{task}', [StudentTaskController::class, 'show'])->name('student.tasks.show');
    Route::get('tasks/{task}/edit', [StudentTaskController::class, 'edit'])->name('student.tasks.edit');
    Route::put('tasks/{task}', [StudentTaskController::class, 'update'])->name('student.tasks.update');
    Route::delete('tasks/{task}', [StudentTaskController::class, 'destroy'])->name('student.tasks.destroy');

    // Recompensas
    Route::get('rewards', [StudentRewardController::class, 'index'])->name('student.rewards.index');
    Route::get('rewards/create', [StudentRewardController::class, 'create'])->name('student.rewards.create');
    Route::post('rewards', [StudentRewardController::class, 'store'])->name('student.rewards.store');
    Route::get('rewards/{reward}', [StudentRewardController::class, 'show'])->name('student.rewards.show');
    Route::get('rewards/{reward}/edit', [StudentRewardController::class, 'edit'])->name('student.rewards.edit');
    Route::put('rewards/{reward}', [StudentRewardController::class, 'update'])->name('student.rewards.update');
    Route::delete('rewards/{reward}', [StudentRewardController::class, 'destroy'])->name('student.rewards.destroy');

    // Inventario
    Route::get('inventory', [StudentInventoryController::class, 'index'])->name('student.inventory.index');
    Route::get('inventory/create', [StudentInventoryController::class, 'create'])->name('student.inventory.create');
    Route::post('inventory', [StudentInventoryController::class, 'store'])->name('student.inventory.store');
    Route::get('inventory/{inventory}', [StudentInventoryController::class, 'show'])->name('student.inventory.show');
    Route::get('inventory/{inventory}/edit', [StudentInventoryController::class, 'edit'])->name('student.inventory.edit');
    Route::put('inventory/{inventory}', [StudentInventoryController::class, 'update'])->name('student.inventory.update');
    Route::delete('inventory/{inventory}', [StudentInventoryController::class, 'destroy'])->name('student.inventory.destroy');

    // Insignias
    Route::get('badges', [StudentBadgeController::class, 'index'])->name('student.badges.index');
    Route::get('badges/create', [StudentBadgeController::class, 'create'])->name('student.badges.create');
    Route::post('badges', [StudentBadgeController::class, 'store'])->name('student.badges.store');
    Route::get('badges/{badge}', [StudentBadgeController::class, 'show'])->name('student.badges.show');
    Route::get('badges/{badge}/edit', [StudentBadgeController::class, 'edit'])->name('student.badges.edit');
    Route::put('badges/{badge}', [StudentBadgeController::class, 'update'])->name('student.badges.update');
    Route::delete('badges/{badge}', [StudentBadgeController::class, 'destroy'])->name('student.badges.destroy');

    // Datos académicos
    Route::get('academic-data', [StudentAcademicDataController::class, 'index'])->name('student.academic-data.index');
    Route::get('academic-data/create', [StudentAcademicDataController::class, 'create'])->name('student.academic-data.create');
    Route::post('academic-data', [StudentAcademicDataController::class, 'store'])->name('student.academic-data.store');
    Route::get('academic-data/{academic_data}', [StudentAcademicDataController::class, 'show'])->name('student.academic-data.show');
    Route::get('academic-data/{academic_data}/edit', [StudentAcademicDataController::class, 'edit'])->name('student.academic-data.edit');
    Route::put('academic-data/{academic_data}', [StudentAcademicDataController::class, 'update'])->name('student.academic-data.update');
    Route::delete('academic-data/{academic_data}', [StudentAcademicDataController::class, 'destroy'])->name('student.academic-data.destroy');

    // Notificaciones
    Route::get('notifications', [StudentNotificationController::class, 'index'])->name('student.notifications.index');
    Route::get('notifications/create', [StudentNotificationController::class, 'create'])->name('student.notifications.create');
    Route::post('notifications', [StudentNotificationController::class, 'store'])->name('student.notifications.store');
    Route::get('notifications/{notification}', [StudentNotificationController::class, 'show'])->name('student.notifications.show');
    Route::get('notifications/{notification}/edit', [StudentNotificationController::class, 'edit'])->name('student.notifications.edit');
    Route::put('notifications/{notification}', [StudentNotificationController::class, 'update'])->name('student.notifications.update');
    Route::delete('notifications/{notification}', [StudentNotificationController::class, 'destroy'])->name('student.notifications.destroy');

    // Actividades
    Route::get('activities', [StudentActivityController::class, 'index'])->name('student.activities.index');
    Route::get('activities/create', [StudentActivityController::class, 'create'])->name('student.activities.create');
    Route::post('activities', [StudentActivityController::class, 'store'])->name('student.activities.store');
    Route::get('activities/{activity}', [StudentActivityController::class, 'show'])->name('student.activities.show');
    Route::get('activities/{activity}/edit', [StudentActivityController::class, 'edit'])->name('student.activities.edit');
    Route::put('activities/{activity}', [StudentActivityController::class, 'update'])->name('student.activities.update');
    Route::delete('activities/{activity}', [StudentActivityController::class, 'destroy'])->name('student.activities.destroy');
});
