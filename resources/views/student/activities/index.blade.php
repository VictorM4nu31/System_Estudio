<x-layouts.app :title="__('Actividades - Estudiante')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Actividades</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400">Registro de tus actividades y logros</p>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg">
                <div class="flex items-center">
                    <flux:icon.fire class="size-8 text-blue-600 dark:text-blue-400" />
                    <div class="ml-3">
                        <p class="text-sm font-medium text-blue-600 dark:text-blue-400">Total de Actividades</p>
                        <p class="text-2xl font-bold text-blue-900 dark:text-blue-100">28</p>
                    </div>
                </div>
            </div>

            <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg">
                <div class="flex items-center">
                    <flux:icon.check-circle class="size-8 text-green-600 dark:text-green-400" />
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-600 dark:text-green-400">Completadas</p>
                        <p class="text-2xl font-bold text-green-900 dark:text-green-100">22</p>
                    </div>
                </div>
            </div>

            <div class="bg-yellow-50 dark:bg-yellow-900/20 p-4 rounded-lg">
                <div class="flex items-center">
                    <flux:icon.clock class="size-8 text-yellow-600 dark:text-yellow-400" />
                    <div class="ml-3">
                        <p class="text-sm font-medium text-yellow-600 dark:text-yellow-400">En Progreso</p>
                        <p class="text-2xl font-bold text-yellow-900 dark:text-yellow-100">4</p>
                    </div>
                </div>
            </div>

            <div class="bg-purple-50 dark:bg-purple-900/20 p-4 rounded-lg">
                <div class="flex items-center">
                    <flux:icon.trophy class="size-8 text-purple-600 dark:text-purple-400" />
                    <div class="ml-3">
                        <p class="text-sm font-medium text-purple-600 dark:text-purple-400">Puntos Ganados</p>
                        <p class="text-2xl font-bold text-purple-900 dark:text-purple-100">1,250</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Activities Timeline -->
        <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700">
            <div class="p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Historial de Actividades</h2>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Todas
                        </button>
                        <button class="px-3 py-1 text-sm font-medium text-blue-700 bg-blue-100 border border-blue-300 rounded-md hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Completadas
                        </button>
                        <button class="px-3 py-1 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            En Progreso
                        </button>
                    </div>
                </div>

                <div class="space-y-6">
                    <!-- Activity 1 -->
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <div class="h-8 w-8 bg-green-500 rounded-full flex items-center justify-center">
                                <flux:icon.check class="size-4 text-white" />
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between">
                                <h3 class="text-sm font-semibold text-gray-900 dark:text-white">Misión Completada: Investigación sobre IA</h3>
                                <span class="text-xs text-gray-500 dark:text-gray-400">Hace 2 horas</span>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                Completaste exitosamente la misión de investigación sobre Inteligencia Artificial.
                            </p>
                            <div class="flex items-center space-x-4 mt-2">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300">
                                    +150 puntos
                                </span>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900/50 dark:text-blue-300">
                                    Misión
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Activity 2 -->
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <div class="h-8 w-8 bg-blue-500 rounded-full flex items-center justify-center">
                                <flux:icon.gift class="size-4 text-white" />
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between">
                                <h3 class="text-sm font-semibold text-gray-900 dark:text-white">Recompensa Canjeada: Certificado de Logro</h3>
                                <span class="text-xs text-gray-500 dark:text-gray-400">Hace 1 día</span>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                Canjeaste 100 puntos por un certificado de logro personalizado.
                            </p>
                            <div class="flex items-center space-x-4 mt-2">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900/50 dark:text-red-300">
                                    -100 puntos
                                </span>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800 dark:bg-purple-900/50 dark:text-purple-300">
                                    Recompensa
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Activity 3 -->
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <div class="h-8 w-8 bg-yellow-500 rounded-full flex items-center justify-center">
                                <flux:icon.clock class="size-4 text-white" />
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between">
                                <h3 class="text-sm font-semibold text-gray-900 dark:text-white">Tarea Iniciada: Análisis de Datos</h3>
                                <span class="text-xs text-gray-500 dark:text-gray-400">Hace 2 días</span>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                Comenzaste a trabajar en el análisis del conjunto de datos proporcionado.
                            </p>
                            <div class="flex items-center space-x-4 mt-2">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900/50 dark:text-yellow-300">
                                    En Progreso
                                </span>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-800 dark:bg-orange-900/50 dark:text-orange-300">
                                    Tarea
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Activity 4 -->
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <div class="h-8 w-8 bg-purple-500 rounded-full flex items-center justify-center">
                                <flux:icon.trophy class="size-4 text-white" />
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between">
                                <h3 class="text-sm font-semibold text-gray-900 dark:text-white">Insignia Ganada: Estudiante Destacado</h3>
                                <span class="text-xs text-gray-500 dark:text-gray-400">Hace 3 días</span>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                Obtuviste la insignia "Estudiante Destacado" por alcanzar 1000 puntos totales.
                            </p>
                            <div class="flex items-center space-x-4 mt-2">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300">
                                    +50 puntos
                                </span>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900/50 dark:text-yellow-300">
                                    Insignia
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
