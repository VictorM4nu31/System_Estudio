<x-layouts.app :title="__('Editar Anuncio - Docente')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Editar Anuncio</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400">Modifica la información del anuncio "{{ $announcement->title }}"</p>
            </div>
            <a href="{{ route('teacher.announcements.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <flux:icon.arrow-left class="size-4 mr-2" />
                Volver al listado
            </a>
        </div>

        <!-- Form Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700">
            <div class="p-6">
                <form method="POST" action="{{ route('teacher.announcements.update', $announcement->id) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Título del Anuncio -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Título del Anuncio <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               name="title"
                               id="title"
                               value="{{ old('title', $announcement->title) }}"
                               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                               placeholder="Ej: Importante: Nueva misión disponible"
                               required>
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Contenido -->
                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Contenido <span class="text-red-500">*</span>
                        </label>
                        <textarea name="content"
                                  id="content"
                                  rows="6"
                                  class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                                  placeholder="Escribe el contenido del anuncio aquí...">{{ old('content', $announcement->content) }}</textarea>
                        @error('content')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Gremio -->
                    <div>
                        <label for="guild_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Gremio <span class="text-red-500">*</span>
                        </label>
                        <select name="guild_id"
                                id="guild_id"
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                                required>
                            <option value="">Selecciona un gremio</option>
                            @foreach($guilds ?? [] as $guild)
                                <option value="{{ $guild->id }}" {{ old('guild_id', $announcement->guild_id) == $guild->id ? 'selected' : '' }}>
                                    {{ $guild->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('guild_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('teacher.announcements.index') }}"
                           class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Cancelar
                        </a>
                        <button type="submit"
                                class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <flux:icon.check class="size-4 mr-2 inline" />
                            Actualizar Anuncio
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
