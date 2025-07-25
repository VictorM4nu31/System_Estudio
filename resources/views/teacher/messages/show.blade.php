<x-layouts.app :title="'Detalle de Mensaje'">
    <h1>Mensaje</h1>
    <p><strong>Contenido:</strong> {{ $message->content ?? 'Sin contenido' }}</p>
    <a href="{{ route('teacher.messages.index') }}">Volver al listado</a>
</x-layouts.app> 