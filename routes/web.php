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
use App\Http\Controllers\Teacher\GuildController as TeacherGuildController;
use App\Http\Controllers\Teacher\MissionController;
use App\Http\Controllers\Teacher\TaskController;
use App\Http\Controllers\Teacher\ShopController;
use App\Http\Controllers\Teacher\RewardController;
use App\Http\Controllers\Teacher\AnnouncementController;
use App\Http\Controllers\Teacher\MessageController;
use App\Http\Controllers\Teacher\EventController as TeacherEventController;
use App\Http\Controllers\Teacher\TeamController;
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
use App\Http\Controllers\Tutor\InvitationController as TutorInvitationController;
use App\Http\Controllers\Tutor\ScoreController as TutorScoreController;
use App\Http\Controllers\Tutor\MissionController as TutorMissionController;
use App\Http\Controllers\Tutor\NotificationController as TutorNotificationController;
use App\Http\Controllers\Tutor\AchievementController as TutorAchievementController;
use App\Http\Controllers\Tutor\AttendanceController as TutorAttendanceController;
use App\Http\Controllers\Tutor\ReportController as TutorReportController;
use App\Http\Controllers\Tutor\ProfileController as TutorProfileController;
use App\Http\Controllers\Tutor\StatisticController as TutorStatisticController;
use App\Http\Controllers\Tutor\GuildController as TutorGuildController;
use App\Http\Controllers\Tutor\GradeController as TutorGradeController;
use App\Http\Controllers\Tutor\AcademicDataController as TutorAcademicDataController;
use App\Http\Controllers\Tutor\StudentController as TutorStudentController;
use App\Http\Controllers\Tutor\ContactController as TutorContactController;

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

