<x-layouts.app :title="__('Editar Equipo - Docente')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Editar Equipo</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400">Modifica la información del equipo "{{ $team->name }}"</p>
            </div>
            <a href="{{ route('teacher.teams.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <flux:icon.arrow-left class="size-4 mr-2" />
                Volver al listado
            </a>
        </div>

        <!-- Form Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700">
            <div class="p-6">
                <form method="POST" action="{{ route('teacher.teams.update', $team->id) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Nombre del Equipo -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Nombre del Equipo <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="name" id="name" value="{{ old('name', $team->name) }}" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white" placeholder="Ej: Equipo Alpha, Grupo Beta" required>
                        @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <!-- Descripción -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Descripción</label>
                        <textarea name="description" id="description" rows="4" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white" placeholder="Describe el propósito del equipo, roles y responsabilidades...">{{ old('description', $team->description) }}</textarea>
                        @error('description') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <!-- Tipo de Equipo -->
                    <div>
                        <label for="team_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Tipo de Equipo <span class="text-red-500">*</span>
                        </label>
                        <select name="team_type" id="team_type" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white" required>
                            <option value="">Selecciona el tipo</option>
                            <option value="proyecto" {{ old('team_type', $team->team_type ?? '') == 'proyecto' ? 'selected' : '' }}>Proyecto</option>
                            <option value="investigacion" {{ old('team_type', $team->team_type ?? '') == 'investigacion' ? 'selected' : '' }}>Investigación</option>
                            <option value="competencia" {{ old('team_type', $team->team_type ?? '') == 'competencia' ? 'selected' : '' }}>Competencia</option>
                            <option value="estudio" {{ old('team_type', $team->team_type ?? '') == 'estudio' ? 'selected' : '' }}>Estudio</option>
                            <option value="otro" {{ old('team_type', $team->team_type ?? '') == 'otro' ? 'selected' : '' }}>Otro</option>
                        </select>
                        @error('team_type') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <!-- Capacidad Máxima -->
                    <div>
                        <label for="max_members" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Capacidad Máxima <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="max_members" id="max_members" value="{{ old('max_members', $team->max_members ?? 5) }}" min="2" max="20" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white" required>
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Entre 2 y 20 miembros</p>
                        @error('max_members') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <!-- Fecha de Inicio -->
                    <div>
                        <label for="start_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Fecha de Inicio</label>
                        <input type="date" name="start_date" id="start_date" value="{{ old('start_date', $team->start_date ? $team->start_date->format('Y-m-d') : '') }}" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                        @error('start_date') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <!-- Fecha de Finalización -->
                    <div>
                        <label for="end_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Fecha de Finalización</label>
                        <input type="date" name="end_date" id="end_date" value="{{ old('end_date', $team->end_date ? $team->end_date->format('Y-m-d') : '') }}" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                        @error('end_date') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <!-- Estado del Equipo -->
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Estado del Equipo <span class="text-red-500">*</span>
                        </label>
                        <select name="status" id="status" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white" required>
                            <option value="">Selecciona el estado</option>
                            <option value="activo" {{ old('status', $team->status ?? '') == 'activo' ? 'selected' : '' }}>Activo</option>
                            <option value="inactivo" {{ old('status', $team->status ?? '') == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                            <option value="completado" {{ old('status', $team->status ?? '') == 'completado' ? 'selected' : '' }}>Completado</option>
                            <option value="suspendido" {{ old('status', $team->status ?? '') == 'suspendido' ? 'selected' : '' }}>Suspendido</option>
                        </select>
                        @error('status') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('teacher.teams.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Cancelar</a>
                        <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <flux:icon.check class="size-4 mr-2 inline" /> Actualizar Equipo
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
