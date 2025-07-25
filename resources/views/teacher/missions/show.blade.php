<x-layouts.app :title="'Detalle de Misión'">
    <h1>{{ $mission->title ?? 'Sin título' }}</h1>
    <p><strong>Descripción:</strong> {{ $mission->description ?? 'Sin descripción' }}</p>
    <p><strong>Fecha de entrega:</strong> {{ $mission->due_date ?? 'No definida' }}</p>
    <a href="{{ route('teacher.missions.index') }}">Volver al listado</a>
</x-layouts.app> 