<x-layouts.app :title="'Detalle de Tienda'">
    <h1>{{ $shop->name ?? 'Sin nombre' }}</h1>
    <p><strong>Descripción:</strong> {{ $shop->description ?? 'Sin descripción' }}</p>
    <a href="{{ route('teacher.shops.index') }}">Volver al listado</a>
</x-layouts.app> 