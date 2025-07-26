<x-layouts.app :title="__('Editar Datos Académicos - Estudiante')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Editar Datos Académicos</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400">Modifica tu información académica</p>
            </div>
            <a href="{{ route('student.academic-data.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <flux:icon.arrow-left class="size-4 mr-2" />
                Volver
            </a>
        </div>

        <!-- Form -->
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <form action="{{ route('student.academic-data.update', $data) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="space-y-6">
                    <div>
                        <label for="school" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Escuela/Institución <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               id="school" 
                               name="school" 
                               value="{{ old('school', $data->school) }}"
                               placeholder="Ej: Escuela Secundaria Técnica #1"
                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" 
                               required>
                        @error('school')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="grade" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Grado/Grupo <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   id="grade" 
                                   name="grade" 
                                   value="{{ old('grade', $data->grade) }}"
                                   placeholder="Ej: 3°A, 2°B, etc."
                                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" 
                                   required>
                            @error('grade')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="enrollment" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Matrícula <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   id="enrollment" 
                                   name="enrollment" 
                                   value="{{ old('enrollment', $data->enrollment) }}"
                                   placeholder="Ej: 2025001"
                                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" 
                                   required>
                            @error('enrollment')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="academic_year" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Año Académico
                            </label>
                            <input type="text" 
                                   id="academic_year" 
                                   name="academic_year" 
                                   value="{{ old('academic_year', $data->academic_year ?? '2024-2025') }}"
                                   placeholder="Ej: 2024-2025"
                                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                            @error('academic_year')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="semester" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Semestre/Ciclo
                            </label>
                            <select id="semester" 
                                    name="semester" 
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                <option value="">Seleccionar semestre</option>
                                <option value="1" {{ old('semester', $data->semester) == '1' ? 'selected' : '' }}>Primer Semestre</option>
                                <option value="2" {{ old('semester', $data->semester) == '2' ? 'selected' : '' }}>Segundo Semestre</option>
                                <option value="3" {{ old('semester', $data->semester) == '3' ? 'selected' : '' }}>Tercer Semestre</option>
                                <option value="4" {{ old('semester', $data->semester) == '4' ? 'selected' : '' }}>Cuarto Semestre</option>
                                <option value="5" {{ old('semester', $data->semester) == '5' ? 'selected' : '' }}>Quinto Semestre</option>
                                <option value="6" {{ old('semester', $data->semester) == '6' ? 'selected' : '' }}>Sexto Semestre</option>
                            </select>
                            @error('semester')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="career" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Carrera/Especialidad
                        </label>
                        <input type="text" 
                               id="career" 
                               name="career" 
                               value="{{ old('career', $data->career) }}"
                               placeholder="Ej: Informática, Administración, etc."
                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        @error('career')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="advisor" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Asesor Académico
                        </label>
                        <input type="text" 
                               id="advisor" 
                               name="advisor" 
                               value="{{ old('advisor', $data->advisor) }}"
                               placeholder="Nombre del asesor académico"
                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        @error('advisor')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="notes" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Notas Adicionales
                        </label>
                        <textarea id="notes" 
                                  name="notes" 
                                  rows="3"
                                  placeholder="Información adicional sobre tu situación académica..."
                                  class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">{{ old('notes', $data->notes) }}</textarea>
                        @error('notes')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="flex items-center">
                            <input type="checkbox" 
                                   name="is_active" 
                                   value="1"
                                   {{ old('is_active', $data->is_active ?? true) ? 'checked' : '' }}
                                   class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">Estudiante activo</span>
                        </label>
                        @error('is_active')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Botones de Acción -->
                <div class="flex justify-end space-x-3 mt-6">
                    <a href="{{ route('student.academic-data.index') }}" 
                       class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Cancelar
                    </a>
                    <button type="submit" 
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Actualizar Datos Académicos
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app> 