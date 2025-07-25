<x-layouts.app :title="__('Editar Evento - Docente')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Editar Evento</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400">Modifica la información del evento "{{ $event->name }}"</p>
            </div>
            <a href="{{ route('teacher.events.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <flux:icon.arrow-left class="size-4 mr-2" />
                Volver al listado
            </a>
        </div>

        <!-- Form Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700">
            <div class="p-6">
                <form method="POST" action="{{ route('teacher.events.update', $event->id) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Nombre del Evento -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Nombre del Evento <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="name" id="name" value="{{ old('name', $event->name) }}" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white" placeholder="Ej: Taller de Programación" required>
                        @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <!-- Descripción -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Descripción</label>
                        <textarea name="description" id="description" rows="4" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white" placeholder="Describe el evento, sus objetivos y actividades...">{{ old('description', $event->description) }}</textarea>
                        @error('description') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <!-- Fecha y Hora -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Fecha del Evento <span class="text-red-500">*</span>
                            </label>
                            <input type="date" name="date" id="date" value="{{ old('date', $event->date ? $event->date->format('Y-m-d') : '') }}" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white" required>
                            @error('date') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="time" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Hora del Evento <span class="text-red-500">*</span>
                            </label>
                            <input type="time" name="time" id="time" value="{{ old('time', $event->date ? $event->date->format('H:i') : '') }}" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white" required>
                            @error('time') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <!-- Ubicación -->
                    <div>
                        <label for="location" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Ubicación</label>
                        <input type="text" name="location" id="location" value="{{ old('location', $event->location ?? '') }}" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white" placeholder="Ej: Aula 101, Laboratorio de Computación">
                        @error('location') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <!-- Tipo de Evento -->
                    <div>
                        <label for="event_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Tipo de Evento <span class="text-red-500">*</span>
                        </label>
                        <select name="event_type" id="event_type" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white" required>
                            <option value="">Selecciona el tipo</option>
                            <option value="taller" {{ old('event_type', $event->event_type ?? '') == 'taller' ? 'selected' : '' }}>Taller</option>
                            <option value="conferencia" {{ old('event_type', $event->event_type ?? '') == 'conferencia' ? 'selected' : '' }}>Conferencia</option>
                            <option value="competencia" {{ old('event_type', $event->event_type ?? '') == 'competencia' ? 'selected' : '' }}>Competencia</option>
                            <option value="exposicion" {{ old('event_type', $event->event_type ?? '') == 'exposicion' ? 'selected' : '' }}>Exposición</option>
                            <option value="otro" {{ old('event_type', $event->event_type ?? '') == 'otro' ? 'selected' : '' }}>Otro</option>
                        </select>
                        @error('event_type') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <!-- Capacidad Máxima -->
                    <div>
                        <label for="capacity" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Capacidad Máxima</label>
                        <input type="number" name="capacity" id="capacity" value="{{ old('capacity', $event->capacity ?? '') }}" min="1" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white" placeholder="Ej: 30">
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Deja vacío si no hay límite</p>
                        @error('capacity') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('teacher.events.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Cancelar</a>
                        <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <flux:icon.check class="size-4 mr-2 inline" /> Actualizar Evento
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
