<x-layouts.app :title="__('Detalle del Anuncio - Docente')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $announcement->title }}</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400">Detalles del anuncio</p>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ route('teacher.announcements.edit', $announcement) }}"
                   class="inline-flex items-center px-4 py-2 text-sm font-medium text-blue-700 bg-blue-100 border border-blue-300 rounded-md hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <flux:icon.pencil class="size-4 mr-2" />
                    Editar
                </a>
                <a href="{{ route('teacher.announcements.index') }}"
                   class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <flux:icon.arrow-left class="size-4 mr-2" />
                    Volver al listado
                </a>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg border border-gray-200 dark:border-gray-700">
                <div class="flex items-center">
                    <div class="p-2 bg-blue-100 dark:bg-blue-900/50 rounded-lg">
                        <flux:icon.eye class="size-6 text-blue-600 dark:text-blue-400" />
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Vistas</h3>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white">0</p>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg border border-gray-200 dark:border-gray-700">
                <div class="flex items-center">
                    <div class="p-2 bg-green-100 dark:bg-green-900/50 rounded-lg">
                        <flux:icon.users class="size-6 text-green-600 dark:text-green-400" />
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Destinatarios</h3>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white">0</p>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg border border-gray-200 dark:border-gray-700">
                <div class="flex items-center">
                    <div class="p-2 bg-purple-100 dark:bg-purple-900/50 rounded-lg">
                        <flux:icon.clock class="size-6 text-purple-600 dark:text-purple-400" />
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Estado</h3>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white">Activo</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Announcement Details Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700">
            <div class="p-6">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Información del Anuncio</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Basic Info -->
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Título del Anuncio</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white font-medium">{{ $announcement->title }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">ID del Anuncio</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $announcement->id }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Fecha de Creación</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $announcement->created_at ? $announcement->created_at->format('d/m/Y H:i') : 'No disponible' }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Estado</label>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300">
                                Activo
                            </span>
                        </div>
                    </div>

                    <!-- Content -->
                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Contenido</label>
                        <div class="mt-1 p-4 bg-gray-50 dark:bg-gray-700 rounded-md">
                            <p class="text-sm text-gray-900 dark:text-white whitespace-pre-wrap">
                                {{ $announcement->content ?: 'No hay contenido disponible.' }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                    <h3 class="text-sm font-medium text-gray-900 dark:text-white mb-3">Acciones Rápidas</h3>
                    <div class="flex flex-wrap gap-3">
                        <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-blue-700 bg-blue-50 border border-blue-200 rounded-md hover:bg-blue-100">
                            <flux:icon.share class="size-4 mr-2" />
                            Compartir
                        </a>
                        <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-green-700 bg-green-50 border border-green-200 rounded-md hover:bg-green-100">
                            <flux:icon.chart-bar class="size-4 mr-2" />
                            Ver Estadísticas
                        </a>
                        <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-purple-700 bg-purple-50 border border-purple-200 rounded-md hover:bg-purple-100">
                            <flux:icon.flag class="size-4 mr-2" />
                            Crear Misión
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
