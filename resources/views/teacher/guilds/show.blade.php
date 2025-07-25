<x-layouts.app :title="'Detalle de Gremio'">
    <h1>{{ $guild->name ?? 'Sin nombre' }}</h1>
    <p><strong>Código:</strong> {{ $guild->code ?? 'Sin código' }}</p>
    <p><strong>Descripción:</strong> {{ $guild->description ?? 'Sin descripción' }}</p>
    <a href="{{ route('teacher.guilds.index') }}">Volver al listado</a>
</x-layouts.app> 