<x-layouts.app :title="__('Roles y Permisos - Admin')">
<div class="max-w-4xl mx-auto mt-10 bg-white p-8 rounded shadow">
    <h1 class="text-2xl font-bold mb-6 text-center">Roles y Permisos</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @foreach($roles as $role)
            <div class="border rounded-lg p-4">
                <h2 class="text-lg font-semibold mb-2">{{ ucfirst($role->name) }}</h2>
                <h3 class="text-sm font-medium text-gray-600 mb-1">Permisos:</h3>
                <ul class="list-disc list-inside text-sm text-gray-800">
                    @forelse($role->permissions as $perm)
                        <li>{{ $perm->name }}</li>
                    @empty
                        <li class="text-gray-400">Sin permisos asignados</li>
                    @endforelse
                </ul>
            </div>
        @endforeach
    </div>
    <div class="mt-8">
        <h2 class="text-lg font-semibold mb-2">Todos los permisos disponibles</h2>
        <ul class="flex flex-wrap gap-2">
            @foreach($permissions as $perm)
                <li class="bg-gray-100 rounded px-2 py-1 text-xs">{{ $perm->name }}</li>
            @endforeach
        </ul>
    </div>
</div>
</x-layouts.app>
