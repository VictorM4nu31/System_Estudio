<x-layouts.app :title="'Detalle de Evento'">
    <h1>{{ $event->name ?? 'Sin nombre' }}</h1>
    <p><strong>Descripción:</strong> {{ $event->description ?? 'Sin descripción' }}</p>
    <p><strong>Fecha:</strong> {{ $event->date ?? 'No definida' }}</p>
    <a href="{{ route('teacher.events.index') }}">Volver al listado</a>
</x-layouts.app> 