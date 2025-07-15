# Sistema de Roles y Permisos - Plataforma Educativa RPG

## Descripción General

Este sistema está orientado a motivar a estudiantes de primaria y secundaria en México a mejorar su rendimiento académico a través de mecánicas inspiradas en juegos de rol (RPG), donde las actividades escolares se convierten en "misiones", las clases en "gremios", y los logros en "insignias y recompensas".

## Roles Implementados

### 1. ADMIN (GRAN MAESTRO)
**Descripción**: Usuario encargado de la administración general del sistema. No interactúa directamente con alumnos ni tareas.

**Permisos Base**:
- `users.create` - Permite crear cuentas de docentes
- `users.delete` - Permite eliminar usuarios del sistema
- `users.view` - Ver la lista de usuarios registrados
- `roles.assign` - Asignar roles (Docente, Alumno, Tutor) a usuarios
- `permissions.view` - Consultar los permisos asignados a cada rol o usuario
- `settings.manage` - Configurar parámetros globales del sistema
- `logs.view` - Consultar el historial de acciones realizadas por los usuarios

**Permisos Adicionales**:
- `users.edit` - Editar información de docentes
- `users.suspend` - Suspender usuarios temporalmente
- `admin.system.configure` - Configurar parámetros globales avanzados
- `admin.events.create` - Crear eventos especiales del sistema
- `admin.events.manage` - Gestionar eventos globales
- `admin.reports.view_all` - Ver estadísticas y métricas globales
- `admin.analytics.view` - Ver análisis de uso del sistema
- `admin.moderation.manage` - Gestionar reportes de comportamiento
- `admin.badges.global.create` - Crear insignias globales del sistema
- `guild.codes.view` - Ver códigos de invitación de todos los gremios

### 2. DOCENTE (MAESTRO DE GREMIO)
**Descripción**: Usuario que representa al profesor. Tiene la capacidad de crear gremios, asignar tareas, y premiar a sus alumnos.

**Permisos Base**:
- `guilds.create` - Crear gremios (grupos de estudiantes por clase o materia)
- `guilds.edit` - Editar nombre, descripción u otros datos de un gremio
- `guilds.delete` - Eliminar un gremio
- `missions.assign` - Crear y asignar misiones a estudiantes
- `missions.view` - Visualizar todas las misiones existentes
- `tasks.create` - Crear tareas asociadas a misiones
- `tasks.edit` - Editar contenido de tareas ya creadas
- `shops.create` - Crear tiendas dentro de un gremio
- `rewards.create` - Crear recompensas para las tiendas
- `events.manage` - Gestionar misiones de eventos especiales
- `reports.view` - Consultar reportes de progreso de sus alumnos

**Permisos Adicionales**:
- `guild.members.invite` - Regenerar códigos de invitación del gremio
- `guild.members.approve` - Aprobar estudiantes que usaron el código
- `guild.members.remove` - Expulsar estudiantes del gremio
- `guild.teams.create` - Crear equipos/grupos dentro del gremio
- `guild.moderate` - Moderar comportamiento en el gremio
- `guild.code.view` - Ver código de invitación actual del gremio
- `guild.code.regenerate` - Regenerar código de invitación
- `missions.delete` - Eliminar misiones
- `missions.grade` - Calificar y aprobar entregas
- `missions.reject` - Rechazar entregas con feedback
- `tasks.delete` - Eliminar tareas
- `shops.edit` - Editar tiendas existentes
- `rewards.edit` - Editar recompensas existentes
- `rewards.approve` - Aprobar canje de recompensas
- `shop.inventory.manage` - Gestionar inventario de tienda
- `guild.announcements.create` - Crear anuncios para el gremio
- `guild.messages.send` - Enviar mensajes al gremio
- `reports.student.individual` - Ver progreso individual detallado
- `guild.events.create` - Crear eventos específicos del gremio
- `students.academic.view` - Ver datos académicos de estudiantes
- `tutors.contact` - Contactar a tutores de estudiantes

### 3. ALUMNO (AVENTURERO)
**Descripción**: Usuario que representa al estudiante. Solo puede interactuar con los gremios a los que se une mediante código.

**Permisos Base**:
- `missions.view` - Ver las misiones disponibles en los gremios
- `tasks.accept` - Aceptar una tarea/misión dejada por el docente
- `tasks.reject` - Rechazar una misión (si la mecánica lo permite)
- `scores.view` - Ver su puntuación total, experiencia ganada, progreso
- `rewards.redeem` - Canjear sus puntos o monedas por recompensas
- `badges.unlock` - Desbloquear insignias automáticas por logros