Route::middleware(['auth', 'role:tutor'])->prefix('tutor')->group(function () {
    // Invitaciones
    Route::get('invitations', [TutorInvitationController::class, 'index']);
    Route::get('invitations/create', [TutorInvitationController::class, 'create']);
    Route::post('invitations', [TutorInvitationController::class, 'store']);
    Route::get('invitations/{invitation}', [TutorInvitationController::class, 'show']);
    Route::get('invitations/{invitation}/edit', [TutorInvitationController::class, 'edit']);
    Route::put('invitations/{invitation}', [TutorInvitationController::class, 'update']);
    Route::delete('invitations/{invitation}', [TutorInvitationController::class, 'destroy']);

    // Calificaciones
    Route::get('scores', [TutorScoreController::class, 'index']);
    Route::get('scores/create', [TutorScoreController::class, 'create']);
    Route::post('scores', [TutorScoreController::class, 'store']);
    Route::get('scores/{score}', [TutorScoreController::class, 'show']);
    Route::get('scores/{score}/edit', [TutorScoreController::class, 'edit']);
    Route::put('scores/{score}', [TutorScoreController::class, 'update']);
    Route::delete('scores/{score}', [TutorScoreController::class, 'destroy']);

    // Misiones
    Route::get('missions', [TutorMissionController::class, 'index']);
    Route::get('missions/create', [TutorMissionController::class, 'create']);
    Route::post('missions', [TutorMissionController::class, 'store']);
    Route::get('missions/{mission}', [TutorMissionController::class, 'show']);
    Route::get('missions/{mission}/edit', [TutorMissionController::class, 'edit']);
    Route::put('missions/{mission}', [TutorMissionController::class, 'update']);
    Route::delete('missions/{mission}', [TutorMissionController::class, 'destroy']);

    // Notificaciones
    Route::get('notifications', [TutorNotificationController::class, 'index']);
    Route::get('notifications/create', [TutorNotificationController::class, 'create']);
    Route::post('notifications', [TutorNotificationController::class, 'store']);
    Route::get('notifications/{notification}', [TutorNotificationController::class, 'show']);
    Route::get('notifications/{notification}/edit', [TutorNotificationController::class, 'edit']);
    Route::put('notifications/{notification}', [TutorNotificationController::class, 'update']);
    Route::delete('notifications/{notification}', [TutorNotificationController::class, 'destroy']);

    // Logros
    Route::get('achievements', [TutorAchievementController::class, 'index']);
    Route::get('achievements/create', [TutorAchievementController::class, 'create']);
    Route::post('achievements', [TutorAchievementController::class, 'store']);
    Route::get('achievements/{achievement}', [TutorAchievementController::class, 'show']);
    Route::get('achievements/{achievement}/edit', [TutorAchievementController::class, 'edit']);
    Route::put('achievements/{achievement}', [TutorAchievementController::class, 'update']);
    Route::delete('achievements/{achievement}', [TutorAchievementController::class, 'destroy']);

    // Asistencias
    Route::get('attendances', [TutorAttendanceController::class, 'index']);
    Route::get('attendances/create', [TutorAttendanceController::class, 'create']);
    Route::post('attendances', [TutorAttendanceController::class, 'store']);
    Route::get('attendances/{attendance}', [TutorAttendanceController::class, 'show']);
    Route::get('attendances/{attendance}/edit', [TutorAttendanceController::class, 'edit']);
    Route::put('attendances/{attendance}', [TutorAttendanceController::class, 'update']);
    Route::delete('attendances/{attendance}', [TutorAttendanceController::class, 'destroy']);

    // Reportes
    Route::get('reports', [TutorReportController::class, 'index']);
    Route::get('reports/create', [TutorReportController::class, 'create']);
    Route::post('reports', [TutorReportController::class, 'store']);
    Route::get('reports/{report}', [TutorReportController::class, 'show']);
    Route::get('reports/{report}/edit', [TutorReportController::class, 'edit']);
    Route::put('reports/{report}', [TutorReportController::class, 'update']);
    Route::delete('reports/{report}', [TutorReportController::class, 'destroy']);

    // Perfil
    Route::get('profiles', [TutorProfileController::class, 'index']);
    Route::get('profiles/create', [TutorProfileController::class, 'create']);
    Route::post('profiles', [TutorProfileController::class, 'store']);
    Route::get('profiles/{profile}', [TutorProfileController::class, 'show']);
    Route::get('profiles/{profile}/edit', [TutorProfileController::class, 'edit']);
    Route::put('profiles/{profile}', [TutorProfileController::class, 'update']);
    Route::delete('profiles/{profile}', [TutorProfileController::class, 'destroy']);

    // Estadísticas
    Route::get('statistics', [TutorStatisticController::class, 'index']);
    Route::get('statistics/create', [TutorStatisticController::class, 'create']);
    Route::post('statistics', [TutorStatisticController::class, 'store']);
    Route::get('statistics/{statistic}', [TutorStatisticController::class, 'show']);
    Route::get('statistics/{statistic}/edit', [TutorStatisticController::class, 'edit']);
    Route::put('statistics/{statistic}', [TutorStatisticController::class, 'update']);
    Route::delete('statistics/{statistic}', [TutorStatisticController::class, 'destroy']);

    // Gremios
    Route::get('guilds', [TutorGuildController::class, 'index']);
    Route::get('guilds/create', [TutorGuildController::class, 'create']);
    Route::post('guilds', [TutorGuildController::class, 'store']);
    Route::get('guilds/{guild}', [TutorGuildController::class, 'show']);
    Route::get('guilds/{guild}/edit', [TutorGuildController::class, 'edit']);
    Route::put('guilds/{guild}', [TutorGuildController::class, 'update']);
    Route::delete('guilds/{guild}', [TutorGuildController::class, 'destroy']);

    // Calificaciones
    Route::get('grades', [TutorGradeController::class, 'index']);
    Route::get('grades/create', [TutorGradeController::class, 'create']);
    Route::post('grades', [TutorGradeController::class, 'store']);
    Route::get('grades/{grade}', [TutorGradeController::class, 'show']);
    Route::get('grades/{grade}/edit', [TutorGradeController::class, 'edit']);
    Route::put('grades/{grade}', [TutorGradeController::class, 'update']);
    Route::delete('grades/{grade}', [TutorGradeController::class, 'destroy']);

    // Datos académicos
    Route::get('academic-data', [TutorAcademicDataController::class, 'index']);
    Route::get('academic-data/create', [TutorAcademicDataController::class, 'create']);
    Route::post('academic-data', [TutorAcademicDataController::class, 'store']);
    Route::get('academic-data/{academic_data}', [TutorAcademicDataController::class, 'show']);
    Route::get('academic-data/{academic_data}/edit', [TutorAcademicDataController::class, 'edit']);
    Route::put('academic-data/{academic_data}', [TutorAcademicDataController::class, 'update']);
    Route::delete('academic-data/{academic_data}', [TutorAcademicDataController::class, 'destroy']);

    // Estudiantes
    Route::get('students', [TutorStudentController::class, 'index']);
    Route::get('students/create', [TutorStudentController::class, 'create']);
    Route::post('students', [TutorStudentController::class, 'store']);
    Route::get('students/{student}', [TutorStudentController::class, 'show']);
    Route::get('students/{student}/edit', [TutorStudentController::class, 'edit']);
    Route::put('students/{student}', [TutorStudentController::class, 'update']);
    Route::delete('students/{student}', [TutorStudentController::class, 'destroy']);

    // Contactos
    Route::get('contacts', [TutorContactController::class, 'index']);
    Route::get('contacts/create', [TutorContactController::class, 'create']);
    Route::post('contacts', [TutorContactController::class, 'store']);
    Route::get('contacts/{contact}', [TutorContactController::class, 'show']);
    Route::get('contacts/{contact}/edit', [TutorContactController::class, 'edit']);
    Route::put('contacts/{contact}', [TutorContactController::class, 'update']);
    Route::delete('contacts/{contact}', [TutorContactController::class, 'destroy']);
});

require __DIR__.'/auth.php';
