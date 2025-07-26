<x-layouts.app :title="__('Insignias - Estudiante')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Mis Insignias</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400">Colecciona insignias por tus logros académicos</p>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg">
                <div class="flex items-center">
                    <flux:icon.trophy class="size-8 text-blue-600 dark:text-blue-400" />
                    <div class="ml-3">
                        <p class="text-sm font-medium text-blue-600 dark:text-blue-400">Total de Insignias</p>
                        <p class="text-2xl font-bold text-blue-900 dark:text-blue-100">12</p>
                    </div>
                </div>
            </div>

            <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg">
                <div class="flex items-center">
                    <flux:icon.star class="size-8 text-green-600 dark:text-green-400" />
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-600 dark:text-green-400">Raras</p>
                        <p class="text-2xl font-bold text-green-900 dark:text-green-100">3</p>
                    </div>
                </div>
            </div>

            <div class="bg-purple-50 dark:bg-purple-900/20 p-4 rounded-lg">
                <div class="flex items-center">
                    <flux:icon.sparkles class="size-8 text-purple-600 dark:text-purple-400" />
                    <div class="ml-3">
                        <p class="text-sm font-medium text-purple-600 dark:text-purple-400">Épicas</p>
                        <p class="text-2xl font-bold text-purple-900 dark:text-purple-100">1</p>
                    </div>
                </div>
            </div>

            <div class="bg-orange-50 dark:bg-orange-900/20 p-4 rounded-lg">
                <div class="flex items-center">
                    <flux:icon.fire class="size-8 text-orange-600 dark:text-orange-400" />
                    <div class="ml-3">
                        <p class="text-sm font-medium text-orange-600 dark:text-orange-400">Logros</p>
                        <p class="text-2xl font-bold text-orange-900 dark:text-orange-100">8</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Badges Grid -->
        <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700">
            <div class="p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Colección de Insignias</h2>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Todas
                        </button>
                        <button class="px-3 py-1 text-sm font-medium text-blue-700 bg-blue-100 border border-blue-300 rounded-md hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Ganadas
                        </button>
                        <button class="px-3 py-1 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Disponibles
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Badge 1 -->
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 rounded-lg border border-blue-200 dark:border-blue-700 p-6 text-center">
                        <div class="flex justify-center mb-4">
                            <div class="h-16 w-16 bg-blue-500 rounded-full flex items-center justify-center">
                                <flux:icon.trophy class="size-8 text-white" />
                            </div>
                        </div>

                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Primera Misión</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                            Completa tu primera misión
                        </p>

                        <div class="flex items-center justify-center">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300">
                                Ganada
                            </span>
                        </div>
                    </div>

                    <!-- Badge 2 -->
                    <div class="bg-gradient-to-br from-green-50 to-green-100 dark:from-green-900/20 dark:to-green-800/20 rounded-lg border border-green-200 dark:border-green-700 p-6 text-center">
                        <div class="flex justify-center mb-4">
                            <div class="h-16 w-16 bg-green-500 rounded-full flex items-center justify-center">
                                <flux:icon.star class="size-8 text-white" />
                            </div>
                        </div>

                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Estudiante Destacado</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                            Obtén 1000 puntos totales
                        </p>

                        <div class="flex items-center justify-center">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300">
                                Ganada
                            </span>
                        </div>
                    </div>

                    <!-- Badge 3 -->
                    <div class="bg-gradient-to-br from-purple-50 to-purple-100 dark:from-purple-900/20 dark:to-purple-800/20 rounded-lg border border-purple-200 dark:border-purple-700 p-6 text-center">
                        <div class="flex justify-center mb-4">
                            <div class="h-16 w-16 bg-purple-500 rounded-full flex items-center justify-center">
                                <flux:icon.sparkles class="size-8 text-white" />
                            </div>
                        </div>

                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Investigador</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                            Completa 5 misiones de investigación
                        </p>

                        <div class="flex items-center justify-center">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900/50 dark:text-yellow-300">
                                En Progreso
                            </span>
                        </div>
                    </div>

                    <!-- Badge 4 -->
                    <div class="bg-gradient-to-br from-orange-50 to-orange-100 dark:from-orange-900/20 dark:to-orange-800/20 rounded-lg border border-orange-200 dark:border-orange-700 p-6 text-center">
                        <div class="flex justify-center mb-4">
                            <div class="h-16 w-16 bg-orange-500 rounded-full flex items-center justify-center">
                                <flux:icon.fire class="size-8 text-white" />
                            </div>
                        </div>

                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Líder de Equipo</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                            Lidera 3 proyectos exitosos
                        </p>

                        <div class="flex items-center justify-center">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-900/50 dark:text-gray-300">
                                Bloqueada
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
