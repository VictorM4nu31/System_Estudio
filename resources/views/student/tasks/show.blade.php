<x-layouts.app :title="__('Detalles de la Tarea - Estudiante')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $task->title }}</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400">Detalles de la tarea</p>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('student.tasks.edit', $task) }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <flux:icon.pencil class="size-4 mr-2" />
                    Editar
                </a>
                <a href="{{ route('student.tasks.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <flux:icon.arrow-left class="size-4 mr-2" />
                    Volver
                </a>
            </div>
        </div>

        <!-- Información de la Tarea -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Detalles Principales -->
            <div class="lg:col-span-2">
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Información de la Tarea</h2>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Descripción</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $task->description }}</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Prioridad</label>
                                @if($task->priority == 'baja')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                        {{ ucfirst($task->priority) }}
                                    </span>
                                @elseif($task->priority == 'media')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">
                                        {{ ucfirst($task->priority) }}
                                    </span>
                                @elseif($task->priority == 'alta')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-200">
                                        {{ ucfirst($task->priority) }}
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">
                                        {{ ucfirst($task->priority) }}
                                    </span>
                                @endif
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Estado</label>
                                @if($task->status == 'pendiente')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200">
                                        {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                                    </span>
                                @elseif($task->status == 'en_progreso')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                        {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                                    </span>
                                @elseif($task->status == 'completada')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                        {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">
                                        {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        @if($task->notes)
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Notas</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $task->notes }}</p>
                        </div>
                        @endif

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Fecha de Vencimiento</label>
                                <p class="mt-1 text-sm text-gray-900 dark:text-white">
                                    {{ $task->due_date ? $task->due_date->format('d/m/Y H:i') : 'Sin fecha límite' }}
                                </p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Horas Estimadas</label>
                                <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $task->estimated_hours ?? 'No especificado' }}</p>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Tipo de Tarea</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">
                                {{ $task->is_recurring ? 'Tarea Recurrente' : 'Tarea Única' }}
                            </p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Fecha de Creación</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $task->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Estadísticas y Acciones -->
            <div class="space-y-6">
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Progreso</h3>
                    
                    <div class="space-y-4">
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Completado</span>
                                <span class="text-sm font-semibold text-gray-900 dark:text-white">75%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-blue-600 h-2 rounded-full" style="width: 75%"></div>
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Tiempo Transcurrido</span>
                            <span class="text-sm font-semibold text-gray-900 dark:text-white">2.5h</span>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Tiempo Restante</span>
                            <span class="text-sm font-semibold text-gray-900 dark:text-white">1.5h</span>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Días Restantes</span>
                            <span class="text-sm font-semibold text-gray-900 dark:text-white">3</span>
                        </div>
                    </div>
                </div>

                <!-- Acciones -->
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Acciones</h3>
                    
                    <div class="space-y-3">
                        <button class="w-full flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            <flux:icon.check class="size-4 mr-2" />
                            Completar Tarea
                        </button>
                        
                        <button class="w-full flex items-center justify-center px-4 py-2 text-sm font-medium text-blue-600 bg-blue-50 border border-blue-200 rounded-md shadow-sm hover:bg-blue-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <flux:icon.play class="size-4 mr-2" />
                            Iniciar Tarea
                        </button>
                        
                        <button class="w-full flex items-center justify-center px-4 py-2 text-sm font-medium text-yellow-600 bg-yellow-50 border border-yellow-200 rounded-md shadow-sm hover:bg-yellow-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                            <flux:icon.pause class="size-4 mr-2" />
                            Pausar Tarea
                        </button>
                        
                        <button class="w-full flex items-center justify-center px-4 py-2 text-sm font-medium text-gray-600 bg-gray-50 border border-gray-200 rounded-md shadow-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            <flux:icon.share class="size-4 mr-2" />
                            Compartir
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Historial de Actividad -->
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <h2 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Historial de Actividad</h2>
            
            <div class="space-y-4">
                <div class="flex items-start space-x-3">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                            <flux:icon.play class="size-4 text-white" />
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 dark:text-white">Tarea iniciada</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Hace 2 horas</p>
                    </div>
                </div>
                
                <div class="flex items-start space-x-3">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center">
                            <flux:icon.pause class="size-4 text-white" />
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 dark:text-white">Tarea pausada</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Hace 1 hora</p>
                    </div>
                </div>
                
                <div class="flex items-start space-x-3">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                            <flux:icon.play class="size-4 text-white" />
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 dark:text-white">Tarea reanudada</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Hace 30 minutos</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app> 