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

        <!-- Configuration Sections -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
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
                        <input type="checkbox" checked class="form-checkbox h-5 w-5 text-blue-600" />
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Notificaciones a tutores</span>
                        <input type="checkbox" checked class="form-checkbox h-5 w-5 text-blue-600" />
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Reportes automáticos</span>
                        <input type="checkbox" checked class="form-checkbox h-5 w-5 text-blue-600" />
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Notificaciones push</span>
                        <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" />
                    </div>
                </div>
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
