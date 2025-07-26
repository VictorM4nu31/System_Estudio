<x-layouts.app :title="__('Editar Insignia - Estudiante')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Editar Insignia</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400">Modifica la información de la insignia</p>
            </div>
            <a href="{{ route('student.badges.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <flux:icon.arrow-left class="size-4 mr-2" />
                Volver
            </a>
        </div>

        <!-- Form -->
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <form action="{{ route('student.badges.update', $badge) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Nombre de la Insignia <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               value="{{ old('name', $badge->name) }}"
                               placeholder="Ej: Maestro de las Misiones, Experto en Tareas, etc."
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
                                  placeholder="Describe los logros necesarios para obtener esta insignia..."
                                  class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" 
                                  required>{{ old('description', $badge->description) }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Tipo de Insignia <span class="text-red-500">*</span>
                            </label>
                            <select id="type" 
                                    name="type" 
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" 
                                    required>
                                <option value="">Seleccionar tipo</option>
                                <option value="misiones" {{ old('type', $badge->type) == 'misiones' ? 'selected' : '' }}>Misiones</option>
                                <option value="tareas" {{ old('type', $badge->type) == 'tareas' ? 'selected' : '' }}>Tareas</option>
                                <option value="gremios" {{ old('type', $badge->type) == 'gremios' ? 'selected' : '' }}>Gremios</option>
                                <option value="recompensas" {{ old('type', $badge->type) == 'recompensas' ? 'selected' : '' }}>Recompensas</option>
                                <option value="actividades" {{ old('type', $badge->type) == 'actividades' ? 'selected' : '' }}>Actividades</option>
                                <option value="especial" {{ old('type', $badge->type) == 'especial' ? 'selected' : '' }}>Especial</option>
                            </select>
                            @error('type')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="rarity" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Rareza <span class="text-red-500">*</span>
                            </label>
                            <select id="rarity" 
                                    name="rarity" 
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" 
                                    required>
                                <option value="">Seleccionar rareza</option>
                                <option value="comun" {{ old('rarity', $badge->rarity) == 'comun' ? 'selected' : '' }}>Común</option>
                                <option value="poco_comun" {{ old('rarity', $badge->rarity) == 'poco_comun' ? 'selected' : '' }}>Poco Común</option>
                                <option value="raro" {{ old('rarity', $badge->rarity) == 'raro' ? 'selected' : '' }}>Raro</option>
                                <option value="epico" {{ old('rarity', $badge->rarity) == 'epico' ? 'selected' : '' }}>Épico</option>
                                <option value="legendario" {{ old('rarity', $badge->rarity) == 'legendario' ? 'selected' : '' }}>Legendario</option>
                            </select>
                            @error('rarity')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="required_level" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Nivel Requerido
                            </label>
                            <input type="number" 
                                   id="required_level" 
                                   name="required_level" 
                                   value="{{ old('required_level', $badge->required_level ?? 1) }}"
                                   min="1" 
                                   max="100"
                                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                            @error('required_level')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="points_reward" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Puntos de Recompensa
                            </label>
                            <input type="number" 
                                   id="points_reward" 
                                   name="points_reward" 
                                   value="{{ old('points_reward', $badge->points_reward ?? 100) }}"
                                   min="10" 
                                   max="1000"
                                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                            @error('points_reward')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="criteria" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Criterios para Obtener
                        </label>
                        <textarea id="criteria" 
                                  name="criteria" 
                                  rows="3"
                                  placeholder="Describe los criterios específicos para obtener esta insignia..."
                                  class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">{{ old('criteria', $badge->criteria) }}</textarea>
                        @error('criteria')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="image_url" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            URL de la Imagen
                        </label>
                        <input type="url" 
                               id="image_url" 
                               name="image_url" 
                               value="{{ old('image_url', $badge->image_url) }}"
                               placeholder="https://ejemplo.com/insignia.png"
                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        @error('image_url')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="flex items-center">
                            <input type="checkbox" 
                                   name="unlocked" 
                                   value="1"
                                   {{ old('unlocked', $badge->unlocked) ? 'checked' : '' }}
                                   class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">Insignia desbloqueada</span>
                        </label>
                        @error('unlocked')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Botones de Acción -->
                <div class="flex justify-end space-x-3 mt-6">
                    <a href="{{ route('student.badges.index') }}" 
                       class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Cancelar
                    </a>
                    <button type="submit" 
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Actualizar Insignia
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app> 