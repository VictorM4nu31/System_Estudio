<x-layouts.app :title="'Detalle de Equipo'">
    <h1>{{ $team->name ?? 'Sin nombre' }}</h1>
    <p><strong>Descripción:</strong> {{ $team->description ?? 'Sin descripción' }}</p>
    <a href="{{ route('teacher.teams.index') }}">Volver al listado</a>
</x-layouts.app> 