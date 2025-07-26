<x-layouts.app :title="__('Notificaciones - Estudiante')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Notificaciones</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400">Mantente al día con las últimas novedades</p>
            </div>
            <button class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <flux:icon.check class="size-4 mr-2 inline" />
                Marcar como Leídas
            </button>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg">
                <div class="flex items-center">
                    <flux:icon.bell class="size-8 text-blue-600 dark:text-blue-400" />
                    <div class="ml-3">
                        <p class="text-sm font-medium text-blue-600 dark:text-blue-400">Total</p>
                        <p class="text-2xl font-bold text-blue-900 dark:text-blue-100">15</p>
                    </div>
                </div>
            </div>

            <div class="bg-red-50 dark:bg-red-900/20 p-4 rounded-lg">
                <div class="flex items-center">
                    <flux:icon.exclamation-circle class="size-8 text-red-600 dark:text-red-400" />
                    <div class="ml-3">
                        <p class="text-sm font-medium text-red-600 dark:text-red-400">No Leídas</p>
                        <p class="text-2xl font-bold text-red-900 dark:text-red-100">3</p>
                    </div>
                </div>
            </div>

            <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg">
                <div class="flex items-center">
                    <flux:icon.check-circle class="size-8 text-green-600 dark:text-green-400" />
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-600 dark:text-green-400">Leídas</p>
                        <p class="text-2xl font-bold text-green-900 dark:text-green-100">12</p>
                    </div>
                </div>
            </div>

            <div class="bg-purple-50 dark:bg-purple-900/20 p-4 rounded-lg">
                <div class="flex items-center">
                    <flux:icon.flag class="size-8 text-purple-600 dark:text-purple-400" />
                    <div class="ml-3">
                        <p class="text-sm font-medium text-purple-600 dark:text-purple-400">Importantes</p>
                        <p class="text-2xl font-bold text-purple-900 dark:text-purple-100">5</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Notifications List -->
        <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700">
            <div class="p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Notificaciones Recientes</h2>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Todas
                        </button>
                        <button class="px-3 py-1 text-sm font-medium text-blue-700 bg-blue-100 border border-blue-300 rounded-md hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            No Leídas
                        </button>
                        <button class="px-3 py-1 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Importantes
                        </button>
                    </div>
                </div>

                <div class="space-y-4">
                    <!-- Notification 1 -->
                    <div class="flex items-start space-x-4 p-4 bg-red-50 dark:bg-red-900/20 rounded-lg border border-red-200 dark:border-red-700">
                        <div class="flex-shrink-0">
                            <flux:icon.exclamation-circle class="size-6 text-red-600 dark:text-red-400" />
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between">
                                <h3 class="text-sm font-semibold text-gray-900 dark:text-white">Nueva Misión Disponible</h3>
                                <span class="text-xs text-gray-500 dark:text-gray-400">Hace 2 horas</span>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                Se ha asignado una nueva misión: "Investigación sobre Inteligencia Artificial". Fecha límite: 15/08/2025
                            </p>
                            <div class="flex items-center space-x-2 mt-2">
                                <button class="text-xs text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                                    Ver Detalles
                                </button>
                                <button class="text-xs text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                                    Marcar como Leída
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Notification 2 -->
                    <div class="flex items-start space-x-4 p-4 bg-green-50 dark:bg-green-900/20 rounded-lg border border-green-200 dark:border-green-700">
                        <div class="flex-shrink-0">
                            <flux:icon.check-circle class="size-6 text-green-600 dark:text-green-400" />
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between">
                                <h3 class="text-sm font-semibold text-gray-900 dark:text-white">Tarea Completada</h3>
                                <span class="text-xs text-gray-500 dark:text-gray-400">Hace 1 día</span>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                ¡Felicitaciones! Has completado la tarea "Análisis de Datos" y ganado 75 puntos.
                            </p>
                            <div class="flex items-center space-x-2 mt-2">
                                <button class="text-xs text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                                    Ver Detalles
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Notification 3 -->
                    <div class="flex items-start space-x-4 p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg border border-blue-200 dark:border-blue-700">
                        <div class="flex-shrink-0">
                            <flux:icon.information-circle class="size-6 text-blue-600 dark:text-blue-400" />
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between">
                                <h3 class="text-sm font-semibold text-gray-900 dark:text-white">Evento Próximo</h3>
                                <span class="text-xs text-gray-500 dark:text-gray-400">Hace 2 días</span>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                Recordatorio: Taller de Programación mañana a las 10:00 AM. No olvides traer tu laptop.
                            </p>
                            <div class="flex items-center space-x-2 mt-2">
                                <button class="text-xs text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                                    Ver Detalles
                                </button>
                                <button class="text-xs text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                                    Marcar como Leída
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Notification 4 -->
                    <div class="flex items-start space-x-4 p-4 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600">
                        <div class="flex-shrink-0">
                            <flux:icon.gift class="size-6 text-purple-600 dark:text-purple-400" />
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between">
                                <h3 class="text-sm font-semibold text-gray-900 dark:text-white">Nueva Recompensa Disponible</h3>
                                <span class="text-xs text-gray-500 dark:text-gray-400">Hace 3 días</span>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                Nueva recompensa disponible: "Certificado de Logro" por 100 puntos.
                            </p>
                            <div class="flex items-center space-x-2 mt-2">
                                <button class="text-xs text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                                    Ver Detalles
                                </button>
                                <button class="text-xs text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                                    Marcar como Leída
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
