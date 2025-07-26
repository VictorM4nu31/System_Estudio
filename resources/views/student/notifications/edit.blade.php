<x-layouts.app :title="__('Editar Notificación - Estudiante')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Editar Notificación</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400">Modifica la información de la notificación</p>
            </div>
            <a href="{{ route('student.notifications.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <flux:icon.arrow-left class="size-4 mr-2" />
                Volver
            </a>
        </div>

        <!-- Form -->
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <form action="{{ route('student.notifications.update', $notification) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="space-y-6">
                    <div>
                        <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Tipo de Notificación <span class="text-red-500">*</span>
                        </label>
                        <select id="type" 
                                name="type" 
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" 
                                required>
                            <option value="">Seleccionar tipo</option>
                            <option value="academica" {{ old('type', $notification->type) == 'academica' ? 'selected' : '' }}>Académica</option>
                            <option value="mision" {{ old('type', $notification->type) == 'mision' ? 'selected' : '' }}>Misión</option>
                            <option value="tarea" {{ old('type', $notification->type) == 'tarea' ? 'selected' : '' }}>Tarea</option>
                            <option value="recompensa" {{ old('type', $notification->type) == 'recompensa' ? 'selected' : '' }}>Recompensa</option>
                            <option value="gremio" {{ old('type', $notification->type) == 'gremio' ? 'selected' : '' }}>Gremio</option>
                            <option value="sistema" {{ old('type', $notification->type) == 'sistema' ? 'selected' : '' }}>Sistema</option>
                            <option value="personal" {{ old('type', $notification->type) == 'personal' ? 'selected' : '' }}>Personal</option>
                        </select>
                        @error('type')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Título <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               id="title" 
                               name="title" 
                               value="{{ old('title', $notification->title) }}"
                               placeholder="Ej: Nueva misión disponible, Tarea completada, etc."
                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" 
                               required>
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Contenido <span class="text-red-500">*</span>
                        </label>
                        <textarea id="content" 
                                  name="content" 
                                  rows="4"
                                  placeholder="Describe el contenido de la notificación..."
                                  class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" 
                                  required>{{ old('content', $notification->content) }}</textarea>
                        @error('content')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="priority" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Prioridad
                            </label>
                            <select id="priority" 
                                    name="priority" 
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                <option value="">Seleccionar prioridad</option>
                                <option value="baja" {{ old('priority', $notification->priority) == 'baja' ? 'selected' : '' }}>Baja</option>
                                <option value="normal" {{ old('priority', $notification->priority) == 'normal' ? 'selected' : '' }}>Normal</option>
                                <option value="alta" {{ old('priority', $notification->priority) == 'alta' ? 'selected' : '' }}>Alta</option>
                                <option value="urgente" {{ old('priority', $notification->priority) == 'urgente' ? 'selected' : '' }}>Urgente</option>
                            </select>
                            @error('priority')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="tutor_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Tutor Destinatario
                            </label>
                            <select id="tutor_id" 
                                    name="tutor_id" 
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                <option value="">Seleccionar tutor</option>
                                <option value="1" {{ old('tutor_id', $notification->tutor_id) == '1' ? 'selected' : '' }}>Tutor Principal</option>
                                <option value="2" {{ old('tutor_id', $notification->tutor_id) == '2' ? 'selected' : '' }}>Tutor Secundario</option>
                            </select>
                            @error('tutor_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="action_url" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            URL de Acción
                        </label>
                        <input type="url" 
                               id="action_url" 
                               name="action_url" 
                               value="{{ old('action_url', $notification->action_url) }}"
                               placeholder="https://ejemplo.com/accion"
                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        @error('action_url')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="scheduled_at" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Programar Envío
                        </label>
                        <input type="datetime-local" 
                               id="scheduled_at" 
                               name="scheduled_at" 
                               value="{{ old('scheduled_at', $notification->scheduled_at ? $notification->scheduled_at->format('Y-m-d\TH:i') : '') }}"
                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        @error('scheduled_at')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="flex items-center">
                            <input type="checkbox" 
                                   name="is_read" 
                                   value="1"
                                   {{ old('is_read', $notification->is_read) ? 'checked' : '' }}
                                   class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">Marcar como leída</span>
                        </label>
                        @error('is_read')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="flex items-center">
                            <input type="checkbox" 
                                   name="is_important" 
                                   value="1"
                                   {{ old('is_important', $notification->is_important) ? 'checked' : '' }}
                                   class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">Notificación importante</span>
                        </label>
                        @error('is_important')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Botones de Acción -->
                <div class="flex justify-end space-x-3 mt-6">
                    <a href="{{ route('student.notifications.index') }}" 
                       class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Cancelar
                    </a>
                    <button type="submit" 
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Actualizar Notificación
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app> 