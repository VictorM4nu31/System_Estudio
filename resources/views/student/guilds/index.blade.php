<x-layouts.app :title="__('Mi Gremio - Estudiante')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Mi Gremio</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400">Información sobre tu gremio y compañeros</p>
            </div>
        </div>

        <!-- Guild Information Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700">
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Información del Gremio -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Información del Gremio</h3>

                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Nombre del Gremio</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white font-medium">{{ auth()->user()->student->guild->name ?? 'No asignado' }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Código del Gremio</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ auth()->user()->student->guild->code ?? 'N/A' }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Descripción</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ auth()->user()->student->guild->description ?? 'Sin descripción' }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Docente Responsable</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ auth()->user()->student->guild->teacher->user->name ?? 'No asignado' }}</p>
                        </div>
                    </div>

                    <!-- Estadísticas del Gremio -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Estadísticas del Gremio</h3>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg">
                                <div class="flex items-center">
                                    <flux:icon.users class="size-6 text-blue-600 dark:text-blue-400" />
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-blue-600 dark:text-blue-400">Miembros</p>
                                        <p class="text-xl font-bold text-blue-900 dark:text-blue-100">{{ auth()->user()->student->guild->students->count() ?? 0 }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg">
                                <div class="flex items-center">
                                    <flux:icon.flag class="size-6 text-green-600 dark:text-green-400" />
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-green-600 dark:text-green-400">Misiones Activas</p>
                                        <p class="text-xl font-bold text-green-900 dark:text-green-100">5</p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-purple-50 dark:bg-purple-900/20 p-4 rounded-lg">
                                <div class="flex items-center">
                                    <flux:icon.trophy class="size-6 text-purple-600 dark:text-purple-400" />
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-purple-600 dark:text-purple-400">Puntos Totales</p>
                                        <p class="text-xl font-bold text-purple-900 dark:text-purple-100">1,250</p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-orange-50 dark:bg-orange-900/20 p-4 rounded-lg">
                                <div class="flex items-center">
                                    <flux:icon.star class="size-6 text-orange-600 dark:text-orange-400" />
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-orange-600 dark:text-orange-400">Ranking</p>
                                        <p class="text-xl font-bold text-orange-900 dark:text-orange-100">#3</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Miembros del Gremio -->
                <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Miembros del Gremio</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Estudiante</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nivel</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Puntos</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Estado</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse(auth()->user()->student->guild->students ?? [] as $student)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <div class="h-10 w-10 rounded-full bg-blue-300 dark:bg-blue-600 flex items-center justify-center">
                                                    <flux:icon.user class="size-5 text-blue-700 dark:text-blue-300" />
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                    {{ $student->user->name }}
                                                </div>
                                                <div class="text-sm text-gray-500 dark:text-gray-400">
                                                    {{ $student->user->email }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900/50 dark:text-blue-300">
                                            Nivel {{ $student->level ?? 1 }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                        {{ $student->points ?? 0 }} pts
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300">
                                            Activo
                                        </span>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                                        No hay miembros en este gremio
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
