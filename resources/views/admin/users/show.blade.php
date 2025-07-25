<x-layouts.app :title="__('Detalle de Usuario - Admin')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Perfil de Usuario</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400">Información detallada de {{ $user->name }}</p>
            </div>
            <div class="flex items-center space-x-3">
                @can('users.edit')
                    <flux:button href="{{ route('admin.users.edit', $user) }}" variant="primary">
                        <flux:icon.pencil class="size-4" />
                        Editar
                    </flux:button>
                @endcan
                <flux:button href="{{ route('admin.users.index') }}" variant="ghost">
                    <flux:icon.arrow-left class="size-4" />
                    Volver a usuarios
                </flux:button>
            </div>
        </div>

        <!-- User Profile Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
            <div class="flex items-center space-x-6">
                <div class="flex-shrink-0">
                    <div class="h-24 w-24 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center">
                        <span class="text-3xl font-bold text-white">
                            {{ substr($user->name, 0, 1) }}
                        </span>
                    </div>
                </div>
                <div class="flex-1">
                    <div class="flex items-center space-x-4">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $user->name }}</h2>
                        @if($user->suspended ?? false)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800 dark:bg-red-900/50 dark:text-red-300">
                                <flux:icon.x-circle class="size-4 mr-1" />
                                Suspendido
                            </span>
                        @else
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300">
                                <flux:icon.check-circle class="size-4 mr-1" />
                                Activo
                            </span>
                        @endif
                    </div>
                    <p class="text-lg text-gray-600 dark:text-gray-400">{{ $user->email }}</p>
                    <div class="mt-4 flex items-center space-x-4">
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
                                <span class="text-2xl">{{ $roleConfig['icon'] }}</span>
                                <div>
                                    <div class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $roleConfig['class'] }}">
                                        {{ $roleConfig['name'] }}
                                    </div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">{{ $roleConfig['subtitle'] }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Account Information -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Información de la Cuenta</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500 dark:text-gray-400">ID de Usuario</span>
                        <span class="text-sm font-medium text-gray-900 dark:text-white">#{{ $user->id }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500 dark:text-gray-400">Fecha de Registro</span>
                        <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $user->created_at->format('d/m/Y H:i') }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500 dark:text-gray-400">Última Actualización</span>
                        <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $user->updated_at->format('d/m/Y H:i') }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500 dark:text-gray-400">Email Verificado</span>
                        @if($user->email_verified_at)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300">
                                <flux:icon.check class="size-3 mr-1" />
                                Verificado
                            </span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900/50 dark:text-yellow-300">
                                <flux:icon.clock class="size-3 mr-1" />
                                Pendiente
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Permisos y Roles</h3>
                <div class="space-y-4">
                    @if($user->roles->isNotEmpty())
                        @foreach($user->roles as $role)
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-500 dark:text-gray-400">Rol Asignado</span>
                                <span class="text-sm font-medium text-gray-900 dark:text-white">{{ ucfirst($role->name) }}</span>
                            </div>
                        @endforeach
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500 dark:text-gray-400">Permisos Totales</span>
                            <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $user->getAllPermissions()->count() }}</span>
                        </div>
                        @can('permissions.view')
                            <div class="pt-2">
                                <flux:button href="{{ route('admin.roles.permissions', $user) }}" variant="outline" size="sm" class="w-full">
                                    <flux:icon.key class="size-4" />
                                    Ver Permisos Detallados
                                </flux:button>
                            </div>
                        @endcan
                    @else
                        <p class="text-sm text-gray-500 dark:text-gray-400">No tiene roles asignados</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Role-specific Information -->
        @if($user->roles->isNotEmpty())
            @php $role = $user->roles->first(); @endphp
            <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">
                    Información Específica del Rol: {{ ucfirst($role->name) }}
                </h3>

                @if($role->name === 'admin')
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-red-50 dark:bg-red-900/20 p-4 rounded-lg">
                            <h4 class="font-medium text-red-900 dark:text-red-100 mb-2">Permisos Administrativos</h4>
                            <ul class="text-sm text-red-800 dark:text-red-200 space-y-1">
                                <li>• Gestión completa de usuarios</li>
                                <li>• Configuración del sistema</li>
                                <li>• Eventos globales</li>
                                <li>• Reportes y analíticas</li>
                                <li>• Moderación de contenido</li>
                            </ul>
                        </div>
                        <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg">
                            <h4 class="font-medium text-blue-900 dark:text-blue-100 mb-2">Alcance de Acción</h4>
                            <ul class="text-sm text-blue-800 dark:text-blue-200 space-y-1">
                                <li>• Acceso total al sistema</li>
                                <li>• Gestión de todos los gremios</li>
                                <li>• Supervisión de docentes</li>
                                <li>• Control de badges globales</li>
                            </ul>
                        </div>
                        <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg">
                            <h4 class="font-medium text-green-900 dark:text-green-100 mb-2">Responsabilidades</h4>
                            <ul class="text-sm text-green-800 dark:text-green-200 space-y-1">
                                <li>• Crear cuentas de docentes</li>
                                <li>• Configurar parámetros globales</li>
                                <li>• Gestionar reportes de comportamiento</li>
                                <li>• Monitorear sistema completo</li>
                            </ul>
                        </div>
                    </div>
                @elseif($role->name === 'teacher')
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg">
                            <h4 class="font-medium text-blue-900 dark:text-blue-100 mb-2">Gestión de Gremios</h4>
                            <ul class="text-sm text-blue-800 dark:text-blue-200 space-y-1">
                                <li>• Crear y administrar gremios</li>
                                <li>• Gestionar membresías</li>
                                <li>• Crear equipos y grupos</li>
                                <li>• Moderar comportamiento</li>
                            </ul>
                        </div>
                        <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg">
                            <h4 class="font-medium text-green-900 dark:text-green-100 mb-2">Misiones y Tareas</h4>
                            <ul class="text-sm text-green-800 dark:text-green-200 space-y-1">
                                <li>• Asignar misiones a estudiantes</li>
                                <li>• Crear y editar tareas</li>
                                <li>• Calificar entregas</li>
                                <li>• Gestionar eventos especiales</li>
                            </ul>
                        </div>
                        <div class="bg-purple-50 dark:bg-purple-900/20 p-4 rounded-lg">
                            <h4 class="font-medium text-purple-900 dark:text-purple-100 mb-2">Recompensas</h4>
                            <ul class="text-sm text-purple-800 dark:text-purple-200 space-y-1">
                                <li>• Crear tiendas del gremio</li>
                                <li>• Gestionar recompensas</li>
                                <li>• Aprobar canjes</li>
                                <li>• Contactar tutores</li>
                            </ul>
                        </div>
                    </div>
                @elseif($role->name === 'student')
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg">
                            <h4 class="font-medium text-green-900 dark:text-green-100 mb-2">Participación</h4>
                            <ul class="text-sm text-green-800 dark:text-green-200 space-y-1">
                                <li>• Unirse a gremios</li>
                                <li>• Participar en actividades</li>
                                <li>• Interactuar con compañeros</li>
                                <li>• Invitar tutores</li>
                            </ul>
                        </div>
                        <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg">
                            <h4 class="font-medium text-blue-900 dark:text-blue-100 mb-2">Misiones y Progreso</h4>
                            <ul class="text-sm text-blue-800 dark:text-blue-200 space-y-1">
                                <li>• Aceptar y completar misiones</li>
                                <li>• Seguir progreso personal</li>
                                <li>• Ver estadísticas y nivel</li>
                                <li>• Consultar historial</li>
                            </ul>
                        </div>
                        <div class="bg-orange-50 dark:bg-orange-900/20 p-4 rounded-lg">
                            <h4 class="font-medium text-orange-900 dark:text-orange-100 mb-2">Recompensas</h4>
                            <ul class="text-sm text-orange-800 dark:text-orange-200 space-y-1">
                                <li>• Canjear recompensas</li>
                                <li>• Gestionar inventario</li>
                                <li>• Personalizar perfil</li>
                                <li>• Desbloquear logros</li>
                            </ul>
                        </div>
                    </div>
                @elseif($role->name === 'tutor')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-purple-50 dark:bg-purple-900/20 p-4 rounded-lg">
                            <h4 class="font-medium text-purple-900 dark:text-purple-100 mb-2">Supervisión</h4>
                            <ul class="text-sm text-purple-800 dark:text-purple-200 space-y-1">
                                <li>• Ver progreso del estudiante</li>
                                <li>• Consultar calificaciones</li>
                                <li>• Revisar logros obtenidos</li>
                                <li>• Monitorear participación</li>
                            </ul>
                        </div>
                        <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg">
                            <h4 class="font-medium text-blue-900 dark:text-blue-100 mb-2">Comunicación</h4>
                            <ul class="text-sm text-blue-800 dark:text-blue-200 space-y-1">
                                <li>• Recibir notificaciones</li>
                                <li>• Contactar docentes</li>
                                <li>• Ver reportes mensuales</li>
                                <li>• Configurar alertas</li>
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        @endif

        <!-- Actions -->
        <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Acciones</h3>
            <div class="flex items-center space-x-4">
                @can('users.edit')
                    <flux:button href="{{ route('admin.users.edit', $user) }}" variant="primary">
                        <flux:icon.pencil class="size-4" />
                        Editar Usuario
                    </flux:button>
                @endcan

                @can('users.suspend')
                    @if(!($user->suspended ?? false))
                        <flux:button onclick="confirm('¿Estás seguro de suspender este usuario?') && document.getElementById('suspend-form').submit()" variant="outline" class="text-orange-600 hover:text-orange-700">
                            <flux:icon.exclamation-triangle class="size-4" />
                            Suspender Usuario
                        </flux:button>
                        <form id="suspend-form" action="{{ route('admin.users.suspend', $user) }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endif
                @endcan

                @can('users.delete')
                    <flux:button onclick="confirm('¿Estás seguro de eliminar este usuario? Esta acción no se puede deshacer.') && document.getElementById('delete-form').submit()" variant="outline" class="text-red-600 hover:text-red-700">
                        <flux:icon.trash class="size-4" />
                        Eliminar Usuario
                    </flux:button>
                    <form id="delete-form" action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                @endcan
            </div>
        </div>
    </div>
</x-layouts.app>
