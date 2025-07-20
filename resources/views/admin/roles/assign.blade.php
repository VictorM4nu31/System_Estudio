<x-layouts.app :title="__('Asignar Rol - Admin')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Rol Asignado Exitosamente</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400">Se ha actualizado el rol de {{ $user->name }}</p>
            </div>
            <div class="flex items-center space-x-3">
                <flux:button href="{{ route('admin.users.show', $user) }}" variant="primary">
                    <flux:icon.eye class="size-4" />
                    Ver perfil
                </flux:button>
                <flux:button href="{{ route('admin.users.index') }}" variant="ghost">
                    <flux:icon.arrow-left class="size-4" />
                    Volver a usuarios
                </flux:button>
            </div>
        </div>

        <!-- Success Message -->
        <div class="bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg p-6">
            <div class="flex items-center">
                <flux:icon.check-circle class="size-8 text-green-600 dark:text-green-400" />
                <div class="ml-4">
                    <h3 class="text-lg font-medium text-green-900 dark:text-green-100">
                        Rol actualizado correctamente
                    </h3>
                    <p class="text-sm text-green-800 dark:text-green-200 mt-1">
                        El usuario {{ $user->name }} ahora tiene el rol: 
                        <strong>{{ ucfirst($user->roles->first()->name ?? 'Sin rol') }}</strong>
                    </p>
                </div>
            </div>
        </div>

        <!-- User Summary Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
            <div class="flex items-center space-x-4">
                <div class="flex-shrink-0">
                    <div class="h-16 w-16 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center">
                        <span class="text-xl font-bold text-white">
                            {{ substr($user->name, 0, 1) }}
                        </span>
                    </div>
                </div>
                <div class="flex-1">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">{{ $user->name }}</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ $user->email }}</p>
                    <div class="mt-2 flex items-center space-x-2">
                        @if($user->roles->isNotEmpty())
                            @php
                                $role = $user->roles->first();
                                $roleConfig = match($role->name) {
                                    'admin' => [
                                        'name' => 'Administrador',
                                        'subtitle' => 'Gran Maestro',
                                        'icon' => '🎓',
                                        'class' => 'bg-red-100 text-red-800 dark:bg-red-900/50 dark:text-red-300'
                                    ],
                                    'teacher' => [
                                        'name' => 'Docente',
                                        'subtitle' => 'Maestro de Gremio',
                                        'icon' => '📚',
                                        'class' => 'bg-blue-100 text-blue-800 dark:bg-blue-900/50 dark:text-blue-300'
                                    ],
                                    'student' => [
                                        'name' => 'Alumno',
                                        'subtitle' => 'Aventurero',
                                        'icon' => '🎒',
                                        'class' => 'bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300'
                                    ],
                                    'tutor' => [
                                        'name' => 'Tutor',
                                        'subtitle' => 'Guardián',
                                        'icon' => '🛡️',
                                        'class' => 'bg-purple-100 text-purple-800 dark:bg-purple-900/50 dark:text-purple-300'
                                    ],
                                    default => [
                                        'name' => 'Sin rol',
                                        'subtitle' => 'No asignado',
                                        'icon' => '❓',
                                        'class' => 'bg-gray-100 text-gray-800 dark:bg-gray-900/50 dark:text-gray-300'
                                    ]
                                };
                            @endphp
                            <div class="flex items-center space-x-2">
                                <span class="text-xl">{{ $roleConfig['icon'] }}</span>
                                <div>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $roleConfig['class'] }}">
                                        {{ $roleConfig['name'] }}
                                    </span>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">{{ $roleConfig['subtitle'] }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Role Permissions Summary -->
        @if($user->roles->isNotEmpty())
            @php $role = $user->roles->first(); @endphp
            <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">
                    Permisos asignados al rol: {{ ucfirst($role->name) }}
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($user->getAllPermissions()->groupBy(function($permission) {
                        return explode('.', $permission->name)[0];
                    }) as $category => $permissions)
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                            <h4 class="font-medium text-gray-900 dark:text-white mb-2 capitalize">
                                {{ ucfirst($category) }}
                            </h4>
                            <ul class="space-y-1 text-sm text-gray-600 dark:text-gray-400">
                                @foreach($permissions as $permission)
                                    <li class="flex items-center">
                                        <flux:icon.check class="size-3 text-green-500 mr-2" />
                                        {{ $permission->name }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Actions -->
        <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">¿Qué deseas hacer ahora?</h3>
            <div class="flex flex-wrap items-center gap-4">
                <flux:button href="{{ route('admin.users.show', $user) }}" variant="primary">
                    <flux:icon.eye class="size-4" />
                    Ver perfil completo
                </flux:button>
                
                <flux:button href="{{ route('admin.users.edit', $user) }}" variant="outline">
                    <flux:icon.pencil class="size-4" />
                    Editar usuario
                </flux:button>
                
                @can('permissions.view')
                    <flux:button href="{{ route('admin.roles.permissions', $user) }}" variant="outline">
                        <flux:icon.key class="size-4" />
                        Ver permisos detallados
                    </flux:button>
                @endcan
                
                <flux:button href="{{ route('admin.users.index') }}" variant="ghost">
                    <flux:icon.arrow-left class="size-4" />
                    Volver a usuarios
                </flux:button>
            </div>
        </div>

        <!-- Role Information -->
        @if($user->roles->isNotEmpty())
            @php $role = $user->roles->first(); @endphp
            <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                <h3 class="text-lg font-medium text-blue-900 dark:text-blue-100 mb-4">
                    <flux:icon.info class="inline size-5 mr-2" />
                    Información del rol asignado
                </h3>
                
                @if($role->name === 'admin')
                    <div class="text-sm text-blue-800 dark:text-blue-200 space-y-2">
                        <p><strong>Administrador (Gran Maestro):</strong> Tiene control total sobre el sistema educativo RPG.</p>
                        <p><strong>Responsabilidades principales:</strong></p>
                        <ul class="list-disc list-inside ml-4 space-y-1">
                            <li>Crear y gestionar cuentas de docentes únicamente</li>
                            <li>Configurar parámetros globales del sistema</li>
                            <li>Supervisar el funcionamiento general de la plataforma</li>
                            <li>Gestionar eventos especiales y badges globales</li>
                            <li>Revisar reportes y estadísticas del sistema</li>
                        </ul>
                    </div>
                @elseif($role->name === 'teacher')
                    <div class="text-sm text-blue-800 dark:text-blue-200 space-y-2">
                        <p><strong>Docente (Maestro de Gremio):</strong> Responsable de crear y gestionar gremios educativos.</p>
                        <p><strong>Responsabilidades principales:</strong></p>
                        <ul class="list-disc list-inside ml-4 space-y-1">
                            <li>Crear gremios para organizar a los estudiantes</li>
                            <li>Asignar misiones y tareas educativas</li>
                            <li>Evaluar y calificar el trabajo de los estudiantes</li>
                            <li>Gestionar recompensas y tiendas del gremio</li>
                            <li>Comunicarse con tutores cuando sea necesario</li>
                        </ul>
                    </div>
                @elseif($role->name === 'student')
                    <div class="text-sm text-blue-800 dark:text-blue-200 space-y-2">
                        <p><strong>Alumno (Aventurero):</strong> Participa activamente en el sistema educativo gamificado.</p>
                        <p><strong>Actividades principales:</strong></p>
                        <ul class="list-disc list-inside ml-4 space-y-1">
                            <li>Unirse a gremios usando códigos de invitación</li>
                            <li>Completar misiones y tareas asignadas</li>
                            <li>Ganar experiencia y desbloquear recompensas</li>
                            <li>Participar en actividades colaborativas</li>
                            <li>Invitar a tutores para supervisión académica</li>
                        </ul>
                    </div>
                @elseif($role->name === 'tutor')
                    <div class="text-sm text-blue-800 dark:text-blue-200 space-y-2">
                        <p><strong>Tutor (Guardián):</strong> Supervisa el progreso académico de los estudiantes.</p>
                        <p><strong>Funciones principales:</strong></p>
                        <ul class="list-disc list-inside ml-4 space-y-1">
                            <li>Monitorear el progreso y calificaciones del estudiante</li>
                            <li>Recibir notificaciones sobre actividades importantes</li>
                            <li>Revisar logros y badges obtenidos</li>
                            <li>Comunicarse con docentes cuando sea necesario</li>
                            <li>Configurar preferencias de notificaciones</li>
                        </ul>
                    </div>
                @endif
            </div>
        @endif
    </div>
</x-layouts.app>
