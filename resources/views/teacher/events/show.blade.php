<x-layouts.app :title="__('Detalle del Evento - Docente')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $event->name }}</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400">Detalles del evento</p>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ route('teacher.events.edit', $event) }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-blue-700 bg-blue-100 border border-blue-300 rounded-md hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <flux:icon.pencil class="size-4 mr-2" /> Editar
                </a>
                <a href="{{ route('teacher.events.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <flux:icon.arrow-left class="size-4 mr-2" /> Volver al listado
                </a>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg border border-gray-200 dark:border-gray-700">
                <div class="flex items-center">
                    <div class="p-2 bg-blue-100 dark:bg-blue-900/50 rounded-lg">
                        <flux:icon.calendar class="size-6 text-blue-600 dark:text-blue-400" />
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Fecha</h3>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $event->date ? $event->date->format('d/m/Y') : 'No definida' }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg border border-gray-200 dark:border-gray-700">
                <div class="flex items-center">
                    <div class="p-2 bg-green-100 dark:bg-green-900/50 rounded-lg">
                        <flux:icon.clock class="size-6 text-green-600 dark:text-green-400" />
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Hora</h3>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $event->date ? $event->date->format('H:i') : 'No definida' }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg border border-gray-200 dark:border-gray-700">
                <div class="flex items-center">
                    <div class="p-2 bg-purple-100 dark:bg-purple-900/50 rounded-lg">
                        <flux:icon.map-pin class="size-6 text-purple-600 dark:text-purple-400" />
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Ubicación</h3>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $event->location ?: 'No definida' }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg border border-gray-200 dark:border-gray-700">
                <div class="flex items-center">
                    <div class="p-2 bg-orange-100 dark:bg-orange-900/50 rounded-lg">
                        <flux:icon.users class="size-6 text-orange-600 dark:text-orange-400" />
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Capacidad</h3>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $event->capacity ?: 'Sin límite' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Event Details Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700">
            <div class="p-6">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Información del Evento</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Basic Info -->
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">ID del Evento</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white font-medium">#{{ $event->id }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Nombre del Evento</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white font-medium">{{ $event->name }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Tipo de Evento</label>
                            <span class="mt-1 inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 dark:bg-blue-900/50 dark:text-blue-300">
                                {{ ucfirst($event->event_type ?? 'No definido') }}
                            </span>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Estado</label>
                            <span class="mt-1 inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $event->date && $event->date->isFuture() ? 'bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300' : 'bg-gray-100 text-gray-800 dark:bg-gray-900/50 dark:text-gray-300' }}">
                                {{ $event->date && $event->date->isFuture() ? 'Próximo' : ($event->date && $event->date->isPast() ? 'Pasado' : 'Sin fecha') }}
                            </span>
                        </div>
                    </div>
                    <!-- Timestamps -->
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Fecha y Hora Completa</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $event->date ? $event->date->format('d/m/Y H:i') : 'No definida' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Ubicación</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $event->location ?: 'No definida' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Capacidad Máxima</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $event->capacity ? $event->capacity . ' personas' : 'Sin límite' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Fecha de Creación</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $event->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-3">Descripción del Evento</label>
                    <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                        <p class="text-sm text-gray-900 dark:text-white whitespace-pre-wrap">
                            {{ $event->description ?: 'No hay descripción disponible.' }}
                        </p>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                    <h3 class="text-sm font-medium text-gray-900 dark:text-white mb-3">Acciones Rápidas</h3>
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('teacher.events.edit', $event) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-blue-700 bg-blue-50 border border-blue-200 rounded-md hover:bg-blue-100">
                            <flux:icon.pencil class="size-4 mr-2" /> Editar Evento
                        </a>
                        <button onclick="copyToClipboard('{{ $event->name }} - {{ $event->date ? $event->date->format('d/m/Y H:i') : 'Sin fecha' }} - {{ $event->location ?: 'Sin ubicación' }}')" class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 bg-gray-50 border border-gray-200 rounded-md hover:bg-gray-100">
                            <flux:icon.clipboard class="size-4 mr-2" /> Copiar Información
                        </button>
                        <form method="POST" action="{{ route('teacher.events.destroy', $event) }}" class="inline" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este evento?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-red-700 bg-red-50 border border-red-200 rounded-md hover:bg-red-100">
                                <flux:icon.trash class="size-4 mr-2" /> Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function() {
                const button = event.target;
                const originalIcon = button.innerHTML;
                button.innerHTML = '<flux:icon.check class="size-4 mr-2" /> Copiado';
                setTimeout(() => {
                    button.innerHTML = originalIcon;
                }, 2000);
            });
        }
    </script>
</x-layouts.app>
