<x-layouts.app :title="__('Agregar Item - Estudiante')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Agregar Item al Inventario</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400">Añade un nuevo item a tu inventario</p>
            </div>
            <a href="{{ route('student.inventory.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <flux:icon.arrow-left class="size-4 mr-2" />
                Volver
            </a>
        </div>

        <!-- Form -->
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <form action="{{ route('student.inventory.store') }}" method="POST">
                @csrf
                
                <div class="space-y-6">
                    <div>
                        <label for="item" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Nombre del Item <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               id="item" 
                               name="item" 
                               value="{{ old('item') }}"
                               placeholder="Ej: Espada de Fuego, Poción de Vida, etc."
                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" 
                               required>
                        @error('item')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="quantity" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Cantidad <span class="text-red-500">*</span>
                        </label>
                        <input type="number" 
                               id="quantity" 
                               name="quantity" 
                               value="{{ old('quantity', 1) }}"
                               min="1" 
                               max="999"
                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" 
                               required>
                        @error('quantity')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Descripción
                        </label>
                        <textarea id="description" 
                                  name="description" 
                                  rows="3"
                                  placeholder="Describe las características del item..."
                                  class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="rarity" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Rareza
                            </label>
                            <select id="rarity" 
                                    name="rarity" 
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                <option value="">Seleccionar rareza</option>
                                <option value="comun" {{ old('rarity') == 'comun' ? 'selected' : '' }}>Común</option>
                                <option value="poco_comun" {{ old('rarity') == 'poco_comun' ? 'selected' : '' }}>Poco Común</option>
                                <option value="raro" {{ old('rarity') == 'raro' ? 'selected' : '' }}>Raro</option>
                                <option value="epico" {{ old('rarity') == 'epico' ? 'selected' : '' }}>Épico</option>
                                <option value="legendario" {{ old('rarity') == 'legendario' ? 'selected' : '' }}>Legendario</option>
                            </select>
                            @error('rarity')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Categoría
                            </label>
                            <select id="category" 
                                    name="category" 
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                <option value="">Seleccionar categoría</option>
                                <option value="armas" {{ old('category') == 'armas' ? 'selected' : '' }}>Armas</option>
                                <option value="armaduras" {{ old('category') == 'armaduras' ? 'selected' : '' }}>Armaduras</option>
                                <option value="pociones" {{ old('category') == 'pociones' ? 'selected' : '' }}>Pociones</option>
                                <option value="materiales" {{ old('category') == 'materiales' ? 'selected' : '' }}>Materiales</option>
                                <option value="consumibles" {{ old('category') == 'consumibles' ? 'selected' : '' }}>Consumibles</option>
                                <option value="especiales" {{ old('category') == 'especiales' ? 'selected' : '' }}>Especiales</option>
                            </select>
                            @error('category')
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
                               value="{{ old('image_url') }}"
                               placeholder="https://ejemplo.com/imagen.png"
                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        @error('image_url')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="flex items-center">
                            <input type="checkbox" 
                                   name="is_equipped" 
                                   value="1"
                                   {{ old('is_equipped') ? 'checked' : '' }}
                                   class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">Item equipado</span>
                        </label>
                        @error('is_equipped')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Botones de Acción -->
                <div class="flex justify-end space-x-3 mt-6">
                    <a href="{{ route('student.inventory.index') }}" 
                       class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Cancelar
                    </a>
                    <button type="submit" 
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Agregar Item
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app> 