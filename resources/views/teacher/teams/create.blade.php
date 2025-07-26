<x-layouts.app :title="__('Crear Equipo - Docente')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Crear Nuevo Equipo</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400">Organiza equipos de trabajo para tus estudiantes</p>
            </div>
            <a href="{{ route('teacher.teams.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <flux:icon.arrow-left class="size-4 mr-2" />
                Volver al listado
            </a>
        </div>

        <!-- Form Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700">
            <div class="p-6">
                <form method="POST" action="{{ route('teacher.teams.store') }}" class="space-y-6">
                    @csrf

                    <!-- Nombre del Equipo -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Nombre del Equipo <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white" placeholder="Ej: Equipo Alpha, Grupo Beta" required>
                        @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <!-- Descripción -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Descripción</label>
                        <textarea name="description" id="description" rows="4" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white" placeholder="Describe el propósito del equipo, roles y responsabilidades...">{{ old('description') }}</textarea>
                        @error('description') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <!-- Tipo de Equipo -->
                    <div>
                        <label for="team_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Tipo de Equipo <span class="text-red-500">*</span>
                        </label>
                        <select name="team_type" id="team_type" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white" required>
                            <option value="">Selecciona el tipo</option>
                            <option value="proyecto" {{ old('team_type') == 'proyecto' ? 'selected' : '' }}>Proyecto</option>
                            <option value="investigacion" {{ old('team_type') == 'investigacion' ? 'selected' : '' }}>Investigación</option>
                            <option value="competencia" {{ old('team_type') == 'competencia' ? 'selected' : '' }}>Competencia</option>
                            <option value="estudio" {{ old('team_type') == 'estudio' ? 'selected' : '' }}>Estudio</option>
                            <option value="otro" {{ old('team_type') == 'otro' ? 'selected' : '' }}>Otro</option>
                        </select>
                        @error('team_type') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <!-- Capacidad Máxima -->
                    <div>
                        <label for="max_members" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Capacidad Máxima <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="max_members" id="max_members" value="{{ old('max_members', 5) }}" min="2" max="20" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white" required>
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Entre 2 y 20 miembros</p>
                        @error('max_members') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <!-- Fecha de Inicio -->
                    <div>
                        <label for="start_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Fecha de Inicio</label>
                        <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                        @error('start_date') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <!-- Fecha de Finalización -->
                    <div>
                        <label for="end_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Fecha de Finalización</label>
                        <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                        @error('end_date') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <!-- Estado del Equipo -->
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Estado del Equipo <span class="text-red-500">*</span>
                        </label>
                        <select name="status" id="status" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white" required>
                            <option value="">Selecciona el estado</option>
                            <option value="activo" {{ old('status') == 'activo' ? 'selected' : '' }}>Activo</option>
                            <option value="inactivo" {{ old('status') == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                            <option value="completado" {{ old('status') == 'completado' ? 'selected' : '' }}>Completado</option>
                            <option value="suspendido" {{ old('status') == 'suspendido' ? 'selected' : '' }}>Suspendido</option>
                        </select>
                        @error('status') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <!-- Método de Creación -->
                    <div>
                        <label for="creation_method" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Método de Creación <span class="text-red-500">*</span>
                        </label>
                        <select name="creation_method" id="creation_method" onchange="toggleCreationFields()" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white" required>
                            <option value="">Selecciona el método</option>
                            <option value="manual" {{ old('creation_method') == 'manual' ? 'selected' : '' }}>Creación Manual</option>
                            <option value="random" {{ old('creation_method') == 'random' ? 'selected' : '' }}>Creación Aleatoria</option>
                        </select>
                        @error('creation_method') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <!-- Gremio (para equipos aleatorios) -->
                    <div id="guild_field" class="hidden">
                        <label for="guild_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Gremio (Opcional)
                        </label>
                        <select name="guild_id" id="guild_id" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                            <option value="">Todos los estudiantes</option>
                            @foreach($guilds ?? [] as $guild)
                                <option value="{{ $guild->id }}" {{ old('guild_id') == $guild->id ? 'selected' : '' }}>
                                    {{ $guild->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('guild_id') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <!-- Información de Estudiantes -->
                    <div id="students_info" class="hidden bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg">
                        <h3 class="text-sm font-medium text-blue-800 dark:text-blue-200 mb-2">Información de Estudiantes</h3>
                        <div class="text-sm text-blue-700 dark:text-blue-300">
                            <p>Total de estudiantes disponibles: <span id="total_students_count">{{ $students->count() }}</span></p>
                            <p>Número de equipos que se crearán: <span id="teams_count">0</span></p>
                            <p>Estudiantes restantes: <span id="remaining_students">0</span></p>
                        </div>
                    </div>

                    <!-- Número de Equipos (para equipos aleatorios) -->
                    <div id="teams_count_field" class="hidden">
                        <label for="teams_count" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Número de Equipos (Opcional)
                        </label>
                        <input type="number" name="teams_count" id="teams_count_input" value="{{ old('teams_count') }}" min="1" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white" placeholder="Dejar vacío para calcular automáticamente">
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Si no se especifica, se calculará automáticamente basado en el número de estudiantes</p>
                        @error('teams_count') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('teacher.teams.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Cancelar</a>
                        <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <flux:icon.plus class="size-4 mr-2 inline" /> Crear Equipo
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function toggleCreationFields() {
            const creationMethod = document.getElementById('creation_method').value;
            const guildField = document.getElementById('guild_field');
            const studentsInfo = document.getElementById('students_info');
            const teamsCountField = document.getElementById('teams_count_field');

            // Ocultar todos los campos
            guildField.classList.add('hidden');
            studentsInfo.classList.add('hidden');
            teamsCountField.classList.add('hidden');

            // Mostrar campos según el método seleccionado
            if (creationMethod === 'random') {
                guildField.classList.remove('hidden');
                studentsInfo.classList.remove('hidden');
                teamsCountField.classList.remove('hidden');
                updateTeamsInfo();
            }
        }

        function updateTeamsInfo() {
            const maxMembers = parseInt(document.getElementById('max_members').value) || 5;
            const totalStudents = parseInt(document.getElementById('total_students_count').textContent) || 0;
            const teamsCountInput = document.getElementById('teams_count_input');

            // Calcular número de equipos
            let teamsCount = Math.ceil(totalStudents / maxMembers);
            if (teamsCountInput.value) {
                teamsCount = parseInt(teamsCountInput.value);
            }

            // Calcular estudiantes restantes
            const remainingStudents = totalStudents - (teamsCount * maxMembers);

            // Actualizar información
            document.getElementById('teams_count').textContent = teamsCount;
            document.getElementById('remaining_students').textContent = Math.max(0, remainingStudents);
        }

        // Ejecutar al cargar la página
        document.addEventListener('DOMContentLoaded', function() {
            toggleCreationFields();

            // Actualizar información cuando cambie el número de miembros máximos
            document.getElementById('max_members').addEventListener('change', updateTeamsInfo);
            document.getElementById('teams_count_input').addEventListener('input', updateTeamsInfo);
        });
    </script>
</x-layouts.app>
