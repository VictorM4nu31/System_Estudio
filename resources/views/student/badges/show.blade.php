<x-layouts.app :title="__('Detalles de la Insignia - Estudiante')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $badge->name }}</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400">Detalles de la insignia</p>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('student.badges.edit', $badge) }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <flux:icon.pencil class="size-4 mr-2" />
                    Editar
                </a>
                <a href="{{ route('student.badges.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <flux:icon.arrow-left class="size-4 mr-2" />
                    Volver
                </a>
            </div>
        </div>

        <!-- Información de la Insignia -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Detalles Principales -->
            <div class="lg:col-span-2">
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Información de la Insignia</h2>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Descripción</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $badge->description }}</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Tipo</label>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                    {{ ucfirst($badge->type ?? 'Sin especificar') }}
                                </span>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Rareza</label>
                                @if($badge->rarity == 'comun')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200">
                                        {{ ucfirst(str_replace('_', ' ', $badge->rarity)) }}
                                    </span>
                                @elseif($badge->rarity == 'poco_comun')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                        {{ ucfirst(str_replace('_', ' ', $badge->rarity)) }}
                                    </span>
                                @elseif($badge->rarity == 'raro')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                        {{ ucfirst(str_replace('_', ' ', $badge->rarity)) }}
                                    </span>
                                @elseif($badge->rarity == 'epico')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200">
                                        {{ ucfirst(str_replace('_', ' ', $badge->rarity)) }}
                                    </span>
                                @elseif($badge->rarity == 'legendario')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">
                                        {{ ucfirst(str_replace('_', ' ', $badge->rarity)) }}
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200">
                                        Sin especificar
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Nivel Requerido</label>
                                <p class="mt-1 text-sm font-semibold text-gray-900 dark:text-white">{{ $badge->required_level ?? 'Sin especificar' }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Puntos de Recompensa</label>
                                <p class="mt-1 text-sm font-semibold text-gray-900 dark:text-white">{{ $badge->points_reward ?? '0' }}</p>
                            </div>
                        </div>

                        @if($badge->criteria)
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Criterios para Obtener</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $badge->criteria }}</p>
                        </div>
                        @endif

                        @if($badge->image_url)
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Imagen</label>
                            <div class="mt-2">
                                <img src="{{ $badge->image_url }}" alt="{{ $badge->name }}" class="w-32 h-32 object-cover rounded-lg">
                            </div>
                        </div>
                        @endif

                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Estado</label>
                            @if($badge->unlocked)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                    Desbloqueada
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200">
                                    Bloqueada
                                </span>
                            @endif
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Fecha de Creación</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $badge->created_at->format('d/m/Y H:i') }}</p>
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
                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Estudiantes con Insignia</span>
                            <span class="text-sm font-semibold text-gray-900 dark:text-white">15</span>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Tiempo Promedio</span>
                            <span class="text-sm font-semibold text-gray-900 dark:text-white">2 semanas</span>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Dificultad</span>
                            <span class="text-sm font-semibold text-gray-900 dark:text-white">Media</span>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Popularidad</span>
                            <span class="text-sm font-semibold text-gray-900 dark:text-white">85%</span>
                        </div>
                    </div>
                </div>

                <!-- Acciones -->
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Acciones</h3>
                    
                    <div class="space-y-3">
                        @if(!$badge->unlocked)
                        <button class="w-full flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            <flux:icon.lock-open class="size-4 mr-2" />
                            Desbloquear Insignia
                        </button>
                        @else
                        <button class="w-full flex items-center justify-center px-4 py-2 text-sm font-medium text-gray-600 bg-gray-100 border border-gray-300 rounded-md shadow-sm hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            <flux:icon.trophy class="size-4 mr-2" />
                            Insignia Desbloqueada
                        </button>
                        @endif
                        
                        <button class="w-full flex items-center justify-center px-4 py-2 text-sm font-medium text-blue-600 bg-blue-50 border border-blue-200 rounded-md shadow-sm hover:bg-blue-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <flux:icon.share class="size-4 mr-2" />
                            Compartir Logro
                        </button>
                        
                        <button class="w-full flex items-center justify-center px-4 py-2 text-sm font-medium text-yellow-600 bg-yellow-50 border border-yellow-200 rounded-md shadow-sm hover:bg-yellow-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                            <flux:icon.arrow-up-tray class="size-4 mr-2" />
                            Mostrar en Perfil
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Progreso hacia la Insignia -->
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <h2 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Progreso hacia la Insignia</h2>
            
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Progreso General</span>
                    <span class="text-sm font-semibold text-gray-900 dark:text-white">75%</span>
                </div>
                
                <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                    <div class="bg-blue-600 h-2.5 rounded-full" style="width: 75%"></div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                        <h4 class="text-sm font-medium text-gray-900 dark:text-white mb-2">Misiones Completadas</h4>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500 dark:text-gray-400">15/20</span>
                            <span class="text-sm font-semibold text-green-600">75%</span>
                        </div>
                    </div>
                    
                    <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                        <h4 class="text-sm font-medium text-gray-900 dark:text-white mb-2">Tareas Finalizadas</h4>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500 dark:text-gray-400">8/10</span>
                            <span class="text-sm font-semibold text-green-600">80%</span>
                        </div>
                    </div>
                    
                    <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                        <h4 class="text-sm font-medium text-gray-900 dark:text-white mb-2">Puntos Acumulados</h4>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500 dark:text-gray-400">750/1000</span>
                            <span class="text-sm font-semibold text-green-600">75%</span>
                        </div>
                    </div>
                    
                    <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                        <h4 class="text-sm font-medium text-gray-900 dark:text-white mb-2">Actividades Participadas</h4>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500 dark:text-gray-400">12/15</span>
                            <span class="text-sm font-semibold text-green-600">80%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app> 