<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Limpiar cache de permisos
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Crear permisos para ADMIN (GRAN MAESTRO)
        $adminPermissions = [
            // Permisos Base
            'users.create',
            'users.delete',
            'users.view',
            'roles.view',
            'roles.assign',
            'permissions.view',
            'settings.manage',
            'logs.view',

            // Permisos Adicionales
            'users.edit',
            'users.suspend',
            'admin.system.configure',
            'admin.reports.view_all',
            'admin.analytics.view',
        ];

        // Crear permisos para DOCENTE (MAESTRO DE GREMIO)
        $teacherPermissions = [
            // Permisos Base
            'guilds.create',
            'guilds.edit',
            'guilds.delete',
            'missions.assign',
            'missions.view',
            'tasks.create',
            'tasks.edit',
            'shops.create',
            'rewards.create',
            'events.manage',
            'reports.view',

            // Permisos Adicionales
            'guild.members.invite',
            'guild.members.approve',
            'guild.members.remove',
            'guild.teams.create',
            'guild.moderate',
            'guild.code.view',
            'guild.code.regenerate',
            'missions.delete',
            'missions.grade',
            'missions.reject',
            'tasks.delete',
            'shops.edit',
            'rewards.edit',
            'rewards.approve',
            'shop.inventory.manage',
            'guild.announcements.create',
            'guild.messages.send',
            'reports.student.individual',
            'guild.events.create',
            'students.academic.view',
            'tutors.contact',
        ];

        // Crear permisos para ALUMNO (AVENTURERO)
        $studentPermissions = [
            // Permisos Base
            'missions.view',
            'tasks.accept',
            'tasks.reject',
            'scores.view',
            'rewards.redeem',
            'badges.unlock',

            // Permisos Adicionales
            'missions.submit',
            'missions.progress.track',
            'profile.stats.view',
            'profile.history.view',
            'profile.level.view',
            'leaderboard.view',
            'inventory.manage',
            'shop.browse',
            'achievements.view',
            'profile.customize',
            'profile.title.select',
            'guild.view',
            'guild.members.view',
            'guild.activities.participate',
            'guild.join',
            'guild.leave',
            'guild.multiple.manage',
            'tutor.invite',
            'profile.academic.update',
            'notifications.tutor.send',
        ];

        // Crear permisos para TUTOR (GUARDIÁN)
        $tutorPermissions = [
            // Permisos Base
            'invitations.accept',
            'scores.view.child',
            'missions.view.child',
            'notifications.receive',

            // Permisos Adicionales
            'student.achievements.view',
            'student.attendance.view',
            'reports.monthly.view',
            'teacher.contact',
            'notifications.configure',
            'student.profile.view',
            'student.statistics.view',
            'student.guilds.view',
            'student.grades.view',
            'student.academic.view',
            'multiple.students.manage',
        ];

        // Crear todos los permisos
        $allPermissions = array_merge(
            $adminPermissions,
            $teacherPermissions,
            $studentPermissions,
            $tutorPermissions
        );

        // Eliminar duplicados
        $allPermissions = array_unique($allPermissions);

        // Crear permisos en la base de datos
        foreach ($allPermissions as $permission) {
            Permission::create(['name' => $permission, 'guard_name' => 'web']);
        }

        // Crear roles
        $adminRole = Role::create(['name' => 'admin', 'guard_name' => 'web']);
        $teacherRole = Role::create(['name' => 'teacher', 'guard_name' => 'web']);
        $studentRole = Role::create(['name' => 'student', 'guard_name' => 'web']);
        $tutorRole = Role::create(['name' => 'tutor', 'guard_name' => 'web']);

        // Asignar permisos a roles
        $adminRole->givePermissionTo($adminPermissions);
        $teacherRole->givePermissionTo($teacherPermissions);
        $studentRole->givePermissionTo($studentPermissions);
        $tutorRole->givePermissionTo($tutorPermissions);

        // Crear usuario administrador por defecto
        $adminUser = \App\Models\User::create([
            'name' => 'Gran Maestro',
            'email' => 'admin@rpg-educativo.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);

        // Asignar rol de administrador al usuario por defecto
        $adminUser->assignRole('admin');

        $this->command->info('✅ Roles y permisos creados exitosamente:');
        $this->command->info('   - Admin (Gran Maestro): ' . count($adminPermissions) . ' permisos');
        $this->command->info('   - Teacher (Maestro de Gremio): ' . count($teacherPermissions) . ' permisos');
        $this->command->info('   - Student (Aventurero): ' . count($studentPermissions) . ' permisos');
        $this->command->info('   - Tutor (Guardián): ' . count($tutorPermissions) . ' permisos');
        $this->command->info('   - Total de permisos únicos: ' . count($allPermissions));
        $this->command->info('   - Usuario admin creado: admin@rpg-educativo.com / password');
    }
}
