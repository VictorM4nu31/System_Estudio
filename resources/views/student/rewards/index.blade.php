<x-layouts.app :title="__('Recompensas - Estudiante')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Recompensas</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400">Canjea tus puntos por recompensas especiales</p>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg">
                <div class="flex items-center">
                    <flux:icon.trophy class="size-8 text-blue-600 dark:text-blue-400" />
                    <div class="ml-3">
                        <p class="text-sm font-medium text-blue-600 dark:text-blue-400">Puntos Disponibles</p>
                        <p class="text-2xl font-bold text-blue-900 dark:text-blue-100">1,250</p>
                    </div>
                </div>
            </div>

            <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg">
                <div class="flex items-center">
                    <flux:icon.gift class="size-8 text-green-600 dark:text-green-400" />
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-600 dark:text-green-400">Recompensas Ganadas</p>
                        <p class="text-2xl font-bold text-green-900 dark:text-green-100">8</p>
                    </div>
                </div>
            </div>

            <div class="bg-purple-50 dark:bg-purple-900/20 p-4 rounded-lg">
                <div class="flex items-center">
                    <flux:icon.shopping-cart class="size-8 text-purple-600 dark:text-purple-400" />
                    <div class="ml-3">
                        <p class="text-sm font-medium text-purple-600 dark:text-purple-400">Disponibles</p>
                        <p class="text-2xl font-bold text-purple-900 dark:text-purple-100">12</p>
                    </div>
                </div>
            </div>

            <div class="bg-orange-50 dark:bg-orange-900/20 p-4 rounded-lg">
                <div class="flex items-center">
                    <flux:icon.star class="size-8 text-orange-600 dark:text-orange-400" />
                    <div class="ml-3">
                        <p class="text-sm font-medium text-orange-600 dark:text-orange-400">Nivel Actual</p>
                        <p class="text-2xl font-bold text-orange-900 dark:text-orange-100">5</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Rewards Grid -->
        <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700">
            <div class="p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Recompensas Disponibles</h2>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Todas
                        </button>
                        <button class="px-3 py-1 text-sm font-medium text-blue-700 bg-blue-100 border border-blue-300 rounded-md hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Disponibles
                        </button>
                        <button class="px-3 py-1 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Canjeadas
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Reward Card 1 -->
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 rounded-lg border border-blue-200 dark:border-blue-700 p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <flux:icon.gift class="size-6 text-blue-600 dark:text-blue-400" />
                                <span class="ml-2 text-sm font-medium text-blue-600 dark:text-blue-400">Recompensa Premium</span>
                            </div>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300">
                                Disponible
                            </span>
                        </div>

                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Puntos Extra en Examen</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                            Obtén 10 puntos extra en tu próximo examen final.
                        </p>

                        <div class="space-y-2 mb-4">
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500 dark:text-gray-400">Costo:</span>
                                <span class="font-medium text-gray-900 dark:text-white">500 pts</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500 dark:text-gray-400">Disponible hasta:</span>
                                <span class="font-medium text-gray-900 dark:text-white">30/08/2025</span>
                            </div>
                        </div>

                        <button class="w-full px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Canjear
                        </button>
                    </div>

                    <!-- Reward Card 2 -->
                    <div class="bg-gradient-to-br from-green-50 to-green-100 dark:from-green-900/20 dark:to-green-800/20 rounded-lg border border-green-200 dark:border-green-700 p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <flux:icon.gift class="size-6 text-green-600 dark:text-green-400" />
                                <span class="ml-2 text-sm font-medium text-green-600 dark:text-green-400">Recompensa Especial</span>
                            </div>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900/50 dark:text-yellow-300">
                                Limitada
                            </span>
                        </div>

                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Mentoría Personalizada</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                            Sesión de mentoría de 1 hora con un profesor especializado.
                        </p>

                        <div class="space-y-2 mb-4">
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500 dark:text-gray-400">Costo:</span>
                                <span class="font-medium text-gray-900 dark:text-white">300 pts</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500 dark:text-gray-400">Stock:</span>
                                <span class="font-medium text-gray-900 dark:text-white">3 disponibles</span>
                            </div>
                        </div>

                        <button class="w-full px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                            Canjear
                        </button>
                    </div>

                    <!-- Reward Card 3 -->
                    <div class="bg-gradient-to-br from-purple-50 to-purple-100 dark:from-purple-900/20 dark:to-purple-800/20 rounded-lg border border-purple-200 dark:border-purple-700 p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <flux:icon.gift class="size-6 text-purple-600 dark:text-purple-400" />
                                <span class="ml-2 text-sm font-medium text-purple-600 dark:text-purple-400">Recompensa Básica</span>
                            </div>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-900/50 dark:text-gray-300">
                                Ilimitada
                            </span>
                        </div>

                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Certificado de Logro</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                            Certificado personalizado por completar 10 misiones.
                        </p>

                        <div class="space-y-2 mb-4">
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500 dark:text-gray-400">Costo:</span>
                                <span class="font-medium text-gray-900 dark:text-white">100 pts</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500 dark:text-gray-400">Tipo:</span>
                                <span class="font-medium text-gray-900 dark:text-white">Digital</span>
                            </div>
                        </div>

                        <button class="w-full px-4 py-2 text-sm font-medium text-white bg-purple-600 border border-transparent rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500">
                            Canjear
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
