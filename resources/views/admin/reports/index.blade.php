<x-layouts.app :title="__('Reportes y Analíticas - Admin')">
<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Reportes
        </h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500">
            Listado de reportes disponibles en el sistema.
        </p>
    </div>

    <div class="border-t border-gray-200">
        <ul class="divide-y divide-gray-200">
            @forelse($reports as $reporte)
                <li class="px-4 py-4 sm:px-6">
                    <span class="text-sm text-gray-900">{{ $reporte }}</span>
                </li>
            @empty
                <li class="px-4 py-4 sm:px-6 text-gray-500">No hay reportes disponibles.</li>
            @endforelse
        </ul>
    </div>

    <a href="{{ route('admin.dashboard') }}" class="mt-5 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Volver al Dashboard
    </a>
</div>
</x-layouts.app>

