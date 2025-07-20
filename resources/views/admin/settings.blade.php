<x-layouts.app :title="__('Configuración del Sistema - Admin')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Configuración del Sistema</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400">Gestiona la configuración general del sistema educativo RPG</p>
            </div>
            <div class="flex items-center space-x-3">
                @can('admin.system.configure')
                    <flux:button href="{{ route('admin.settings.advanced') }}" variant="outline">
                        <flux:icon.cog class="size-4" />
                        Configuración Avanzada
                    </flux:button>
                @endcan
                <flux:button href="{{ route('dashboard') }}" variant="ghost">
                    <flux:icon.arrow-left class="size-4" />
                    Volver al Dashboard
                </flux:button>
            </div>
        </div>

        <!-- System Status Overview -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg border border-gray-200 dark:border-gray-700">
                <div class="flex items-center">
                    <div class="p-2 bg-green-100 dark:bg-green-900/50 rounded-lg">
                        <flux:icon.check-circle class="size-6 text-green-600 dark:text-green-400" />
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Estado del Sistema</h3>
                        <p class="text-lg font-bold text-green-600 dark:text-green-400">Activo</p>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg border border-gray-200 dark:border-gray-700">
                <div class="flex items-center">
                    <div class="p-2 bg-blue-100 dark:bg-blue-900/50 rounded-lg">
                        <flux:icon.server class="size-6 text-blue-600 dark:text-blue-400" />
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Entorno</h3>
                        <p class="text-lg font-bold text-gray-900 dark:text-white">{{ config('app.env') }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg border border-gray-200 dark:border-gray-700">
                <div class="flex items-center">
                    <div class="p-2 bg-purple-100 dark:bg-purple-900/50 rounded-lg">
                        <flux:icon.code class="size-6 text-purple-600 dark:text-purple-400" />
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Versión</h3>
                        <p class="text-lg font-bold text-gray-900 dark:text-white">v1.0.0</p>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg border border-gray-200 dark:border-gray-700">
                <div class="flex items-center">
                    <div class="p-2 bg-orange-100 dark:bg-orange-900/50 rounded-lg">
                        <flux:icon.shield class="size-6 text-orange-600 dark:text-orange-400" />
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Debug</h3>
                        <p class="text-lg font-bold text-gray-900 dark:text-white">
                            {{ config('app.debug') ? 'Activo' : 'Inactivo' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Configuration Sections -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Application Settings -->
            <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                        🎓 Configuración de la Aplicación
                    </h3>
                    <flux:button variant="ghost" size="sm">
                        <flux:icon.pencil class="size-4" />
                    </flux:button>
                </div>

                <div class="space-y-4">
                    <div class="flex items-center justify-between py-2">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Nombre del Sistema</span>
                        <span class="text-sm font-medium text-gray-900 dark:text-white">{{ config('app.name') }}</span>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <span class="text-sm text-gray-600 dark:text-gray-400">URL Base</span>
                        <span class="text-sm font-medium text-gray-900 dark:text-white">{{ config('app.url') }}</span>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Zona Horaria</span>
                        <span class="text-sm font-medium text-gray-900 dark:text-white">{{ config('app.timezone') }}</span>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Idioma</span>
                        <span class="text-sm font-medium text-gray-900 dark:text-white">{{ config('app.locale') }}</span>
                    </div>
                </div>
            </div>

            <!-- RPG System Settings -->
            <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                        ⚔️ Configuración del Sistema RPG
                    </h3>
                    <flux:button variant="ghost" size="sm">
                        <flux:icon.pencil class="size-4" />
                    </flux:button>
                </div>

                <div class="space-y-4">
                    <div class="flex items-center justify-between py-2">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Experiencia base por misión</span>
                        <span class="text-sm font-medium text-gray-900 dark:text-white">100 XP</span>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Monedas base por misión</span>
                        <span class="text-sm font-medium text-gray-900 dark:text-white">50 Monedas</span>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Nivel máximo del sistema</span>
                        <span class="text-sm font-medium text-gray-900 dark:text-white">100</span>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Misiones simultáneas por alumno</span>
                        <span class="text-sm font-medium text-gray-900 dark:text-white">5</span>
                    </div>
                </div>
            </div>

            <!-- Guild System Settings -->
            <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                        🏰 Configuración de Gremios
                    </h3>
                    <flux:button variant="ghost" size="sm">
                        <flux:icon.pencil class="size-4" />
                    </flux:button>
                </div>

                <div class="space-y-4">
                    <div class="flex items-center justify-between py-2">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Miembros máximos por gremio</span>
                        <span class="text-sm font-medium text-gray-900 dark:text-white">30</span>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Gremios máximos por docente</span>
                        <span class="text-sm font-medium text-gray-900 dark:text-white">10</span>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Caducidad de códigos (días)</span>
                        <span class="text-sm font-medium text-gray-900 dark:text-white">30</span>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Auto-aprobación de miembros</span>
                        <span class="text-sm font-medium text-gray-900 dark:text-white">Desactivado</span>
                    </div>
                </div>
            </div>

            <!-- Notification Settings -->
            <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                        🔔 Configuración de Notificaciones
                    </h3>
                    <flux:button variant="ghost" size="sm">
                        <flux:icon.pencil class="size-4" />
                    </flux:button>
                </div>

                <div class="space-y-4">
                    <div class="flex items-center justify-between py-2">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Notificaciones por email</span>
                        <flux:toggle checked />
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Notificaciones a tutores</span>
                        <flux:toggle checked />
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Reportes automáticos</span>
                        <flux:toggle checked />
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Notificaciones push</span>
                        <flux:toggle />
                    </div>
                </div>
            </div>
        </div>

        <!-- System Information -->
        <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">
                📊 Información del Sistema
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div>
                    <h4 class="font-medium text-gray-900 dark:text-white mb-3">Aplicación</h4>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-400">Framework:</span>
                            <span class="text-gray-900 dark:text-white">Laravel {{ app()->version() }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-400">PHP:</span>
                            <span class="text-gray-900 dark:text-white">{{ PHP_VERSION }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-400">Servidor:</span>
                            <span class="text-gray-900 dark:text-white">{{ $_SERVER['SERVER_SOFTWARE'] ?? 'N/A' }}</span>
                        </div>
                    </div>
                </div>
                
                <div>
                    <h4 class="font-medium text-gray-900 dark:text-white mb-3">Base de Datos</h4>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-400">Conexión:</span>
                            <span class="text-gray-900 dark:text-white">{{ config('database.default') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-400">Host:</span>
                            <span class="text-gray-900 dark:text-white">{{ config('database.connections.'.config('database.default').'.host') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-400">Base:</span>
                            <span class="text-gray-900 dark:text-white">{{ config('database.connections.'.config('database.default').'.database') }}</span>
                        </div>
                    </div>
                </div>
                
                <div>
                    <h4 class="font-medium text-gray-900 dark:text-white mb-3">Cache y Sesiones</h4>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-400">Cache:</span>
                            <span class="text-gray-900 dark:text-white">{{ config('cache.default') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-400">Sesiones:</span>
                            <span class="text-gray-900 dark:text-white">{{ config('session.driver') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-400">Queue:</span>
                            <span class="text-gray-900 dark:text-white">{{ config('queue.default') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">
                ⚡ Acciones Rápidas
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <flux:button variant="outline" class="flex flex-col items-center p-4 h-24">
                    <flux:icon.arrow-path class="size-6 mb-2" />
                    <span class="text-sm">Limpiar Cache</span>
                </flux:button>
                
                <flux:button variant="outline" class="flex flex-col items-center p-4 h-24">
                    <flux:icon.database class="size-6 mb-2" />
                    <span class="text-sm">Backup BD</span>
                </flux:button>
                
                <flux:button variant="outline" class="flex flex-col items-center p-4 h-24">
                    <flux:icon.document-text class="size-6 mb-2" />
                    <span class="text-sm">Ver Logs</span>
                </flux:button>
                
                @can('admin.system.configure')
                    <flux:button href="{{ route('admin.settings.advanced') }}" variant="outline" class="flex flex-col items-center p-4 h-24">
                        <flux:icon.cog class="size-6 mb-2" />
                        <span class="text-sm">Config. Avanzada</span>
                    </flux:button>
                @endcan
            </div>
        </div>

        <!-- Educational RPG Features -->
        <div class="bg-gradient-to-r from-purple-50 to-blue-50 dark:from-purple-900/20 dark:to-blue-900/20 rounded-lg border border-purple-200 dark:border-purple-800 p-6">
            <h3 class="text-lg font-medium text-purple-900 dark:text-purple-100 mb-4">
                🎮 Características del Sistema Educativo RPG
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-white dark:bg-gray-800 rounded-lg p-4">
                    <div class="flex items-center mb-2">
                        <span class="text-2xl mr-2">🎓</span>
                        <h4 class="font-medium text-gray-900 dark:text-white">Administrador</h4>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Gran Maestro del sistema con control total</p>
                </div>
                
                <div class="bg-white dark:bg-gray-800 rounded-lg p-4">
                    <div class="flex items-center mb-2">
                        <span class="text-2xl mr-2">📚</span>
                        <h4 class="font-medium text-gray-900 dark:text-white">Docente</h4>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Maestro de Gremio que guía aventureros</p>
                </div>
                
                <div class="bg-white dark:bg-gray-800 rounded-lg p-4">
                    <div class="flex items-center mb-2">
                        <span class="text-2xl mr-2">🎒</span>
                        <h4 class="font-medium text-gray-900 dark:text-white">Alumno</h4>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Aventurero que completa misiones educativas</p>
                </div>
                
                <div class="bg-white dark:bg-gray-800 rounded-lg p-4">
                    <div class="flex items-center mb-2">
                        <span class="text-2xl mr-2">🛡️</span>
                        <h4 class="font-medium text-gray-900 dark:text-white">Tutor</h4>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Guardián que supervisa el progreso</p>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
