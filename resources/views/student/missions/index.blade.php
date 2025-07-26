<x-layouts.app :title="__('Misiones - Estudiante')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Misiones</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400">Completa misiones para ganar puntos y recompensas</p>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg">
                <div class="flex items-center">
                    <flux:icon.flag class="size-8 text-blue-600 dark:text-blue-400" />
                    <div class="ml-3">
                        <p class="text-sm font-medium text-blue-600 dark:text-blue-400">Misiones Activas</p>
                        <p class="text-2xl font-bold text-blue-900 dark:text-blue-100">5</p>
                    </div>
                </div>
            </div>

            <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg">
                <div class="flex items-center">
                    <flux:icon.check-circle class="size-8 text-green-600 dark:text-green-400" />
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-600 dark:text-green-400">Completadas</p>
                        <p class="text-2xl font-bold text-green-900 dark:text-green-100">12</p>
                    </div>
                </div>
            </div>

            <div class="bg-purple-50 dark:bg-purple-900/20 p-4 rounded-lg">
                <div class="flex items-center">
                    <flux:icon.trophy class="size-8 text-purple-600 dark:text-purple-400" />
                    <div class="ml-3">
                        <p class="text-sm font-medium text-purple-600 dark:text-purple-400">Puntos Ganados</p>
                        <p class="text-2xl font-bold text-purple-900 dark:text-purple-100">850</p>
                    </div>
                </div>
            </div>

            <div class="bg-orange-50 dark:bg-orange-900/20 p-4 rounded-lg">
                <div class="flex items-center">
                    <flux:icon.clock class="size-8 text-orange-600 dark:text-orange-400" />
                    <div class="ml-3">
                        <p class="text-sm font-medium text-orange-600 dark:text-orange-400">En Progreso</p>
                        <p class="text-2xl font-bold text-orange-900 dark:text-orange-100">3</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Missions List -->
        <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700">
            <div class="p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Misiones Disponibles</h2>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Todas
                        </button>
                        <button class="px-3 py-1 text-sm font-medium text-blue-700 bg-blue-100 border border-blue-300 rounded-md hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Activas
                        </button>
                        <button class="px-3 py-1 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Completadas
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Mission Card 1 -->
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 rounded-lg border border-blue-200 dark:border-blue-700 p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <flux:icon.flag class="size-6 text-blue-600 dark:text-blue-400" />
                                <span class="ml-2 text-sm font-medium text-blue-600 dark:text-blue-400">Misión Principal</span>
                            </div>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300">
                                Activa
                            </span>
                        </div>

                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Investigación Avanzada</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                            Realiza una investigación profunda sobre un tema de tu elección y presenta tus hallazgos.
                        </p>

                        <div class="space-y-2 mb-4">
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500 dark:text-gray-400">Dificultad:</span>
                                <span class="font-medium text-gray-900 dark:text-white">Media</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500 dark:text-gray-400">Puntos:</span>
                                <span class="font-medium text-gray-900 dark:text-white">150 pts</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500 dark:text-gray-400">Fecha límite:</span>
                                <span class="font-medium text-gray-900 dark:text-white">15/08/2025</span>
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                <flux:icon.users class="size-4 mr-1" />
                                <span>Equipo de 3-4</span>
                            </div>
                            <button class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Ver Detalles
                            </button>
                        </div>
                    </div>

                    <!-- Mission Card 2 -->
                    <div class="bg-gradient-to-br from-green-50 to-green-100 dark:from-green-900/20 dark:to-green-800/20 rounded-lg border border-green-200 dark:border-green-700 p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <flux:icon.flag class="size-6 text-green-600 dark:text-green-400" />
                                <span class="ml-2 text-sm font-medium text-green-600 dark:text-green-400">Misión Secundaria</span>
                            </div>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900/50 dark:text-yellow-300">
                                En Progreso
                            </span>
                        </div>

                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Taller de Programación</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                            Participa en el taller de programación y completa los ejercicios asignados.
                        </p>

                        <div class="space-y-2 mb-4">
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500 dark:text-gray-400">Dificultad:</span>
                                <span class="font-medium text-gray-900 dark:text-white">Fácil</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500 dark:text-gray-400">Puntos:</span>
                                <span class="font-medium text-gray-900 dark:text-white">75 pts</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500 dark:text-gray-400">Progreso:</span>
                                <span class="font-medium text-gray-900 dark:text-white">60%</span>
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                <flux:icon.user class="size-4 mr-1" />
                                <span>Individual</span>
                            </div>
                            <button class="px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                                Continuar
                            </button>
                        </div>
                    </div>

                    <!-- Mission Card 3 -->
                    <div class="bg-gradient-to-br from-purple-50 to-purple-100 dark:from-purple-900/20 dark:to-purple-800/20 rounded-lg border border-purple-200 dark:border-purple-700 p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <flux:icon.flag class="size-6 text-purple-600 dark:text-purple-400" />
                                <span class="ml-2 text-sm font-medium text-purple-600 dark:text-purple-400">Misión Especial</span>
                            </div>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-900/50 dark:text-gray-300">
                                Disponible
                            </span>
                        </div>

                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Competencia de Diseño</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                            Participa en la competencia de diseño y crea una propuesta innovadora.
                        </p>

                        <div class="space-y-2 mb-4">
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500 dark:text-gray-400">Dificultad:</span>
                                <span class="font-medium text-gray-900 dark:text-white">Alta</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500 dark:text-gray-400">Puntos:</span>
                                <span class="font-medium text-gray-900 dark:text-white">200 pts</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500 dark:text-gray-400">Fecha límite:</span>
                                <span class="font-medium text-gray-900 dark:text-white">20/08/2025</span>
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                <flux:icon.users class="size-4 mr-1" />
                                <span>Equipo de 2-3</span>
                            </div>
                            <button class="px-4 py-2 text-sm font-medium text-white bg-purple-600 border border-transparent rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                Participar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
