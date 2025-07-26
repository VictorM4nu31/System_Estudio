<x-layouts.app :title="__('Detalles Académicos - Estudiante')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Información Académica</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400">Detalles de tu perfil académico</p>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('student.academic-data.edit', $data) }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <flux:icon.pencil class="size-4 mr-2" />
                    Editar
                </a>
                <a href="{{ route('student.academic-data.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <flux:icon.arrow-left class="size-4 mr-2" />
                    Volver
                </a>
            </div>
        </div>

        <!-- Información Académica -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Detalles Principales -->
            <div class="lg:col-span-2">
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Información Institucional</h2>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Escuela/Institución</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $data->school }}</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Grado/Grupo</label>
                                <p class="mt-1 text-sm font-semibold text-gray-900 dark:text-white">{{ $data->grade }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Matrícula</label>
                                <p class="mt-1 text-sm font-semibold text-gray-900 dark:text-white">{{ $data->enrollment }}</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Año Académico</label>
                                <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $data->academic_year ?? 'No especificado' }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Semestre/Ciclo</label>
                                <p class="mt-1 text-sm text-gray-900 dark:text-white">
                                    @if($data->semester)
                                        @switch($data->semester)
                                            @case('1')
                                                Primer Semestre
                                                @break
                                            @case('2')
                                                Segundo Semestre
                                                @break
                                            @case('3')
                                                Tercer Semestre
                                                @break
                                            @case('4')
                                                Cuarto Semestre
                                                @break
                                            @case('5')
                                                Quinto Semestre
                                                @break
                                            @case('6')
                                                Sexto Semestre
                                                @break
                                            @default
                                                {{ $data->semester }}
                                        @endswitch
                                    @else
                                        No especificado
                                    @endif
                                </p>
                            </div>
                        </div>

                        @if($data->career)
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Carrera/Especialidad</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $data->career }}</p>
                        </div>
                        @endif

                        @if($data->advisor)
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Asesor Académico</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $data->advisor }}</p>
                        </div>
                        @endif

                        @if($data->notes)
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Notas Adicionales</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $data->notes }}</p>
                        </div>
                        @endif

                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Estado</label>
                            @if($data->is_active)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                    Activo
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">
                                    Inactivo
                                </span>
                            @endif
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Última Actualización</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $data->updated_at->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Estadísticas y Acciones -->
            <div class="space-y-6">
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Estadísticas Académicas</h3>
                    
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Promedio General</span>
                            <span class="text-sm font-semibold text-gray-900 dark:text-white">8.5</span>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Asignaturas Aprobadas</span>
                            <span class="text-sm font-semibold text-gray-900 dark:text-white">12/15</span>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Créditos Obtenidos</span>
                            <span class="text-sm font-semibold text-gray-900 dark:text-white">180/240</span>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Asistencia</span>
                            <span class="text-sm font-semibold text-gray-900 dark:text-white">85%</span>
                        </div>
                    </div>
                </div>

                <!-- Acciones -->
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Acciones</h3>
                    
                    <div class="space-y-3">
                        <button class="w-full flex items-center justify-center px-4 py-2 text-sm font-medium text-blue-600 bg-blue-50 border border-blue-200 rounded-md shadow-sm hover:bg-blue-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <flux:icon.document-text class="size-4 mr-2" />
                            Descargar Constancia
                        </button>
                        
                        <button class="w-full flex items-center justify-center px-4 py-2 text-sm font-medium text-green-600 bg-green-50 border border-green-200 rounded-md shadow-sm hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            <flux:icon.chart-bar class="size-4 mr-2" />
                            Ver Historial
                        </button>
                        
                        <button class="w-full flex items-center justify-center px-4 py-2 text-sm font-medium text-yellow-600 bg-yellow-50 border border-yellow-200 rounded-md shadow-sm hover:bg-yellow-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                            <flux:icon.calendar class="size-4 mr-2" />
                            Horario de Clases
                        </button>
                        
                        <button class="w-full flex items-center justify-center px-4 py-2 text-sm font-medium text-gray-600 bg-gray-50 border border-gray-200 rounded-md shadow-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            <flux:icon.share class="size-4 mr-2" />
                            Compartir
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Historial Académico -->
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <h2 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Historial Académico</h2>
            
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Asignatura</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Calificación</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Créditos</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Estado</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Semestre</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">Matemáticas</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">9.0</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">6</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                    Aprobada
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">1er Semestre</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">Programación</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">8.5</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">8</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                    Aprobada
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">2do Semestre</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">Base de Datos</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">8.0</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">6</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                    Aprobada
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">3er Semestre</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.app> 