<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher\GuildController as TeacherGuildController;
use App\Http\Controllers\Teacher\MissionController;
use App\Http\Controllers\Teacher\TaskController;
use App\Http\Controllers\Teacher\ShopController;
use App\Http\Controllers\Teacher\RewardController;
use App\Http\Controllers\Teacher\AnnouncementController;
use App\Http\Controllers\Teacher\MessageController;
use App\Http\Controllers\Teacher\EventController as TeacherEventController;
use App\Http\Controllers\Teacher\TeamController;

Route::middleware(['auth', 'role:teacher'])->prefix('teacher')->group(function () {
    // Gremios
    Route::get('guilds', [TeacherGuildController::class, 'index']);
    Route::get('guilds/create', [TeacherGuildController::class, 'create']);
    Route::post('guilds', [TeacherGuildController::class, 'store']);
    Route::get('guilds/{guild}', [TeacherGuildController::class, 'show']);
    Route::get('guilds/{guild}/edit', [TeacherGuildController::class, 'edit']);
    Route::put('guilds/{guild}', [TeacherGuildController::class, 'update']);
    Route::delete('guilds/{guild}', [TeacherGuildController::class, 'destroy']);

    // Misiones
    Route::get('missions', [MissionController::class, 'index']);
    Route::get('missions/create', [MissionController::class, 'create']);
    Route::post('missions', [MissionController::class, 'store']);
    Route::get('missions/{mission}', [MissionController::class, 'show']);
    Route::get('missions/{mission}/edit', [MissionController::class, 'edit']);
    Route::put('missions/{mission}', [MissionController::class, 'update']);
    Route::delete('missions/{mission}', [MissionController::class, 'destroy']);

    // Tareas
    Route::get('tasks', [TaskController::class, 'index']);
    Route::get('tasks/create', [TaskController::class, 'create']);
    Route::post('tasks', [TaskController::class, 'store']);
    Route::get('tasks/{task}', [TaskController::class, 'show']);
    Route::get('tasks/{task}/edit', [TaskController::class, 'edit']);
    Route::put('tasks/{task}', [TaskController::class, 'update']);
    Route::delete('tasks/{task}', [TaskController::class, 'destroy']);

    // Tiendas
    Route::get('shops', [ShopController::class, 'index']);
    Route::get('shops/create', [ShopController::class, 'create']);
    Route::post('shops', [ShopController::class, 'store']);
    Route::get('shops/{shop}', [ShopController::class, 'show']);
    Route::get('shops/{shop}/edit', [ShopController::class, 'edit']);
    Route::put('shops/{shop}', [ShopController::class, 'update']);
    Route::delete('shops/{shop}', [ShopController::class, 'destroy']);

    // Recompensas
    Route::get('rewards', [RewardController::class, 'index']);
    Route::get('rewards/create', [RewardController::class, 'create']);
    Route::post('rewards', [RewardController::class, 'store']);
    Route::get('rewards/{reward}', [RewardController::class, 'show']);
    Route::get('rewards/{reward}/edit', [RewardController::class, 'edit']);
    Route::put('rewards/{reward}', [RewardController::class, 'update']);
    Route::delete('rewards/{reward}', [RewardController::class, 'destroy']);

    // Anuncios
    Route::get('announcements', [AnnouncementController::class, 'index']);
    Route::get('announcements/create', [AnnouncementController::class, 'create']);
    Route::post('announcements', [AnnouncementController::class, 'store']);
    Route::get('announcements/{announcement}', [AnnouncementController::class, 'show']);
    Route::get('announcements/{announcement}/edit', [AnnouncementController::class, 'edit']);
    Route::put('announcements/{announcement}', [AnnouncementController::class, 'update']);
    Route::delete('announcements/{announcement}', [AnnouncementController::class, 'destroy']);

    // Mensajes
    Route::get('messages', [MessageController::class, 'index']);
    Route::get('messages/create', [MessageController::class, 'create']);
    Route::post('messages', [MessageController::class, 'store']);
    Route::get('messages/{message}', [MessageController::class, 'show']);
    Route::get('messages/{message}/edit', [MessageController::class, 'edit']);
    Route::put('messages/{message}', [MessageController::class, 'update']);
    Route::delete('messages/{message}', [MessageController::class, 'destroy']);

    // Eventos de gremio
    Route::get('events', [TeacherEventController::class, 'index']);
    Route::get('events/create', [TeacherEventController::class, 'create']);
    Route::post('events', [TeacherEventController::class, 'store']);
    Route::get('events/{event}', [TeacherEventController::class, 'show']);
    Route::get('events/{event}/edit', [TeacherEventController::class, 'edit']);
    Route::put('events/{event}', [TeacherEventController::class, 'update']);
    Route::delete('events/{event}', [TeacherEventController::class, 'destroy']);

    // Equipos
    Route::get('teams', [TeamController::class, 'index']);
    Route::get('teams/create', [TeamController::class, 'create']);
    Route::post('teams', [TeamController::class, 'store']);
    Route::get('teams/{team}', [TeamController::class, 'show']);
    Route::get('teams/{team}/edit', [TeamController::class, 'edit']);
    Route::put('teams/{team}', [TeamController::class, 'update']);
    Route::delete('teams/{team}', [TeamController::class, 'destroy']);
});
