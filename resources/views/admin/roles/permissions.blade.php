<x-layouts.app :title="__('Permisos Detallados - Admin')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                    Permisos Detallados
                </h1>
                @if(isset($user))
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Permisos asignados al usuario: {{ $user->name }}
                    </p>
                @elseif(isset($role))
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Permisos del rol: {{ ucfirst($role->name) }}
                    </p>
                @endif
            </div>
            <div class="flex items-center space-x-3">
                @if(isset($user))
                    <flux:button href="{{ route('admin.users.show', $user) }}" variant="primary">
                        <flux:icon.eye class="size-4" />
                        Ver perfil
                    </flux:button>
                @endif
                <flux:button href="{{ route('admin.users.index') }}" variant="ghost">
                    <flux:icon.arrow-left class="size-4" />
                    Volver a usuarios
                </flux:button>
            </div>
        </div>

        <!-- Subject Information -->
        @if(isset($user))
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
                                @foreach($user->roles as $userRole)
                                    @php
                                        $roleConfig = match($userRole->name) {
                                            'admin' => [
                                                'name' => 'Administrador',
                                                'icon' => '🎓',
                                                'class' => 'bg-red-100 text-red-800 dark:bg-red-900/50 dark:text-red-300'
                                            ],
                                            'teacher' => [
                                                'name' => 'Docente',
                                                'icon' => '📚',
                                                'class' => 'bg-blue-100 text-blue-800 dark:bg-blue-900/50 dark:text-blue-300'
                                            ],
                                            'student' => [
                                                'name' => 'Alumno',
                                                'icon' => '🎒',
                                                'class' => 'bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300'
                                            ],
                                            'tutor' => [
                                                'name' => 'Tutor',
                                                'icon' => '🛡️',
                                                'class' => 'bg-purple-100 text-purple-800 dark:bg-purple-900/50 dark:text-purple-300'
                                            ],
                                            default => [
                                                'name' => ucfirst($userRole->name),
                                                'icon' => '❓',
                                                'class' => 'bg-gray-100 text-gray-800 dark:bg-gray-900/50 dark:text-gray-300'
                                            ]
                                        };
                                    @endphp
                                    <div class="flex items-center space-x-1">
                                        <span class="text-lg">{{ $roleConfig['icon'] }}</span>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $roleConfig['class'] }}">
                                            {{ $roleConfig['name'] }}
                                        </span>
                                    </div>
                                @endforeach
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-900/50 dark:text-gray-300">
                                    Sin roles asignados
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @elseif(isset($role))
            <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        @php
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
                                    'name' => ucfirst($role->name),
                                    'subtitle' => 'Rol personalizado',
                                    'icon' => '❓',
                                    'class' => 'bg-gray-100 text-gray-800 dark:bg-gray-900/50 dark:text-gray-300'
                                ]
                            };
                        @endphp
                        <div class="h-16 w-16 rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center">
                            <span class="text-2xl">{{ $roleConfig['icon'] }}</span>
                        </div>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                            {{ $roleConfig['name'] }}
                        </h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $roleConfig['subtitle'] }}</p>
                        <div class="mt-2">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $roleConfig['class'] }}">
                                Rol: {{ ucfirst($role->name) }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Permissions Summary -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg border border-gray-200 dark:border-gray-700">
                <div class="flex items-center">
                    <div class="p-2 bg-blue-100 dark:bg-blue-900/50 rounded-lg">
                        <flux:icon.key class="size-6 text-blue-600 dark:text-blue-400" />
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Permisos</h3>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ count($permissions) }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg border border-gray-200 dark:border-gray-700">
                <div class="flex items-center">
                    <div class="p-2 bg-green-100 dark:bg-green-900/50 rounded-lg">
                        <flux:icon.shield-check class="size-6 text-green-600 dark:text-green-400" />
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Categorías</h3>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white">
                            {{ collect($permissions)->map(function($permission) {
                                return explode('.', $permission)[0];
                            })->unique()->count() }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg border border-gray-200 dark:border-gray-700">
                <div class="flex items-center">
                    <div class="p-2 bg-purple-100 dark:bg-purple-900/50 rounded-lg">
                        <flux:icon.user-circle class="size-6 text-purple-600 dark:text-purple-400" />
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Origen</h3>
                        <p class="text-lg font-bold text-gray-900 dark:text-white">
                            @if(isset($user))
                                Usuario
                            @else
                                Rol
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Permissions by Category -->
        <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-6">
                Permisos Organizados por Categoría
            </h3>

            @php
                $groupedPermissions = collect($permissions)->groupBy(function($permission) {
                    return explode('.', $permission)[0];
                });
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($groupedPermissions as $category => $categoryPermissions)
                    @php
                        $categoryConfig = match($category) {
                            'users' => [
                                'name' => 'Usuarios',
                                'icon' => '👥',
                                'class' => 'bg-blue-50 dark:bg-blue-900/20 border-blue-200 dark:border-blue-800',
                                'iconClass' => 'text-blue-600 dark:text-blue-400'
                            ],
                            'roles' => [
                                'name' => 'Roles',
                                'icon' => '🎭',
                                'class' => 'bg-purple-50 dark:bg-purple-900/20 border-purple-200 dark:border-purple-800',
                                'iconClass' => 'text-purple-600 dark:text-purple-400'
                            ],
                            'permissions' => [
                                'name' => 'Permisos',
                                'icon' => '🔐',
                                'class' => 'bg-green-50 dark:bg-green-900/20 border-green-200 dark:border-green-800',
                                'iconClass' => 'text-green-600 dark:text-green-400'
                            ],
                            'guilds' => [
                                'name' => 'Gremios',
                                'icon' => '🏰',
                                'class' => 'bg-indigo-50 dark:bg-indigo-900/20 border-indigo-200 dark:border-indigo-800',
                                'iconClass' => 'text-indigo-600 dark:text-indigo-400'
                            ],
                            'missions' => [
                                'name' => 'Misiones',
                                'icon' => '⚔️',
                                'class' => 'bg-red-50 dark:bg-red-900/20 border-red-200 dark:border-red-800',
                                'iconClass' => 'text-red-600 dark:text-red-400'
                            ],
                            'tasks' => [
                                'name' => 'Tareas',
                                'icon' => '📋',
                                'class' => 'bg-orange-50 dark:bg-orange-900/20 border-orange-200 dark:border-orange-800',
                                'iconClass' => 'text-orange-600 dark:text-orange-400'
                            ],
                            'rewards' => [
                                'name' => 'Recompensas',
                                'icon' => '🏆',
                                'class' => 'bg-yellow-50 dark:bg-yellow-900/20 border-yellow-200 dark:border-yellow-800',
                                'iconClass' => 'text-yellow-600 dark:text-yellow-400'
                            ],
                            'badges' => [
                                'name' => 'Insignias',
                                'icon' => '🏅',
                                'class' => 'bg-pink-50 dark:bg-pink-900/20 border-pink-200 dark:border-pink-800',
                                'iconClass' => 'text-pink-600 dark:text-pink-400'
                            ],
                            'admin' => [
                                'name' => 'Administración',
                                'icon' => '⚙️',
                                'class' => 'bg-gray-50 dark:bg-gray-900/20 border-gray-200 dark:border-gray-800',
                                'iconClass' => 'text-gray-600 dark:text-gray-400'
                            ],
                            'settings' => [
                                'name' => 'Configuración',
                                'icon' => '🔧',
                                'class' => 'bg-teal-50 dark:bg-teal-900/20 border-teal-200 dark:border-teal-800',
                                'iconClass' => 'text-teal-600 dark:text-teal-400'
                            ],
                            'reports' => [
                                'name' => 'Reportes',
                                'icon' => '📊',
                                'class' => 'bg-cyan-50 dark:bg-cyan-900/20 border-cyan-200 dark:border-cyan-800',
                                'iconClass' => 'text-cyan-600 dark:text-cyan-400'
                            ],
                            'logs' => [
                                'name' => 'Logs',
                                'icon' => '📜',
                                'class' => 'bg-violet-50 dark:bg-violet-900/20 border-violet-200 dark:border-violet-800',
                                'iconClass' => 'text-violet-600 dark:text-violet-400'
                            ],
                            default => [
                                'name' => ucfirst($category),
                                'icon' => '📝',
                                'class' => 'bg-gray-50 dark:bg-gray-900/20 border-gray-200 dark:border-gray-800',
                                'iconClass' => 'text-gray-600 dark:text-gray-400'
                            ]
                        };
                    @endphp

                    <div class="border rounded-lg p-4 {{ $categoryConfig['class'] }}">
                        <div class="flex items-center mb-3">
                            <span class="text-2xl mr-2">{{ $categoryConfig['icon'] }}</span>
                            <h4 class="font-medium text-gray-900 dark:text-white">
                                {{ $categoryConfig['name'] }}
                            </h4>
                            <span class="ml-auto text-sm text-gray-500 dark:text-gray-400">
                                {{ count($categoryPermissions) }}
                            </span>
                        </div>

                        <div class="space-y-2">
                            @foreach($categoryPermissions as $permission)
                                <div class="flex items-center text-sm">
                                    <flux:icon.check class="size-3 text-green-500 mr-2 flex-shrink-0" />
                                    <span class="text-gray-700 dark:text-gray-300">{{ $permission }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Permission Descriptions -->
        <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-6">
                Descripción de Permisos Clave
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h4 class="font-medium text-gray-900 dark:text-white mb-3">🎓 Permisos Administrativos</h4>
                    <div class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                        <div><strong>users.create:</strong> Crear cuentas de docentes</div>
                        <div><strong>users.delete:</strong> Eliminar usuarios del sistema</div>
                        <div><strong>settings.manage:</strong> Configurar parámetros globales</div>
                        <div><strong>admin.system.configure:</strong> Configuración avanzada</div>
                    </div>
                </div>

                <div>
                    <h4 class="font-medium text-gray-900 dark:text-white mb-3">📚 Permisos de Docente</h4>
                    <div class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                        <div><strong>guilds.create:</strong> Crear gremios educativos</div>
                        <div><strong>missions.assign:</strong> Asignar misiones a estudiantes</div>
                        <div><strong>tasks.create:</strong> Crear tareas educativas</div>
                        <div><strong>rewards.create:</strong> Crear recompensas para estudiantes</div>
                        <div><strong>guild.members.approve:</strong> Aprobar miembros del gremio</div>
                    </div>
                </div>

                <div>
                    <h4 class="font-medium text-gray-900 dark:text-white mb-3">🎒 Permisos de Alumno</h4>
                    <div class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                        <div><strong>missions.view:</strong> Ver misiones disponibles</div>
                        <div><strong>tasks.accept:</strong> Aceptar tareas asignadas</div>
                        <div><strong>rewards.redeem:</strong> Canjear recompensas</div>
                        <div><strong>guild.join:</strong> Unirse a gremios</div>
                        <div><strong>profile.customize:</strong> Personalizar perfil</div>
                    </div>
                </div>

                <div>
                    <h4 class="font-medium text-gray-900 dark:text-white mb-3">🛡️ Permisos de Tutor</h4>
                    <div class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                        <div><strong>scores.view.child:</strong> Ver progreso del estudiante</div>
                        <div><strong>missions.view.child:</strong> Ver misiones del estudiante</div>
                        <div><strong>notifications.receive:</strong> Recibir notificaciones</div>
                        <div><strong>teacher.contact:</strong> Contactar docentes</div>
                        <div><strong>student.grades.view:</strong> Ver calificaciones</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Acciones</h3>
            <div class="flex flex-wrap items-center gap-4">
                @if(isset($user))
                    <flux:button href="{{ route('admin.users.show', $user) }}" variant="primary">
                        <flux:icon.eye class="size-4" />
                        Ver perfil del usuario
                    </flux:button>

                    @can('users.edit')
                        <flux:button href="{{ route('admin.users.edit', $user) }}" variant="outline">
                            <flux:icon.pencil class="size-4" />
                            Editar usuario
                        </flux:button>
                    @endcan
                @endif

                <flux:button href="{{ route('admin.users.index') }}" variant="ghost">
                    <flux:icon.arrow-left class="size-4" />
                    Volver a usuarios
                </flux:button>
            </div>
        </div>
    </div>
</x-layouts.app>
