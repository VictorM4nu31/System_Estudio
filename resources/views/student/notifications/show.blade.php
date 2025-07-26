<x-layouts.app :title="__('Detalles de la Notificación - Estudiante')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $notification->title }}</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400">Detalles de la notificación</p>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('student.notifications.edit', $notification) }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <flux:icon.pencil class="size-4 mr-2" />
                    Editar
                </a>
                <a href="{{ route('student.notifications.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <flux:icon.arrow-left class="size-4 mr-2" />
                    Volver
                </a>
            </div>
        </div>

        <!-- Información de la Notificación -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Detalles Principales -->
            <div class="lg:col-span-2">
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Información de la Notificación</h2>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Contenido</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $notification->content }}</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Tipo</label>
                                @if($notification->type == 'academica')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                        {{ ucfirst($notification->type) }}
                                    </span>
                                @elseif($notification->type == 'mision')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                        {{ ucfirst($notification->type) }}
                                    </span>
                                @elseif($notification->type == 'tarea')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">
                                        {{ ucfirst($notification->type) }}
                                    </span>
                                @elseif($notification->type == 'recompensa')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200">
                                        {{ ucfirst($notification->type) }}
                                    </span>
                                @elseif($notification->type == 'gremio')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800 dark:bg-indigo-900 dark:text-indigo-200">
                                        {{ ucfirst($notification->type) }}
                                    </span>
                                @elseif($notification->type == 'sistema')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200">
                                        {{ ucfirst($notification->type) }}
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-200">
                                        {{ ucfirst($notification->type) }}
                                    </span>
                                @endif
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Prioridad</label>
                                @if($notification->priority == 'urgente')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">
                                        {{ ucfirst($notification->priority) }}
                                    </span>
                                @elseif($notification->priority == 'alta')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-200">
                                        {{ ucfirst($notification->priority) }}
                                    </span>
                                @elseif($notification->priority == 'normal')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                        {{ ucfirst($notification->priority) }}
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200">
                                        Normal
                                    </span>
                                @endif
                            </div>
                        </div>

                        @if($notification->action_url)
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">URL de Acción</label>
                            <a href="{{ $notification->action_url }}" target="_blank" class="mt-1 text-sm text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                                {{ $notification->action_url }}
                            </a>
                        </div>
                        @endif

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Estado</label>
                                @if($notification->is_read)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                        Leída
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">
                                        No Leída
                                    </span>
                                @endif
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Importante</label>
                                @if($notification->is_important)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">
                                        Sí
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200">
                                        No
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Fecha de Envío</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $notification->sent_at ? $notification->sent_at->format('d/m/Y H:i') : 'No enviada' }}</p>
                        </div>

                        @if($notification->scheduled_at)
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Programada para</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $notification->scheduled_at->format('d/m/Y H:i') }}</p>
                        </div>
                        @endif

                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Fecha de Creación</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $notification->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Estadísticas y Acciones -->
            <div class="space-y-6">
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Estadísticas</h3>
                    
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Tiempo desde Envío</span>
                            <span class="text-sm font-semibold text-gray-900 dark:text-white">2 horas</span>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Destinatarios</span>
                            <span class="text-sm font-semibold text-gray-900 dark:text-white">1</span>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Clicks en Acción</span>
                            <span class="text-sm font-semibold text-gray-900 dark:text-white">0</span>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Respuestas</span>
                            <span class="text-sm font-semibold text-gray-900 dark:text-white">0</span>
                        </div>
                    </div>
                </div>

                <!-- Acciones -->
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Acciones</h3>
                    
                    <div class="space-y-3">
                        @if(!$notification->is_read)
                        <button class="w-full flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            <flux:icon.check class="size-4 mr-2" />
                            Marcar como Leída
                        </button>
                        @else
                        <button class="w-full flex items-center justify-center px-4 py-2 text-sm font-medium text-gray-600 bg-gray-100 border border-gray-300 rounded-md shadow-sm hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            <flux:icon.eye class="size-4 mr-2" />
                            Ya Leída
                        </button>
                        @endif
                        
                        @if($notification->action_url)
                        <a href="{{ $notification->action_url }}" target="_blank" class="w-full flex items-center justify-center px-4 py-2 text-sm font-medium text-blue-600 bg-blue-50 border border-blue-200 rounded-md shadow-sm hover:bg-blue-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <flux:icon.arrow-top-right-on-square class="size-4 mr-2" />
                            Ir a Acción
                        </a>
                        @endif
                        
                        <button class="w-full flex items-center justify-center px-4 py-2 text-sm font-medium text-yellow-600 bg-yellow-50 border border-yellow-200 rounded-md shadow-sm hover:bg-yellow-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                            <flux:icon.arrow-path class="size-4 mr-2" />
                            Reenviar
                        </button>
                        
                        <button class="w-full flex items-center justify-center px-4 py-2 text-sm font-medium text-gray-600 bg-gray-50 border border-gray-200 rounded-md shadow-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            <flux:icon.share class="size-4 mr-2" />
                            Compartir
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Historial de Interacciones -->
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <h2 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Historial de Interacciones</h2>
            
            <div class="space-y-4">
                <div class="flex items-start space-x-3">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                            <flux:icon.paper-airplane class="size-4 text-white" />
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 dark:text-white">Notificación enviada</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Hace 2 horas</p>
                    </div>
                </div>
                
                @if($notification->is_read)
                <div class="flex items-start space-x-3">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                            <flux:icon.eye class="size-4 text-white" />
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 dark:text-white">Notificación leída</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Hace 1 hora</p>
                    </div>
                </div>
                @endif
                
                @if($notification->action_url)
                <div class="flex items-start space-x-3">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center">
                            <flux:icon.arrow-top-right-on-square class="size-4 text-white" />
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 dark:text-white">Acción disponible</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">URL: {{ $notification->action_url }}</p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-layouts.app> 