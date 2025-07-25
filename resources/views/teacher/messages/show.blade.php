<x-layouts.app :title="__('Detalle del Mensaje - Docente')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Detalle del Mensaje</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400">Información completa del mensaje</p>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ route('teacher.messages.edit', $message) }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-blue-700 bg-blue-100 border border-blue-300 rounded-md hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <flux:icon.pencil class="size-4 mr-2" /> Editar
                </a>
                <a href="{{ route('teacher.messages.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <flux:icon.arrow-left class="size-4 mr-2" /> Volver al listado
                </a>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg border border-gray-200 dark:border-gray-700">
                <div class="flex items-center">
                    <div class="p-2 bg-blue-100 dark:bg-blue-900/50 rounded-lg">
                        <flux:icon.paper-airplane class="size-6 text-blue-600 dark:text-blue-400" />
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Estado</h3>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white">Enviado</p>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg border border-gray-200 dark:border-gray-700">
                <div class="flex items-center">
                    <div class="p-2 bg-green-100 dark:bg-green-900/50 rounded-lg">
                        <flux:icon.clock class="size-6 text-green-600 dark:text-green-400" />
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Fecha de Envío</h3>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $message->created_at->format('d/m/Y') }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg border border-gray-200 dark:border-gray-700">
                <div class="flex items-center">
                    <div class="p-2 bg-purple-100 dark:bg-purple-900/50 rounded-lg">
                        <flux:icon.users class="size-6 text-purple-600 dark:text-purple-400" />
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Tipo</h3>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $message->guild_id ? 'Gremio' : 'Individual' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Message Details Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700">
            <div class="p-6">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Información del Mensaje</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Basic Info -->
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">ID del Mensaje</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white font-medium">#{{ $message->id }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Tipo de Destinatario</label>
                            <span class="mt-1 inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $message->guild_id ? 'bg-blue-100 text-blue-800 dark:bg-blue-900/50 dark:text-blue-300' : 'bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300' }}">
                                {{ $message->guild_id ? 'Gremio' : 'Estudiante Individual' }}
                            </span>
                        </div>
                        @if($message->guild_id)
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Gremio Destinatario</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $message->guild->name ?? 'Gremio no encontrado' }}</p>
                        </div>
                        @endif
                        @if($message->recipient_id)
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Estudiante Destinatario</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">ID: {{ $message->recipient_id }}</p>
                        </div>
                        @endif
                    </div>
                    <!-- Timestamps -->
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Fecha de Creación</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $message->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Última Actualización</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $message->updated_at->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Message Content -->
                <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-3">Contenido del Mensaje</label>
                    <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                        <p class="text-sm text-gray-900 dark:text-white whitespace-pre-wrap">
                            {{ $message->content ?: 'No hay contenido disponible.' }}
                        </p>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                    <h3 class="text-sm font-medium text-gray-900 dark:text-white mb-3">Acciones Rápidas</h3>
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('teacher.messages.edit', $message) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-blue-700 bg-blue-50 border border-blue-200 rounded-md hover:bg-blue-100">
                            <flux:icon.pencil class="size-4 mr-2" /> Editar Mensaje
                        </a>
                        <button onclick="copyToClipboard('{{ $message->content }}')" class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 bg-gray-50 border border-gray-200 rounded-md hover:bg-gray-100">
                            <flux:icon.clipboard class="size-4 mr-2" /> Copiar Contenido
                        </button>
                        <form method="POST" action="{{ route('teacher.messages.destroy', $message) }}" class="inline" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este mensaje?')">
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
