<x-layouts.app :title="__('Eventos Globales - Admin')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Eventos Globales</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400">Gestiona eventos especiales del sistema educativo RPG</p>
            </div>
            <div class="flex items-center space-x-3">
                @can('admin.events.create')
                    <flux:button href="{{ route('admin.events.create') }}" variant="primary">
                        <flux:icon.plus class="size-4" />
                        Crear Evento
                    </flux:button>
                @endcan
                <flux:button href="{{ route('dashboard') }}" variant="ghost">
                    <flux:icon.arrow-left class="size-4" />
                    Volver al Dashboard
                </flux:button>
            </div>
        </div>

        <!-- Event Statistics -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg border border-gray-200 dark:border-gray-700">
                <div class="flex items-center">
                    <div class="p-2 bg-blue-100 dark:bg-blue-900/50 rounded-lg">
                        <flux:icon.calendar class="size-6 text-blue-600 dark:text-blue-400" />
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Eventos</h3>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ count($events) }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg border border-gray-200 dark:border-gray-700">
                <div class="flex items-center">
                    <div class="p-2 bg-green-100 dark:bg-green-900/50 rounded-lg">
                        <flux:icon.play class="size-6 text-green-600 dark:text-green-400" />
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Eventos Activos</h3>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white">
                            {{ $events->where('date', '>=', now())->where('date', '<=', now()->addDays(7))->count() }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg border border-gray-200 dark:border-gray-700">
                <div class="flex items-center">
                    <div class="p-2 bg-yellow-100 dark:bg-yellow-900/50 rounded-lg">
                        <flux:icon.clock class="size-6 text-yellow-600 dark:text-yellow-400" />
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Próximos Eventos</h3>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white">
                            {{ $events->where('date', '>', now())->count() }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg border border-gray-200 dark:border-gray-700">
                <div class="flex items-center">
                    <div class="p-2 bg-purple-100 dark:bg-purple-900/50 rounded-lg">
                        <flux:icon.archive class="size-6 text-purple-600 dark:text-purple-400" />
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Eventos Pasados</h3>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white">
                            {{ $events->where('date', '<', now())->count() }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-gradient-to-r from-blue-50 to-purple-50 dark:from-blue-900/20 dark:to-purple-900/20 rounded-lg border border-blue-200 dark:border-blue-800 p-6">
            <h3 class="text-lg font-medium text-blue-900 dark:text-blue-100 mb-4">
                🎊 Eventos Especiales del Sistema RPG
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-white dark:bg-gray-800 rounded-lg p-4">
                    <div class="flex items-center mb-2">
                        <span class="text-2xl mr-2">🏆</span>
                        <h4 class="font-medium text-gray-900 dark:text-white">Torneos</h4>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Competencias entre gremios</p>
                </div>
                
                <div class="bg-white dark:bg-gray-800 rounded-lg p-4">
                    <div class="flex items-center mb-2">
                        <span class="text-2xl mr-2">🎃</span>
                        <h4 class="font-medium text-gray-900 dark:text-white">Festivales</h4>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Celebraciones especiales</p>
                </div>
                
                <div class="bg-white dark:bg-gray-800 rounded-lg p-4">
                    <div class="flex items-center mb-2">
                        <span class="text-2xl mr-2">⚔️</span>
                        <h4 class="font-medium text-gray-900 dark:text-white">Misiones Épicas</h4>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Desafíos globales</p>
                </div>
                
                <div class="bg-white dark:bg-gray-800 rounded-lg p-4">
                    <div class="flex items-center mb-2">
                        <span class="text-2xl mr-2">🎁</span>
                        <h4 class="font-medium text-gray-900 dark:text-white">Recompensas</h4>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Premios especiales</p>
                </div>
            </div>
        </div>

        <!-- Events List -->
        <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Lista de Eventos</h2>
                    <div class="flex items-center space-x-3">
                        <flux:select class="w-40">
                            <option value="all">Todos los eventos</option>
                            <option value="active">Eventos activos</option>
                            <option value="upcoming">Próximos eventos</option>
                            <option value="past">Eventos pasados</option>
                        </flux:select>
                        <flux:input type="search" placeholder="Buscar eventos..." class="w-64" />
                    </div>
                </div>

                @if(count($events) > 0)
                    <div class="space-y-4">
                        @foreach($events->sortBy('date') as $event)
                            @php
                                $eventDate = \Carbon\Carbon::parse($event->date);
                                $isActive = $eventDate->isToday() || ($eventDate->isFuture() && $eventDate->diffInDays() <= 7);
                                $isPast = $eventDate->isPast();
                                $isUpcoming = $eventDate->isFuture() && $eventDate->diffInDays() > 7;
                                
                                $statusClass = match(true) {
                                    $isActive => 'bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300',
                                    $isPast => 'bg-gray-100 text-gray-800 dark:bg-gray-900/50 dark:text-gray-300',
                                    default => 'bg-blue-100 text-blue-800 dark:bg-blue-900/50 dark:text-blue-300'
                                };
                                
                                $statusText = match(true) {
                                    $isActive => 'Activo',
                                    $isPast => 'Finalizado',
                                    default => 'Próximo'
                                };
                                
                                $statusIcon = match(true) {
                                    $isActive => 'play',
                                    $isPast => 'check',
                                    default => 'clock'
                                };
                            @endphp
                            
                            <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-6 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                <div class="flex items-center justify-between">
                                    <div class="flex-1">
                                        <div class="flex items-center space-x-3">
                                            <div class="flex-shrink-0">
                                                <div class="h-12 w-12 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center">
                                                    <span class="text-white font-bold text-lg">
                                                        {{ substr($event->name, 0, 1) }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                                                    {{ $event->name }}
                                                </h3>
                                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                                    {{ $event->description ?? 'Sin descripción' }}
                                                </p>
                                                <div class="flex items-center mt-2 space-x-4">
                                                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                                        <flux:icon.calendar class="size-4 mr-1" />
                                                        {{ $eventDate->format('d/m/Y') }}
                                                    </div>
                                                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                                        <flux:icon.clock class="size-4 mr-1" />
                                                        {{ $eventDate->format('H:i') }}
                                                    </div>
                                                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                                        <flux:icon.calendar-days class="size-4 mr-1" />
                                                        {{ $eventDate->diffForHumans() }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-center space-x-4">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $statusClass }}">
                                            <flux:icon.{{ $statusIcon }} class="size-3 mr-1" />
                                            {{ $statusText }}
                                        </span>
                                        
                                        <div class="flex items-center space-x-2">
                                            <flux:button href="{{ route('admin.events.show', $event) }}" variant="ghost" size="sm">
                                                <flux:icon.eye class="size-4" />
                                            </flux:button>
                                            
                                            @can('admin.events.manage')
                                                <flux:button href="{{ route('admin.events.edit', $event) }}" variant="ghost" size="sm">
                                                    <flux:icon.pencil class="size-4" />
                                                </flux:button>
                                                
                                                <flux:button 
                                                    onclick="confirm('¿Estás seguro de eliminar este evento?') && document.getElementById('delete-form-{{ $event->id }}').submit()" 
                                                    variant="ghost" 
                                                    size="sm" 
                                                    class="text-red-600 hover:text-red-700"
                                                >
                                                    <flux:icon.trash class="size-4" />
                                                </flux:button>
                                                
                                                <form id="delete-form-{{ $event->id }}" action="{{ route('admin.events.destroy', $event) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            @endcan
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12">
                        <flux:icon.calendar class="size-12 text-gray-400 mx-auto mb-4" />
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">No hay eventos creados</h3>
                        <p class="text-gray-600 dark:text-gray-400 mt-2">
                            Crea tu primer evento global para comenzar a organizar actividades especiales.
                        </p>
                        @can('admin.events.create')
                            <flux:button href="{{ route('admin.events.create') }}" variant="primary" class="mt-4">
                                <flux:icon.plus class="size-4" />
                                Crear Primer Evento
                            </flux:button>
                        @endcan
                    </div>
                @endif
            </div>
        </div>

        <!-- Event Types Info -->
        <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">
                📚 Tipos de Eventos en el Sistema RPG
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h4 class="font-medium text-gray-900 dark:text-white mb-3">🎯 Eventos Competitivos</h4>
                    <div class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                        <div><strong>Torneos de Gremios:</strong> Competencias entre diferentes gremios</div>
                        <div><strong>Duelos Académicos:</strong> Competencias individuales de conocimiento</div>
                        <div><strong>Misiones de Velocidad:</strong> Desafíos contra el tiempo</div>
                        <div><strong>Rankings Globales:</strong> Clasificaciones del sistema</div>
                    </div>
                </div>
                
                <div>
                    <h4 class="font-medium text-gray-900 dark:text-white mb-3">🎊 Eventos Especiales</h4>
                    <div class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                        <div><strong>Festivales Temáticos:</strong> Celebraciones por temporadas</div>
                        <div><strong>Días Especiales:</strong> Eventos conmemorativos</div>
                        <div><strong>Misiones Épicas:</strong> Aventuras colaborativas</div>
                        <div><strong>Eventos de Recompensas:</strong> Premios especiales</div>
                    </div>
                </div>
                
                <div>
                    <h4 class="font-medium text-gray-900 dark:text-white mb-3">⚔️ Eventos de Misiones</h4>
                    <div class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                        <div><strong>Misiones Globales:</strong> Desafíos para todo el sistema</div>
                        <div><strong>Eventos de Jefes:</strong> Misiones especiales difíciles</div>
                        <div><strong>Misiones Colaborativas:</strong> Trabajo en equipo</div>
                        <div><strong>Eventos de Exploración:</strong> Descubrimiento de contenido</div>
                    </div>
                </div>
                
                <div>
                    <h4 class="font-medium text-gray-900 dark:text-white mb-3">🏆 Eventos de Reconocimiento</h4>
                    <div class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                        <div><strong>Ceremonias de Graduación:</strong> Eventos de promoción</div>
                        <div><strong>Entrega de Badges:</strong> Reconocimientos especiales</div>
                        <div><strong>Eventos de Mentores:</strong> Celebración de docentes</div>
                        <div><strong>Ceremonias de Gremios:</strong> Eventos de hermandad</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
