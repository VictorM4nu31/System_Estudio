<x-settings.layout :heading="__('Perfil Académico')" :subheading="__('Actualiza tu información académica y código de gremio')">
    <form wire:submit="updateProfile">
        <div class="space-y-6">
            <!-- Información Académica -->
            <div>
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Información Académica</h3>

                <div class="space-y-4">
                    <div>
                        <label for="matricula" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Matrícula
                        </label>
                        <input type="text"
                               id="matricula"
                               wire:model="matricula"
                               placeholder="Ej: 2025001"
                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        @error('matricula')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="numero_lista" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Número de Lista
                        </label>
                        <input type="number"
                               id="numero_lista"
                               wire:model="numero_lista"
                               min="1"
                               placeholder="Ej: 15"
                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        @error('numero_lista')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Información de Solo Lectura -->
                    <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg">
                        <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Información del Sistema</h4>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">
                                    Nivel Actual
                                </label>
                                <div class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">
                                    {{ $level ?: '1' }}
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">
                                    Puntos Acumulados
                                </label>
                                <div class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">
                                    {{ $points ?: '0' }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Código de Gremio -->
            <div>
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Código de Gremio</h3>

                <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg mb-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <flux:icon.information-circle class="size-5 text-blue-400" />
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-blue-800 dark:text-blue-200">
                                ¿Cómo obtener mi código de gremio?
                            </h3>
                            <div class="mt-2 text-sm text-blue-700 dark:text-blue-300">
                                <p>Pregunta a tu docente por el código de tu gremio. Este código te permitirá unirte automáticamente al gremio correspondiente.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="guild_code" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Código del Gremio
                    </label>
                    <input type="text"
                           id="guild_code"
                           wire:model="guild_code"
                           placeholder="Ej: GRUPO2025"
                           class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    @error('guild_code')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Correo del Tutor -->
            <div>
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Información del Tutor</h3>

                <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg mb-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <flux:icon.information-circle class="size-5 text-green-400" />
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-green-800 dark:text-green-200">
                                ¿Por qué necesito el correo de mi tutor?
                            </h3>
                            <div class="mt-2 text-sm text-green-700 dark:text-green-300">
                                <p>Tu tutor podrá ver tu progreso académico y recibir notificaciones sobre tu desempeño. Esta información es opcional pero recomendada.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="tutor_email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Correo Electrónico del Tutor
                    </label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <input type="email"
                               id="tutor_email"
                               wire:model="tutor_email"
                               placeholder="Ej: tutor@ejemplo.com"
                               class="flex-1 rounded-l-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        <button type="button"
                                wire:click="sendTutorInvitation"
                                class="inline-flex items-center px-4 py-2 border border-l-0 border-gray-300 dark:border-gray-600 rounded-r-md bg-gray-50 dark:bg-gray-700 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <flux:icon.paper-airplane class="size-4 mr-2" />
                            Enviar Invitación
                        </button>
                    </div>
                    @error('tutor_email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                @if($tutor_invitation_sent)
                <div class="mt-3 bg-green-50 dark:bg-green-900/20 p-3 rounded-lg">
                    <div class="flex items-center">
                        <flux:icon.check-circle class="size-5 text-green-400" />
                        <div class="ml-2 text-sm text-green-700 dark:text-green-300">
                            Invitación enviada al tutor. Esperando confirmación.
                        </div>
                    </div>
                </div>
                @endif
            </div>

            <!-- Estadísticas -->
            @if(auth()->user()->student)
            <div>
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Estadísticas</h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg">
                        <div class="flex items-center">
                            <flux:icon.flag class="size-6 text-blue-600 dark:text-blue-400" />
                            <div class="ml-3">
                                <p class="text-sm font-medium text-blue-600 dark:text-blue-400">Misiones Completadas</p>
                                <p class="text-xl font-bold text-blue-900 dark:text-blue-100">12</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg">
                        <div class="flex items-center">
                            <flux:icon.trophy class="size-6 text-green-600 dark:text-green-400" />
                            <div class="ml-3">
                                <p class="text-sm font-medium text-green-600 dark:text-green-400">Insignias Ganadas</p>
                                <p class="text-xl font-bold text-green-900 dark:text-green-100">8</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-purple-50 dark:bg-purple-900/20 p-4 rounded-lg">
                        <div class="flex items-center">
                            <flux:icon.gift class="size-6 text-purple-600 dark:text-purple-400" />
                            <div class="ml-3">
                                <p class="text-sm font-medium text-purple-600 dark:text-purple-400">Recompensas</p>
                                <p class="text-xl font-bold text-purple-900 dark:text-purple-100">15</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- Botones de Acción -->
            <div class="flex justify-end space-x-3">
                <button type="button"
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Cancelar
                </button>
                <button type="submit"
                        class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Guardar Cambios
                </button>
            </div>
        </div>
    </form>
</x-settings.layout>
