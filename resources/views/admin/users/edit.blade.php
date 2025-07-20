<x-layouts.app :title="__('Editar Usuario - Admin')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Editar Usuario</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400">Modifica la información de {{ $user->name }}</p>
            </div>
            <div class="flex items-center space-x-3">
                <flux:button href="{{ route('admin.users.show', $user) }}" variant="ghost">
                    <flux:icon.eye class="size-4" />
                    Ver perfil
                </flux:button>
                <flux:button href="{{ route('admin.users.index') }}" variant="ghost">
                    <flux:icon.arrow-left class="size-4" />
                    Volver a usuarios
                </flux:button>
            </div>
        </div>

        <!-- User Info Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
            <div class="flex items-center space-x-4">
                <div class="flex-shrink-0">
                    <div class="h-16 w-16 rounded-full bg-gray-300 dark:bg-gray-600 flex items-center justify-center">
                        <span class="text-xl font-bold text-gray-700 dark:text-gray-300">
                            {{ substr($user->name, 0, 1) }}
                        </span>
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">{{ $user->name }}</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ $user->email }}</p>
                    <div class="mt-2 flex items-center space-x-2">
                        @if($user->roles->isNotEmpty())
                            @php
                                $roleClass = match($user->roles->first()->name) {
                                    'admin' => 'bg-red-100 text-red-800 dark:bg-red-900/50 dark:text-red-300',
                                    'teacher' => 'bg-blue-100 text-blue-800 dark:bg-blue-900/50 dark:text-blue-300',
                                    'student' => 'bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300',
                                    'tutor' => 'bg-purple-100 text-purple-800 dark:bg-purple-900/50 dark:text-purple-300',
                                    default => 'bg-gray-100 text-gray-800 dark:bg-gray-900/50 dark:text-gray-300'
                                };
                            @endphp
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $roleClass }}">
                                {{ ucfirst($user->roles->first()->name) }}
                            </span>
                        @endif
                        
                        @if($user->suspended ?? false)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900/50 dark:text-red-300">
                                Suspendido
                            </span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300">
                                Activo
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Form -->
        <div class="max-w-2xl">
            <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
                <form action="{{ route('admin.users.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
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
                                value="{{ old('name', $user->name) }}"
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
                                value="{{ old('email', $user->email) }}"
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
                                Nueva contraseña
                            </flux:label>
                            <flux:input 
                                id="password" 
                                name="password" 
                                type="password" 
                                placeholder="Dejar vacío para mantener la actual"
                                class="mt-1 block w-full"
                            />
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                Deja este campo vacío si no deseas cambiar la contraseña
                            </p>
                            @error('password')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Role Field -->
                        @can('roles.assign')
                            <div>
                                <flux:label for="role" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Rol del usuario
                                </flux:label>
                                <flux:select id="role" name="role" class="mt-1 block w-full" required>
                                    <option value="">Selecciona un rol</option>
                                    <option value="admin" {{ old('role', $user->roles->first()->name ?? '') == 'admin' ? 'selected' : '' }}>
                                        🎓 Administrador (Gran Maestro)
                                    </option>
                                    <option value="teacher" {{ old('role', $user->roles->first()->name ?? '') == 'teacher' ? 'selected' : '' }}>
                                        📚 Docente (Maestro de Gremio)
                                    </option>
                                    <option value="student" {{ old('role', $user->roles->first()->name ?? '') == 'student' ? 'selected' : '' }}>
                                        🎒 Alumno (Aventurero)
                                    </option>
                                    <option value="tutor" {{ old('role', $user->roles->first()->name ?? '') == 'tutor' ? 'selected' : '' }}>
                                        🛡️ Tutor (Guardián)
                                    </option>
                                </flux:select>
                                @error('role')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        @endcan

                        <!-- Account Status -->
                        @can('users.suspend')
                            <div>
                                <flux:label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Estado de la cuenta
                                </flux:label>
                                <div class="mt-2 space-y-2">
                                    <div class="flex items-center">
                                        <input 
                                            id="active" 
                                            name="status" 
                                            type="radio" 
                                            value="active"
                                            {{ !($user->suspended ?? false) ? 'checked' : '' }}
                                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 dark:border-gray-600"
                                        />
                                        <label for="active" class="ml-3 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                            Activo
                                        </label>
                                    </div>
                                    <div class="flex items-center">
                                        <input 
                                            id="suspended" 
                                            name="status" 
                                            type="radio" 
                                            value="suspended"
                                            {{ ($user->suspended ?? false) ? 'checked' : '' }}
                                            class="h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300 dark:border-gray-600"
                                        />
                                        <label for="suspended" class="ml-3 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                            Suspendido
                                        </label>
                                    </div>
                                </div>
                            </div>
                        @endcan

                        <!-- Submit Button -->
                        <div class="flex items-center justify-end space-x-4 pt-4">
                            <flux:button type="button" variant="ghost" onclick="history.back()">
                                Cancelar
                            </flux:button>
                            <flux:button type="submit" variant="primary">
                                <flux:icon.check class="size-4" />
                                Actualizar Usuario
                            </flux:button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- User Activity -->
        <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Información de la cuenta</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Fecha de registro</dt>
                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $user->created_at->format('d/m/Y H:i') }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Última actualización</dt>
                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $user->updated_at->format('d/m/Y H:i') }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">ID de usuario</dt>
                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">#{{ $user->id }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Verificación de email</dt>
                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                        @if($user->email_verified_at)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300">
                                Verificado
                            </span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900/50 dark:text-yellow-300">
                                Pendiente
                            </span>
                        @endif
                    </dd>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
