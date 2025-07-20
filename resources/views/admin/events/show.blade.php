<x-layouts.app :title="__('Detalle del Evento - Admin')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $event->name }}</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400">Detalles del evento global</p>
            </div>
            <div class="flex items-center space-x-3">
                @can('admin.events.manage')
                    <flux:button href="{{ route('admin.events.edit', $event) }}" variant="primary">
                        <flux:icon.pencil class="size-4" />
                        Editar Evento
                    </flux:button>
                @endcan
                <flux:button href="{{ route('admin.events.index') }}" variant="ghost">
                    <flux:icon.arrow-left class="size-4" />
                    Volver a Eventos
                </flux:button>
            </div>
        </div>

        <!-- Event Status Banner -->
        @php
            $eventDate = \Carbon\Carbon::parse($event->date);
            $isActive = $eventDate->isToday() || ($eventDate->isFuture() && $eventDate->diffInDays() <= 7);
            $isPast = $eventDate->isPast();
            $isUpcoming = $eventDate->isFuture() && $eventDate->diffInDays() > 7;
            
            $statusConfig = match(true) {
                $isActive => [
                    'class' => 'bg-green-50 dark:bg-green-900/20 border-green-200 dark:border-green-800',
                    'iconClass' => 'text-green-600 dark:text-green-400',
                    'textClass' => 'text-green-900 dark:text-green-100',
                    'text' => 'Evento Activo',
                    'icon' => 'play',
                    'description' => 'Este evento está actualmente en curso o comenzará pronto'
                ],
                $isPast => [
                    'class' => 'bg-gray-50 dark:bg-gray-900/20 border-gray-200 dark:border-gray-800',
                    'iconClass' => 'text-gray-600 dark:text-gray-400',
                    'textClass' => 'text-gray-900 dark:text-gray-100',
                    'text' => 'Evento Finalizado',
                    'icon' => 'check',
                    'description' => 'Este evento ya ha terminado'
                ],
                default => [
                    'class' => 'bg-blue-50 dark:bg-blue-900/20 border-blue-200 dark:border-blue-800',
                    'iconClass' => 'text-blue-600 dark:text-blue-400',
                    'textClass' => 'text-blue-900 dark:text-blue-100',
                    'text' => 'Evento Próximo',
                    'icon' => 'clock',
                    'description' => 'Este evento está programado para el futuro'
                ]
            };
        @endphp

        <div class="border rounded-lg p-4 {{ $statusConfig['class'] }}">
            <div class="flex items-center">
                <flux:icon.{{ $statusConfig['icon'] }} class="size-6 {{ $statusConfig['iconClass'] }}" />
                <div class="ml-3">
                    <h3 class="text-sm font-medium {{ $statusConfig['textClass'] }}">
                        {{ $statusConfig['text'] }}
                    </h3>
                    <p class="text-sm {{ $statusConfig['textClass'] }} mt-1">
                        {{ $statusConfig['description'] }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Event Details -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Event Info -->
            <div class="lg:col-span-2">
                <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
                    <div class="flex items-center space-x-4 mb-6">
                        <div class="flex-shrink-0">
                            <div class="h-16 w-16 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center">
                                <span class="text-white font-bold text-2xl">
                                    {{ substr($event->name, 0, 1) }}
                                </span>
                            </div>
                        </div>
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $event->name }}</h2>
                            <p class="text-gray-600 dark:text-gray-400 mt-1">Evento Global del Sistema RPG</p>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <!-- Description -->
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-3">📝 Descripción</h3>
                            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                                <p class="text-gray-900 dark:text-white">
                                    {{ $event->description ?? 'Sin descripción disponible para este evento.' }}
                                </p>
                            </div>
                        </div>

                        <!-- Event Timeline -->
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-3">⏰ Cronología del Evento</h3>
                            <div class="space-y-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-8 h-8 bg-blue-100 dark:bg-blue-900/50 rounded-full flex items-center justify-center">
                                        <flux:icon.calendar class="size-4 text-blue-600 dark:text-blue-400" />
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-900 dark:text-white">Fecha del Evento</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $eventDate->format('d/m/Y') }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-8 h-8 bg-green-100 dark:bg-green-900/50 rounded-full flex items-center justify-center">
                                        <flux:icon.clock class="size-4 text-green-600 dark:text-green-400" />
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-900 dark:text-white">Hora de Inicio</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $eventDate->format('H:i') }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-8 h-8 bg-purple-100 dark:bg-purple-900/50 rounded-full flex items-center justify-center">
                                        <flux:icon.calendar-days class="size-4 text-purple-600 dark:text-purple-400" />
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-900 dark:text-white">Tiempo Relativo</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $eventDate->diffForHumans() }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Event Impact -->
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-3">🎯 Impacto del Evento</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="bg-blue-50 dark:bg-blue-900/20 rounded-lg p-4">
                                    <h4 class="font-medium text-blue-900 dark:text-blue-100 mb-2">Alcance Global</h4>
                                    <p class="text-sm text-blue-800 dark:text-blue-200">
                                        Este evento afecta a todos los usuarios del sistema, independientemente de su gremio.
                                    </p>
                                </div>
                                <div class="bg-green-50 dark:bg-green-900/20 rounded-lg p-4">
                                    <h4 class="font-medium text-green-900 dark:text-green-100 mb-2">Participación Automática</h4>
                                    <p class="text-sm text-green-800 dark:text-green-200">
                                        Los usuarios pueden participar automáticamente sin necesidad de inscripción previa.
                                    </p>
                                </div>
                                <div class="bg-purple-50 dark:bg-purple-900/20 rounded-lg p-4">
                                    <h4 class="font-medium text-purple-900 dark:text-purple-100 mb-2">Recompensas Especiales</h4>
                                    <p class="text-sm text-purple-800 dark:text-purple-200">
                                        Los eventos globales pueden ofrecer recompensas únicas y experiencia adicional.
                                    </p>
                                </div>
                                <div class="bg-orange-50 dark:bg-orange-900/20 rounded-lg p-4">
                                    <h4 class="font-medium text-orange-900 dark:text-orange-100 mb-2">Notificaciones</h4>
                                    <p class="text-sm text-orange-800 dark:text-orange-200">
                                        Todos los usuarios reciben notificaciones automáticas sobre el evento.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Event Sidebar -->
            <div class="space-y-6">
                <!-- Event Stats -->
                <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">📊 Estadísticas</h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600 dark:text-gray-400">ID del Evento</span>
                            <span class="text-sm font-medium text-gray-900 dark:text-white">#{{ $event->id }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600 dark:text-gray-400">Creado</span>
                            <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $event->created_at->format('d/m/Y') }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600 dark:text-gray-400">Actualizado</span>
                            <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $event->updated_at->format('d/m/Y') }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600 dark:text-gray-400">Días restantes</span>
                            <span class="text-sm font-medium text-gray-900 dark:text-white">
                                @if($eventDate->isPast())
                                    Finalizado
                                @else
                                    {{ $eventDate->diffInDays() }} días
                                @endif
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Event Actions -->
                <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">⚡ Acciones</h3>
                    <div class="space-y-3">
                        @can('admin.events.manage')
                            <flux:button href="{{ route('admin.events.edit', $event) }}" variant="primary" class="w-full">
                                <flux:icon.pencil class="size-4" />
                                Editar Evento
                            </flux:button>
                        @endcan
                        
                        <flux:button variant="outline" class="w-full">
                            <flux:icon.bell class="size-4" />
                            Enviar Notificación
                        </flux:button>
                        
                        <flux:button variant="outline" class="w-full">
                            <flux:icon.share class="size-4" />
                            Compartir Evento
                        </flux:button>
                        
                        <flux:button variant="outline" class="w-full">
                            <flux:icon.chart-bar class="size-4" />
                            Ver Estadísticas
                        </flux:button>
                        
                        @can('admin.events.manage')
                            <flux:button 
                                onclick="confirm('¿Estás seguro de eliminar este evento?') && document.getElementById('delete-form').submit()" 
                                variant="outline" 
                                class="w-full text-red-600 hover:text-red-700"
                            >
                                <flux:icon.trash class="size-4" />
                                Eliminar Evento
                            </flux:button>
                            
                            <form id="delete-form" action="{{ route('admin.events.destroy', $event) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        @endcan
                    </div>
                </div>

                <!-- Event Type Info -->
                <div class="bg-gradient-to-br from-blue-50 to-purple-50 dark:from-blue-900/20 dark:to-purple-900/20 rounded-lg border border-blue-200 dark:border-blue-800 p-6">
                    <h3 class="text-lg font-medium text-blue-900 dark:text-blue-100 mb-3">
                        🎮 Evento del Sistema RPG
                    </h3>
                    <div class="space-y-2 text-sm text-blue-800 dark:text-blue-200">
                        <p>Los eventos globales son actividades especiales que:</p>
                        <ul class="list-disc list-inside space-y-1 mt-2">
                            <li>Afectan a todos los usuarios del sistema</li>
                            <li>Pueden ofrecer recompensas únicas</li>
                            <li>Generan notificaciones automáticas</li>
                            <li>Fomentan la participación comunitaria</li>
                            <li>Crean experiencias memorables</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Event Participants Preview -->
        <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">
                👥 Participantes del Evento
            </h3>
            
            <div class="text-center py-8">
                <flux:icon.users class="size-12 text-gray-400 mx-auto mb-4" />
                <h4 class="text-lg font-medium text-gray-900 dark:text-white">Participantes Automáticos</h4>
                <p class="text-gray-600 dark:text-gray-400 mt-2">
                    Los eventos globales están disponibles para todos los usuarios del sistema. 
                    La participación es automática y no requiere inscripción previa.
                </p>
                <div class="mt-4 flex items-center justify-center space-x-6">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-blue-600 dark:text-blue-400">∞</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Participantes</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-green-600 dark:text-green-400">100%</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Disponibilidad</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-purple-600 dark:text-purple-400">Global</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Alcance</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
