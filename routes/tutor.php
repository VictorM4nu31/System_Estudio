<?php

use Illuminate\Support\Facades\Route;
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
