<x-layouts.app :title="__('Configuración Avanzada - Admin')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Configuración Avanzada</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400">Configuración técnica avanzada del sistema educativo RPG</p>
            </div>
            <div class="flex items-center space-x-3">
                <flux:button href="{{ route('admin.settings') }}" variant="ghost">
                    <x-heroicon-o-arrow-left class="size-4" />
                    Configuración General
                </flux:button>
            </div>
        </div>

        <!-- Warning Alert -->
        <div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-lg p-4">
            <div class="flex items-center">
                <x-heroicon-o-exclamation-triangle class="size-6 text-yellow-600 dark:text-yellow-400" />
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-yellow-800 dark:text-yellow-200">
                        ⚠️ Advertencia de Configuración Avanzada
                    </h3>
                    <p class="text-sm text-yellow-700 dark:text-yellow-300 mt-1">
                        Los cambios en esta sección pueden afectar el funcionamiento del sistema.
                        Solo modifica estos valores si entiendes completamente su impacto.
                    </p>
                </div>
            </div>
        </div>

        <!-- Advanced Configuration Forms -->
        <div class="space-y-6">
            <!-- RPG System Advanced Settings -->
            <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                        ⚔️ Configuración Avanzada del Sistema RPG
                    </h3>
                </div>

                <form class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <!-- Experience Settings -->
                        <div class="space-y-4">
                            <h4 class="font-medium text-gray-900 dark:text-white">🎯 Sistema de Experiencia</h4>

                            <div>
                                <flux:label for="base_exp" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Experiencia Base por Misión
                                </flux:label>
                                <flux:input
                                    id="base_exp"
                                    type="number"
                                    value="100"
                                    class="mt-1 block w-full"
                                />
                            </div>

                            <div>
                                <flux:label for="exp_multiplier" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Multiplicador de Experiencia
                                </flux:label>
                                <flux:input
                                    id="exp_multiplier"
                                    type="number"
                                    step="0.1"
                                    value="1.0"
                                    class="mt-1 block w-full"
                                />
                            </div>

                            <div>
                                <flux:label for="max_level" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Nivel Máximo
                                </flux:label>
                                <flux:input
                                    id="max_level"
                                    type="number"
                                    value="100"
                                    class="mt-1 block w-full"
                                />
                            </div>
                        </div>

                        <!-- Currency Settings -->
                        <div class="space-y-4">
                            <h4 class="font-medium text-gray-900 dark:text-white">💰 Sistema de Monedas</h4>

                            <div>
                                <flux:label for="base_coins" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Monedas Base por Misión
                                </flux:label>
                                <flux:input
                                    id="base_coins"
                                    type="number"
                                    value="50"
                                    class="mt-1 block w-full"
                                />
                            </div>

                            <div>
                                <flux:label for="daily_bonus" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Bonus Diario
                                </flux:label>
                                <flux:input
                                    id="daily_bonus"
                                    type="number"
                                    value="10"
                                    class="mt-1 block w-full"
                                />
                            </div>

                            <div>
                                <flux:label for="currency_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Nombre de Moneda
                                </flux:label>
                                <flux:input
                                    id="currency_name"
                                    type="text"
                                    value="Monedas Mágicas"
                                    class="mt-1 block w-full"
                                />
                            </div>
                        </div>

                        <!-- Mission Settings -->
                        <div class="space-y-4">
                            <h4 class="font-medium text-gray-900 dark:text-white">📜 Sistema de Misiones</h4>

                            <div>
                                <flux:label for="max_missions" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Misiones Simultáneas
                                </flux:label>
                                <flux:input
                                    id="max_missions"
                                    type="number"
                                    value="5"
                                    class="mt-1 block w-full"
                                />
                            </div>

                            <div>
                                <flux:label for="mission_timeout" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Timeout de Misión (horas)
                                </flux:label>
                                <flux:input
                                    id="mission_timeout"
                                    type="number"
                                    value="72"
                                    class="mt-1 block w-full"
                                />
                            </div>

                            <div>
                                <flux:label for="auto_assign" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Auto-asignación de Misiones
                                </flux:label>
                                <input type="checkbox" id="auto_assign" name="auto_assign" class="form-checkbox h-5 w-5 text-blue-600" />
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <flux:button type="submit" variant="primary">
                            <x-heroicon-o-check class="size-4" />
                            Guardar Configuración RPG
                        </flux:button>
                        <flux:button type="button" variant="outline">
                            <x-heroicon-o-arrow-path class="size-4" />
                            Restaurar Valores por Defecto
                        </flux:button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