**Permisos Adicionales**:
- `missions.submit` - Entregar misiones completadas
- `missions.progress.track` - Seguir progreso de misiones activas
- `profile.stats.view` - Ver estadísticas detalladas personales
- `profile.history.view` - Ver historial de misiones completadas
- `profile.level.view` - Ver nivel y barra de experiencia
- `leaderboard.view` - Ver ranking del gremio
- `inventory.manage` - Gestionar inventario personal
- `shop.browse` - Explorar tienda del gremio
- `achievements.view` - Ver logros obtenidos
- `profile.customize` - Personalizar avatar y perfil
- `profile.title.select` - Seleccionar títulos obtenidos
- `guild.view` - Ver información del gremio
- `guild.members.view` - Ver perfiles de compañeros
- `guild.activities.participate` - Participar en actividades grupales
- `guild.join` - Unirse a gremio usando código de invitación
- `guild.leave` - Abandonar gremio (con restricciones)
- `guild.multiple.manage` - Gestionar pertenencia a múltiples gremios
- `tutor.invite` - Invitar tutor durante el registro
- `profile.academic.update` - Actualizar datos académicos
- `notifications.tutor.send` - Enviar notificaciones automáticas a tutor

### 4. TUTOR (GUARDIÁN)
**Descripción**: Usuario externo que representa a un padre, madre o tutor legal del estudiante. Solo puede visualizar la información académica del alumno.

**Permisos Base**:
- `invitations.accept` - Aceptar la invitación enviada automáticamente
- `scores.view.child` - Ver el puntaje, progreso y calificaciones
- `missions.view.child` - Ver las misiones que el alumno tiene pendientes
- `notifications.receive` - Recibir notificaciones importantes

**Permisos Adicionales**:
- `student.achievements.view` - Ver logros y insignias obtenidos
- `student.attendance.view` - Ver participación en actividades
- `reports.monthly.view` - Ver reportes mensuales de progreso
- `teacher.contact` - Contactar al docente (limitado)
- `notifications.configure` - Configurar qué notificaciones recibir
- `student.profile.view` - Ver perfil completo del estudiante
- `student.statistics.view` - Ver estadísticas detalladas de rendimiento
- `student.guilds.view` - Ver todos los gremios del estudiante
- `student.grades.view` - Ver calificaciones del estudiante en todas las materias
- `student.academic.view` - Ver datos académicos (matrícula, grado, escuela)
- `multiple.students.manage` - Gestionar múltiples hijos en el sistema

## Instalación y Uso

### 1. Ejecutar las migraciones
```bash
php artisan migrate
```

### 2. Ejecutar el seeder
```bash
php artisan db:seed
```

### 3. Usuario administrador creado
- **Email**: admin@rpg-educativo.com
- **Password**: password

## Uso en el Código

### Verificar roles
```php
// Verificar si el usuario tiene un rol específico
if ($user->hasRole('admin')) {
    // Lógica para administrador
}

// Verificar si el usuario tiene cualquiera de estos roles
if ($user->hasAnyRole(['admin', 'teacher'])) {
    // Lógica para admin o teacher
}
```

### Verificar permisos
```php
// Verificar si el usuario tiene un permiso específico
if ($user->hasPermissionTo('users.create')) {
    // Lógica para crear usuarios
}

// Verificar si el usuario tiene cualquiera de estos permisos
if ($user->hasAnyPermission(['users.create', 'users.edit'])) {
    // Lógica para crear o editar usuarios
}
```

### En Blade Templates
```php
@role('admin')
    <!-- Contenido solo para administradores -->
@endrole

@can('users.create')
    <!-- Contenido solo para usuarios con permiso de crear usuarios -->
@endcan
```

### En Middleware
```php
// Proteger rutas por rol
Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
});

// Proteger rutas por permiso
Route::middleware(['permission:users.create'])->group(function () {
    Route::post('/users', [UserController::class, 'store']);
});
```

## Flujo de Registro y Relaciones

1. **Admin** crea cuentas de **Docentes** únicamente
2. **Docentes** crean gremios que generan códigos de invitación automáticamente
3. **Alumnos** se registran de forma independiente en el sistema
4. **Alumnos** ingresan código de gremio durante/después del registro
5. **Alumnos** están obligados a ingresar datos de tutor durante el registro
6. **Tutores** reciben invitación automática por correo y crean su cuenta al aceptar

## Relaciones del Sistema

- **Admin** ← crea → **Docente**
- **Docente** ← crea gremios con código → **Alumno** (registro independiente + código)
- **Alumno** ← invita automáticamente → **Tutor**

## Notas Importantes

- El sistema utiliza Spatie Laravel Permission para la gestión de roles y permisos
- Los permisos están organizados por funcionalidad y rol
- Se incluyen tanto permisos base como permisos adicionales para mayor flexibilidad
- El seeder crea automáticamente un usuario administrador por defecto
- Todos los permisos están configurados para el guard 'web' 
