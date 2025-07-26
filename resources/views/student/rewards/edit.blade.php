<x-layouts.app :title="__('Editar Recompensa - Estudiante')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Editar Recompensa</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400">Modifica la información de la recompensa</p>
            </div>
            <a href="{{ route('student.rewards.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <flux:icon.arrow-left class="size-4 mr-2" />
                Volver
            </a>
        </div>

        <!-- Form -->
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <form action="{{ route('student.rewards.update', $reward) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Nombre de la Recompensa <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               value="{{ old('name', $reward->name) }}"
                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" 
                               required>
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Descripción <span class="text-red-500">*</span>
                        </label>
                        <textarea id="description" 
                                  name="description" 
                                  rows="4"
                                  class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" 
                                  required>{{ old('description', $reward->description) }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Tipo de Recompensa <span class="text-red-500">*</span>
                            </label>
                            <select id="type" 
                                    name="type" 
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" 
                                    required>
                                <option value="">Seleccionar tipo</option>
                                <option value="puntos" {{ old('type', $reward->type) == 'puntos' ? 'selected' : '' }}>Puntos</option>
                                <option value="insignia" {{ old('type', $reward->type) == 'insignia' ? 'selected' : '' }}>Insignia</option>
                                <option value="nivel" {{ old('type', $reward->type) == 'nivel' ? 'selected' : '' }}>Nivel</option>
                                <option value="item" {{ old('type', $reward->type) == 'item' ? 'selected' : '' }}>Item</option>
                                <option value="privilegio" {{ old('type', $reward->type) == 'privilegio' ? 'selected' : '' }}>Privilegio</option>
                            </select>
                            @error('type')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="value" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Valor <span class="text-red-500">*</span>
                            </label>
                            <input type="number" 
                                   id="value" 
                                   name="value" 
                                   value="{{ old('value', $reward->value) }}"
                                   min="1" 
                                   max="10000"
                                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" 
                                   required>
                            @error('value')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="rarity" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Rareza <span class="text-red-500">*</span>
                            </label>
                            <select id="rarity" 
                                    name="rarity" 
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" 
                                    required>
                                <option value="">Seleccionar rareza</option>
                                <option value="comun" {{ old('rarity', $reward->rarity) == 'comun' ? 'selected' : '' }}>Común</option>
                                <option value="poco_comun" {{ old('rarity', $reward->rarity) == 'poco_comun' ? 'selected' : '' }}>Poco Común</option>
                                <option value="raro" {{ old('rarity', $reward->rarity) == 'raro' ? 'selected' : '' }}>Raro</option>
                                <option value="epico" {{ old('rarity', $reward->rarity) == 'epico' ? 'selected' : '' }}>Épico</option>
                                <option value="legendario" {{ old('rarity', $reward->rarity) == 'legendario' ? 'selected' : '' }}>Legendario</option>
                            </select>
                            @error('rarity')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="required_level" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Nivel Requerido
                            </label>
                            <input type="number" 
                                   id="required_level" 
                                   name="required_level" 
                                   value="{{ old('required_level', $reward->required_level ?? 1) }}"
                                   min="1" 
                                   max="100"
                                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                            @error('required_level')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="image_url" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            URL de la Imagen
                        </label>
                        <input type="url" 
                               id="image_url" 
                               name="image_url" 
                               value="{{ old('image_url', $reward->image_url) }}"
                               placeholder="https://ejemplo.com/imagen.png"
                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        @error('image_url')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="conditions" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Condiciones para Obtener
                        </label>
                        <textarea id="conditions" 
                                  name="conditions" 
                                  rows="3"
                                  placeholder="Describe las condiciones necesarias para obtener esta recompensa..."
                                  class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">{{ old('conditions', $reward->conditions) }}</textarea>
                        @error('conditions')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="flex items-center">
                            <input type="checkbox" 
                                   name="is_active" 
                                   value="1"
                                   {{ old('is_active', $reward->is_active) ? 'checked' : '' }}
                                   class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">Recompensa activa</span>
                        </label>
                        @error('is_active')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Botones de Acción -->
                <div class="flex justify-end space-x-3 mt-6">
                    <a href="{{ route('student.rewards.index') }}" 
                       class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Cancelar
                    </a>
                    <button type="submit" 
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Actualizar Recompensa
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app> 