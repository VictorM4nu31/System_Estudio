<x-layouts.app :title="__('Crear Mensaje - Docente')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Crear Nuevo Mensaje</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400">Envía un mensaje a estudiantes o gremios</p>
            </div>
            <a href="{{ route('teacher.messages.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <flux:icon.arrow-left class="size-4 mr-2" />
                Volver al listado
            </a>
        </div>

        <!-- Form Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700">
            <div class="p-6">
                <form method="POST" action="{{ route('teacher.messages.store') }}" class="space-y-6">
                    @csrf

                    <!-- Tipo de Destinatario -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Tipo de Destinatario <span class="text-red-500">*</span>
                        </label>
                        <select name="recipient_type" id="recipient_type" onchange="toggleRecipientFields()" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white" required>
                            <option value="">Selecciona el tipo</option>
                            <option value="guild">Gremio</option>
                            <option value="student">Estudiante Específico</option>
                        </select>
                        @error('recipient_type') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <!-- Gremio (se muestra si se selecciona gremio) -->
                    <div id="guild_field" class="hidden">
                        <label for="guild_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Gremio <span class="text-red-500">*</span>
                        </label>
                        <select name="guild_id" id="guild_id" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                            <option value="">Selecciona un gremio</option>
                            @foreach($guilds ?? [] as $guild)
                                <option value="{{ $guild->id }}" {{ old('guild_id') == $guild->id ? 'selected' : '' }}>
                                    {{ $guild->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('guild_id') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <!-- Estudiante (se muestra si se selecciona estudiante) -->
                    <div id="student_field" class="hidden">
                        <label for="recipient_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Estudiante <span class="text-red-500">*</span>
                        </label>
                        <select name="recipient_id" id="recipient_id" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                            <option value="">Selecciona un estudiante</option>
                            <!-- Aquí se cargarían los estudiantes disponibles -->
                        </select>
                        @error('recipient_id') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <!-- Contenido del Mensaje -->
                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Contenido del Mensaje <span class="text-red-500">*</span>
                        </label>
                        <textarea name="content" id="content" rows="6" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white" placeholder="Escribe tu mensaje aquí..." required>{{ old('content') }}</textarea>
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Máximo 1000 caracteres</p>
                        @error('content') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('teacher.messages.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Cancelar</a>
                        <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <flux:icon.paper-airplane class="size-4 mr-2 inline" /> Enviar Mensaje
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function toggleRecipientFields() {
            const recipientType = document.getElementById('recipient_type').value;
            const guildField = document.getElementById('guild_field');
            const studentField = document.getElementById('student_field');

            // Ocultar ambos campos
            guildField.classList.add('hidden');
            studentField.classList.add('hidden');

            // Mostrar el campo correspondiente
            if (recipientType === 'guild') {
                guildField.classList.remove('hidden');
                document.getElementById('guild_id').required = true;
                document.getElementById('recipient_id').required = false;
            } else if (recipientType === 'student') {
                studentField.classList.remove('hidden');
                document.getElementById('recipient_id').required = true;
                document.getElementById('guild_id').required = false;
            } else {
                document.getElementById('guild_id').required = false;
                document.getElementById('recipient_id').required = false;
            }
        }
    </script>
</x-layouts.app>
