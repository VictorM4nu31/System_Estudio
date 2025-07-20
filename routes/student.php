<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\MissionController as StudentMissionController;
use App\Http\Controllers\Student\TaskController as StudentTaskController;
use App\Http\Controllers\Student\RewardController as StudentRewardController;
use App\Http\Controllers\Student\BadgeController as StudentBadgeController;
use App\Http\Controllers\Student\ProfileController as StudentProfileController;
use App\Http\Controllers\Student\GuildController as StudentGuildController;
use App\Http\Controllers\Student\InventoryController as StudentInventoryController;
use App\Http\Controllers\Student\ActivityController as StudentActivityController;
use App\Http\Controllers\Student\NotificationController as StudentNotificationController;
use App\Http\Controllers\Student\AcademicDataController as StudentAcademicDataController;

Route::middleware(['auth', 'role:student'])->prefix('student')->group(function () {
    // Misiones
    Route::get('missions', [StudentMissionController::class, 'index']);
    Route::get('missions/create', [StudentMissionController::class, 'create']);
    Route::post('missions', [StudentMissionController::class, 'store']);
    Route::get('missions/{mission}', [StudentMissionController::class, 'show']);
    Route::get('missions/{mission}/edit', [StudentMissionController::class, 'edit']);
    Route::put('missions/{mission}', [StudentMissionController::class, 'update']);
    Route::delete('missions/{mission}', [StudentMissionController::class, 'destroy']);

    // Tareas
    Route::get('tasks', [StudentTaskController::class, 'index']);
    Route::get('tasks/create', [StudentTaskController::class, 'create']);
    Route::post('tasks', [StudentTaskController::class, 'store']);
    Route::get('tasks/{task}', [StudentTaskController::class, 'show']);
    Route::get('tasks/{task}/edit', [StudentTaskController::class, 'edit']);
    Route::put('tasks/{task}', [StudentTaskController::class, 'update']);
    Route::delete('tasks/{task}', [StudentTaskController::class, 'destroy']);

    // Recompensas
    Route::get('rewards', [StudentRewardController::class, 'index']);
    Route::get('rewards/create', [StudentRewardController::class, 'create']);
    Route::post('rewards', [StudentRewardController::class, 'store']);
    Route::get('rewards/{reward}', [StudentRewardController::class, 'show']);
    Route::get('rewards/{reward}/edit', [StudentRewardController::class, 'edit']);
    Route::put('rewards/{reward}', [StudentRewardController::class, 'update']);
    Route::delete('rewards/{reward}', [StudentRewardController::class, 'destroy']);

    // Insignias
    Route::get('badges', [StudentBadgeController::class, 'index']);
    Route::get('badges/create', [StudentBadgeController::class, 'create']);
    Route::post('badges', [StudentBadgeController::class, 'store']);
    Route::get('badges/{badge}', [StudentBadgeController::class, 'show']);
    Route::get('badges/{badge}/edit', [StudentBadgeController::class, 'edit']);
    Route::put('badges/{badge}', [StudentBadgeController::class, 'update']);
    Route::delete('badges/{badge}', [StudentBadgeController::class, 'destroy']);

    // Perfil
    Route::get('profiles', [StudentProfileController::class, 'index']);
    Route::get('profiles/create', [StudentProfileController::class, 'create']);
    Route::post('profiles', [StudentProfileController::class, 'store']);
    Route::get('profiles/{profile}', [StudentProfileController::class, 'show']);
    Route::get('profiles/{profile}/edit', [StudentProfileController::class, 'edit']);
    Route::put('profiles/{profile}', [StudentProfileController::class, 'update']);
    Route::delete('profiles/{profile}', [StudentProfileController::class, 'destroy']);

    // Gremios
    Route::get('guilds', [StudentGuildController::class, 'index']);
    Route::get('guilds/create', [StudentGuildController::class, 'create']);
    Route::post('guilds', [StudentGuildController::class, 'store']);
    Route::get('guilds/{guild}', [StudentGuildController::class, 'show']);
    Route::get('guilds/{guild}/edit', [StudentGuildController::class, 'edit']);
    Route::put('guilds/{guild}', [StudentGuildController::class, 'update']);
    Route::delete('guilds/{guild}', [StudentGuildController::class, 'destroy']);

    // Inventario
    Route::get('inventories', [StudentInventoryController::class, 'index']);
    Route::get('inventories/create', [StudentInventoryController::class, 'create']);
    Route::post('inventories', [StudentInventoryController::class, 'store']);
    Route::get('inventories/{inventory}', [StudentInventoryController::class, 'show']);
    Route::get('inventories/{inventory}/edit', [StudentInventoryController::class, 'edit']);
    Route::put('inventories/{inventory}', [StudentInventoryController::class, 'update']);
    Route::delete('inventories/{inventory}', [StudentInventoryController::class, 'destroy']);

    // Actividades
    Route::get('activities', [StudentActivityController::class, 'index']);
    Route::get('activities/create', [StudentActivityController::class, 'create']);
    Route::post('activities', [StudentActivityController::class, 'store']);
    Route::get('activities/{activity}', [StudentActivityController::class, 'show']);
    Route::get('activities/{activity}/edit', [StudentActivityController::class, 'edit']);
    Route::put('activities/{activity}', [StudentActivityController::class, 'update']);
    Route::delete('activities/{activity}', [StudentActivityController::class, 'destroy']);

    // Notificaciones
    Route::get('notifications', [StudentNotificationController::class, 'index']);
    Route::get('notifications/create', [StudentNotificationController::class, 'create']);
    Route::post('notifications', [StudentNotificationController::class, 'store']);
    Route::get('notifications/{notification}', [StudentNotificationController::class, 'show']);
    Route::get('notifications/{notification}/edit', [StudentNotificationController::class, 'edit']);
    Route::put('notifications/{notification}', [StudentNotificationController::class, 'update']);
    Route::delete('notifications/{notification}', [StudentNotificationController::class, 'destroy']);

    // Datos académicos
    Route::get('academic-data', [StudentAcademicDataController::class, 'index']);
    Route::get('academic-data/create', [StudentAcademicDataController::class, 'create']);
    Route::post('academic-data', [StudentAcademicDataController::class, 'store']);
    Route::get('academic-data/{academic_data}', [StudentAcademicDataController::class, 'show']);
    Route::get('academic-data/{academic_data}/edit', [StudentAcademicDataController::class, 'edit']);
    Route::put('academic-data/{academic_data}', [StudentAcademicDataController::class, 'update']);
    Route::delete('academic-data/{academic_data}', [StudentAcademicDataController::class, 'destroy']);
});
