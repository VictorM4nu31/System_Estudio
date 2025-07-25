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
    Route::get('guilds', [TeacherGuildController::class, 'index'])->name('teacher.guilds.index');
    Route::get('guilds/create', [TeacherGuildController::class, 'create'])->name('teacher.guilds.create');
    Route::post('guilds', [TeacherGuildController::class, 'store'])->name('teacher.guilds.store');
    Route::get('guilds/{guild}', [TeacherGuildController::class, 'show'])->name('teacher.guilds.show');
    Route::get('guilds/{guild}/edit', [TeacherGuildController::class, 'edit'])->name('teacher.guilds.edit');
    Route::put('guilds/{guild}', [TeacherGuildController::class, 'update'])->name('teacher.guilds.update');
    Route::delete('guilds/{guild}', [TeacherGuildController::class, 'destroy'])->name('teacher.guilds.destroy');

    // Misiones
    Route::get('missions', [MissionController::class, 'index'])->name('teacher.missions.index');
    Route::get('missions/create', [MissionController::class, 'create'])->name('teacher.missions.create');
    Route::post('missions', [MissionController::class, 'store'])->name('teacher.missions.store');
    Route::get('missions/{mission}', [MissionController::class, 'show'])->name('teacher.missions.show');
    Route::get('missions/{mission}/edit', [MissionController::class, 'edit'])->name('teacher.missions.edit');
    Route::put('missions/{mission}', [MissionController::class, 'update'])->name('teacher.missions.update');
    Route::delete('missions/{mission}', [MissionController::class, 'destroy'])->name('teacher.missions.destroy');

    // Tareas
    Route::get('tasks', [TaskController::class, 'index'])->name('teacher.tasks.index');
    Route::get('tasks/create', [TaskController::class, 'create'])->name('teacher.tasks.create');
    Route::post('tasks', [TaskController::class, 'store'])->name('teacher.tasks.store');
    Route::get('tasks/{task}', [TaskController::class, 'show'])->name('teacher.tasks.show');
    Route::get('tasks/{task}/edit', [TaskController::class, 'edit'])->name('teacher.tasks.edit');
    Route::put('tasks/{task}', [TaskController::class, 'update'])->name('teacher.tasks.update');
    Route::delete('tasks/{task}', [TaskController::class, 'destroy'])->name('teacher.tasks.destroy');

    // Tiendas
    Route::get('shops', [ShopController::class, 'index'])->name('teacher.shops.index');
    Route::get('shops/create', [ShopController::class, 'create'])->name('teacher.shops.create');
    Route::post('shops', [ShopController::class, 'store'])->name('teacher.shops.store');
    Route::get('shops/{shop}', [ShopController::class, 'show'])->name('teacher.shops.show');
    Route::get('shops/{shop}/edit', [ShopController::class, 'edit'])->name('teacher.shops.edit');
    Route::put('shops/{shop}', [ShopController::class, 'update'])->name('teacher.shops.update');
    Route::delete('shops/{shop}', [ShopController::class, 'destroy'])->name('teacher.shops.destroy');

    // Recompensas
    Route::get('rewards', [RewardController::class, 'index'])->name('teacher.rewards.index');
    Route::get('rewards/create', [RewardController::class, 'create'])->name('teacher.rewards.create');
    Route::post('rewards', [RewardController::class, 'store'])->name('teacher.rewards.store');
    Route::get('rewards/{reward}', [RewardController::class, 'show'])->name('teacher.rewards.show');
    Route::get('rewards/{reward}/edit', [RewardController::class, 'edit'])->name('teacher.rewards.edit');
    Route::put('rewards/{reward}', [RewardController::class, 'update'])->name('teacher.rewards.update');
    Route::delete('rewards/{reward}', [RewardController::class, 'destroy'])->name('teacher.rewards.destroy');

    // Anuncios
    Route::get('announcements', [AnnouncementController::class, 'index'])->name('teacher.announcements.index');
    Route::get('announcements/create', [AnnouncementController::class, 'create'])->name('teacher.announcements.create');
    Route::post('announcements', [AnnouncementController::class, 'store'])->name('teacher.announcements.store');
    Route::get('announcements/{announcement}', [AnnouncementController::class, 'show'])->name('teacher.announcements.show');
    Route::get('announcements/{announcement}/edit', [AnnouncementController::class, 'edit'])->name('teacher.announcements.edit');
    Route::put('announcements/{announcement}', [AnnouncementController::class, 'update'])->name('teacher.announcements.update');
    Route::delete('announcements/{announcement}', [AnnouncementController::class, 'destroy'])->name('teacher.announcements.destroy');

    // Mensajes
    Route::get('messages', [MessageController::class, 'index'])->name('teacher.messages.index');
    Route::get('messages/create', [MessageController::class, 'create'])->name('teacher.messages.create');
    Route::post('messages', [MessageController::class, 'store'])->name('teacher.messages.store');
    Route::get('messages/{message}', [MessageController::class, 'show'])->name('teacher.messages.show');
    Route::get('messages/{message}/edit', [MessageController::class, 'edit'])->name('teacher.messages.edit');
    Route::put('messages/{message}', [MessageController::class, 'update'])->name('teacher.messages.update');
    Route::delete('messages/{message}', [MessageController::class, 'destroy'])->name('teacher.messages.destroy');

    // Eventos de gremio
    Route::get('events', [TeacherEventController::class, 'index'])->name('teacher.events.index');
    Route::get('events/create', [TeacherEventController::class, 'create'])->name('teacher.events.create');
    Route::post('events', [TeacherEventController::class, 'store'])->name('teacher.events.store');
    Route::get('events/{event}', [TeacherEventController::class, 'show'])->name('teacher.events.show');
    Route::get('events/{event}/edit', [TeacherEventController::class, 'edit'])->name('teacher.events.edit');
    Route::put('events/{event}', [TeacherEventController::class, 'update'])->name('teacher.events.update');
    Route::delete('events/{event}', [TeacherEventController::class, 'destroy'])->name('teacher.events.destroy');

    // Equipos
    Route::get('teams', [TeamController::class, 'index'])->name('teacher.teams.index');
    Route::get('teams/create', [TeamController::class, 'create'])->name('teacher.teams.create');
    Route::post('teams', [TeamController::class, 'store'])->name('teacher.teams.store');
    Route::get('teams/{team}', [TeamController::class, 'show'])->name('teacher.teams.show');
    Route::get('teams/{team}/edit', [TeamController::class, 'edit'])->name('teacher.teams.edit');
    Route::put('teams/{team}', [TeamController::class, 'update'])->name('teacher.teams.update');
    Route::delete('teams/{team}', [TeamController::class, 'destroy'])->name('teacher.teams.destroy');
});
