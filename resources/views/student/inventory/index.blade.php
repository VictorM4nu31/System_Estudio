<x-layouts.app :title="__('Inventario - Estudiante')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Mi Inventario</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400">Gestiona tus objetos y recursos obtenidos</p>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg">
                <div class="flex items-center">
                    <flux:icon.briefcase class="size-8 text-blue-600 dark:text-blue-400" />
                    <div class="ml-3">
                        <p class="text-sm font-medium text-blue-600 dark:text-blue-400">Total de Objetos</p>
                        <p class="text-2xl font-bold text-blue-900 dark:text-blue-100">24</p>
                    </div>
                </div>
            </div>

            <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg">
                <div class="flex items-center">
                    <flux:icon.gift class="size-8 text-green-600 dark:text-green-400" />
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-600 dark:text-green-400">Objetos Únicos</p>
                        <p class="text-2xl font-bold text-green-900 dark:text-green-100">8</p>
                    </div>
                </div>
            </div>

            <div class="bg-purple-50 dark:bg-purple-900/20 p-4 rounded-lg">
                <div class="flex items-center">
                    <flux:icon.trophy class="size-8 text-purple-600 dark:text-purple-400" />
                    <div class="ml-3">
                        <p class="text-sm font-medium text-purple-600 dark:text-purple-400">Raros</p>
                        <p class="text-2xl font-bold text-purple-900 dark:text-purple-100">3</p>
                    </div>
                </div>
            </div>

            <div class="bg-orange-50 dark:bg-orange-900/20 p-4 rounded-lg">
                <div class="flex items-center">
                    <flux:icon.star class="size-8 text-orange-600 dark:text-orange-400" />
                    <div class="ml-3">
                        <p class="text-sm font-medium text-orange-600 dark:text-orange-400">Valor Total</p>
                        <p class="text-2xl font-bold text-orange-900 dark:text-orange-100">2,450</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Inventory Grid -->
        <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700">
            <div class="p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Objetos en Inventario</h2>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Todos
                        </button>
                        <button class="px-3 py-1 text-sm font-medium text-blue-700 bg-blue-100 border border-blue-300 rounded-md hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Únicos
                        </button>
                        <button class="px-3 py-1 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Raros
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <!-- Item 1 -->
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 rounded-lg border border-blue-200 dark:border-blue-700 p-4">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center">
                                <flux:icon.trophy class="size-5 text-blue-600 dark:text-blue-400" />
                                <span class="ml-2 text-xs font-medium text-blue-600 dark:text-blue-400">Común</span>
                            </div>
                            <span class="text-xs text-gray-500 dark:text-gray-400">x3</span>
                        </div>

                        <h3 class="text-sm font-semibold text-gray-900 dark:text-white mb-2">Poción de Energía</h3>
                        <p class="text-xs text-gray-600 dark:text-gray-400 mb-3">
                            Restaura 50 puntos de energía
                        </p>

                        <div class="flex items-center justify-between">
                            <span class="text-xs text-gray-500 dark:text-gray-400">Valor: 25 pts</span>
                            <button class="text-xs text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                                Usar
                            </button>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="bg-gradient-to-br from-green-50 to-green-100 dark:from-green-900/20 dark:to-green-800/20 rounded-lg border border-green-200 dark:border-green-700 p-4">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center">
                                <flux:icon.star class="size-5 text-green-600 dark:text-green-400" />
                                <span class="ml-2 text-xs font-medium text-green-600 dark:text-green-400">Único</span>
                            </div>
                            <span class="text-xs text-gray-500 dark:text-gray-400">x1</span>
                        </div>

                        <h3 class="text-sm font-semibold text-gray-900 dark:text-white mb-2">Llave Mágica</h3>
                        <p class="text-xs text-gray-600 dark:text-gray-400 mb-3">
                            Desbloquea contenido especial
                        </p>

                        <div class="flex items-center justify-between">
                            <span class="text-xs text-gray-500 dark:text-gray-400">Valor: 150 pts</span>
                            <button class="text-xs text-green-600 hover:text-green-800 dark:text-green-400 dark:hover:text-green-300">
                                Usar
                            </button>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="bg-gradient-to-br from-purple-50 to-purple-100 dark:from-purple-900/20 dark:to-purple-800/20 rounded-lg border border-purple-200 dark:border-purple-700 p-4">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center">
                                <flux:icon.sparkles class="size-5 text-purple-600 dark:text-purple-400" />
                                <span class="ml-2 text-xs font-medium text-purple-600 dark:text-purple-400">Raro</span>
                            </div>
                            <span class="text-xs text-gray-500 dark:text-gray-400">x1</span>
                        </div>

                        <h3 class="text-sm font-semibold text-gray-900 dark:text-white mb-2">Cristal de Sabiduría</h3>
                        <p class="text-xs text-gray-600 dark:text-gray-400 mb-3">
                            Aumenta temporalmente la inteligencia
                        </p>

                        <div class="flex items-center justify-between">
                            <span class="text-xs text-gray-500 dark:text-gray-400">Valor: 500 pts</span>
                            <button class="text-xs text-purple-600 hover:text-purple-800 dark:text-purple-400 dark:hover:text-purple-300">
                                Usar
                            </button>
                        </div>
                    </div>

                    <!-- Item 4 -->
                    <div class="bg-gradient-to-br from-orange-50 to-orange-100 dark:from-orange-900/20 dark:to-orange-800/20 rounded-lg border border-orange-200 dark:border-orange-700 p-4">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center">
                                <flux:icon.gift class="size-5 text-orange-600 dark:text-orange-400" />
                                <span class="ml-2 text-xs font-medium text-orange-600 dark:text-orange-400">Especial</span>
                            </div>
                            <span class="text-xs text-gray-500 dark:text-gray-400">x2</span>
                        </div>

                        <h3 class="text-sm font-semibold text-gray-900 dark:text-white mb-2">Caja Sorpresa</h3>
                        <p class="text-xs text-gray-600 dark:text-gray-400 mb-3">
                            Contiene una recompensa aleatoria
                        </p>

                        <div class="flex items-center justify-between">
                            <span class="text-xs text-gray-500 dark:text-gray-400">Valor: 75 pts</span>
                            <button class="text-xs text-orange-600 hover:text-orange-800 dark:text-orange-400 dark:hover:text-orange-300">
                                Abrir
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
