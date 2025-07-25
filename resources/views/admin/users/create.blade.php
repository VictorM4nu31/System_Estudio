<x-layouts.app :title="__('Crear Usuario - Admin')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Crear Usuario</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400">Crea una nueva cuenta en el sistema educativo RPG</p>
            </div>
            <flux:button href="{{ route('admin.users.index') }}" variant="ghost">
                <flux:icon.arrow-left class="size-4" />
                Volver a usuarios
            </flux:button>
        </div>

        <!-- Form -->
        <div class="max-w-2xl">
            <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf

                    <div class="space-y-6">
                        <!-- Name Field -->
                        <div>
                            <flux:label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Nombre completo
                            </flux:label>
                            <flux:input
                                id="name"
                                name="name"
                                type="text"
                                value="{{ old('name') }}"
                                placeholder="Ingresa el nombre completo"
                                class="mt-1 block w-full"
                                required
                            />
                            @error('name')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email Field -->
                        <div>
                            <flux:label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Correo electrónico
                            </flux:label>
                            <flux:input
                                id="email"
                                name="email"
                                type="email"
                                value="{{ old('email') }}"
                                placeholder="usuario@ejemplo.com"
                                class="mt-1 block w-full"
                                required
                            />
                            @error('email')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password Field -->
                        <div>
                            <flux:label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Contraseña
                            </flux:label>
                            <flux:input
                                id="password"
                                name="password"
                                type="password"
                                placeholder="Mínimo 6 caracteres"
                                class="mt-1 block w-full"
                                required
                            />
                            @error('password')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Role Field -->
                        <div>
                            <flux:label for="role" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Rol del usuario
                            </flux:label>
                            <flux:select id="role" name="role" class="mt-1 block w-full" required>
                                <option value="teacher" selected>📚 Docente (Maestro de Gremio)</option>
                            </flux:select>
                            @error('role')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Role Descriptions -->
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                            <h3 class="text-sm font-medium text-gray-900 dark:text-white mb-2">Descripción de rol:</h3>
                            <div class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                                <div>
                                    <strong>📚 Docente:</strong> Crea gremios, asigna misiones y gestiona estudiantes.
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center justify-end space-x-4 pt-4">
                            <flux:button type="button" variant="ghost" onclick="history.back()">
                                Cancelar
                            </flux:button>
                            <flux:button type="submit" variant="primary">
                                <flux:icon.plus class="size-4" />
                                Crear Usuario
                            </flux:button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Permission Preview -->
        <div class="max-w-2xl">
            <div class="bg-blue-50 dark:bg-blue-900/20 rounded-lg border border-blue-200 dark:border-blue-800 p-6">
                <h3 class="text-lg font-medium text-blue-900 dark:text-blue-100 mb-4">
                    <flux:icon.exclamation-triangle class="inline size-5 mr-2" />
                    Permisos por rol
                </h3>
                <div class="space-y-3 text-sm text-blue-800 dark:text-blue-200">
                    <div>
                        <strong>Administrador:</strong> Gestión completa de usuarios, roles, configuración avanzada, eventos globales, reportes y moderación.
                    </div>
                    <div>
                        <strong>Docente:</strong> Creación de gremios, asignación de misiones, gestión de estudiantes y creación de recompensas.
                    </div>
                    <div>
                        <strong>Alumno:</strong> Participación en gremios, aceptación de misiones, visualización de progreso y canje de recompensas.
                    </div>
                    <div>
                        <strong>Tutor:</strong> Visualización del progreso académico, logros y comunicación limitada con docentes.
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
