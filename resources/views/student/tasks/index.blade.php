<x-layouts.app :title="__('Tareas - Estudiante')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Mis Tareas</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400">Gestiona tus tareas asignadas y su progreso</p>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg">
                <div class="flex items-center">
                    <flux:icon.clipboard-document-list class="size-8 text-blue-600 dark:text-blue-400" />
                    <div class="ml-3">
                        <p class="text-sm font-medium text-blue-600 dark:text-blue-400">Tareas Pendientes</p>
                        <p class="text-2xl font-bold text-blue-900 dark:text-blue-100">8</p>
                    </div>
                </div>
            </div>

            <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg">
                <div class="flex items-center">
                    <flux:icon.check-circle class="size-8 text-green-600 dark:text-green-400" />
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-600 dark:text-green-400">Completadas</p>
                        <p class="text-2xl font-bold text-green-900 dark:text-green-100">15</p>
                    </div>
                </div>
            </div>

            <div class="bg-yellow-50 dark:bg-yellow-900/20 p-4 rounded-lg">
                <div class="flex items-center">
                    <flux:icon.clock class="size-8 text-yellow-600 dark:text-yellow-400" />
                    <div class="ml-3">
                        <p class="text-sm font-medium text-yellow-600 dark:text-yellow-400">En Progreso</p>
                        <p class="text-2xl font-bold text-yellow-900 dark:text-yellow-100">3</p>
                    </div>
                </div>
            </div>

            <div class="bg-red-50 dark:bg-red-900/20 p-4 rounded-lg">
                <div class="flex items-center">
                    <flux:icon.exclamation-triangle class="size-8 text-red-600 dark:text-red-400" />
                    <div class="ml-3">
                        <p class="text-sm font-medium text-red-600 dark:text-red-400">Vencidas</p>
                        <p class="text-2xl font-bold text-red-900 dark:text-red-100">2</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tasks List -->
        <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700">
            <div class="p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Tareas Asignadas</h2>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Todas
                        </button>
                        <button class="px-3 py-1 text-sm font-medium text-blue-700 bg-blue-100 border border-blue-300 rounded-md hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Pendientes
                        </button>
                        <button class="px-3 py-1 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Completadas
                        </button>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Tarea</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Gremio</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Fecha Límite</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Estado</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            <!-- Task 1 -->
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <div class="h-10 w-10 rounded-full bg-blue-300 dark:bg-blue-600 flex items-center justify-center">
                                                <flux:icon.clipboard-document-list class="size-5 text-blue-700 dark:text-blue-300" />
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                Investigación sobre Inteligencia Artificial
                                            </div>
                                            <div class="text-sm text-gray-500 dark:text-gray-400">
                                                Realiza una investigación sobre las aplicaciones de IA en la educación
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900/50 dark:text-blue-300">
                                        Gremio Tecnológico
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                    15/08/2025
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900/50 dark:text-yellow-300">
                                        En Progreso
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex items-center space-x-2">
                                        <button class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">
                                            <flux:icon.eye class="size-4" />
                                        </button>
                                        <button class="text-green-600 hover:text-green-900 dark:text-green-400 dark:hover:text-green-300">
                                            <flux:icon.check class="size-4" />
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Task 2 -->
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <div class="h-10 w-10 rounded-full bg-green-300 dark:bg-green-600 flex items-center justify-center">
                                                <flux:icon.clipboard-document-list class="size-5 text-green-700 dark:text-green-300" />
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                Presentación sobre Desarrollo Web
                                            </div>
                                            <div class="text-sm text-gray-500 dark:text-gray-400">
                                                Prepara una presentación sobre las mejores prácticas en desarrollo web
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300">
                                        Gremio Digital
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                    20/08/2025
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300">
                                        Completada
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex items-center space-x-2">
                                        <button class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">
                                            <flux:icon.eye class="size-4" />
                                        </button>
                                        <button class="text-gray-400 cursor-not-allowed">
                                            <flux:icon.check class="size-4" />
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Task 3 -->
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <div class="h-10 w-10 rounded-full bg-red-300 dark:bg-red-600 flex items-center justify-center">
                                                <flux:icon.clipboard-document-list class="size-5 text-red-700 dark:text-red-300" />
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                Análisis de Datos
                                            </div>
                                            <div class="text-sm text-gray-500 dark:text-gray-400">
                                                Analiza el conjunto de datos proporcionado y genera un reporte
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800 dark:bg-purple-900/50 dark:text-purple-300">
                                        Gremio Analítico
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-red-600 dark:text-red-400 font-medium">
                                    10/08/2025
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900/50 dark:text-red-300">
                                        Vencida
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex items-center space-x-2">
                                        <button class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">
                                            <flux:icon.eye class="size-4" />
                                        </button>
                                        <button class="text-yellow-600 hover:text-yellow-900 dark:text-yellow-400 dark:hover:text-yellow-300">
                                            <flux:icon.clock class="size-4" />
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
