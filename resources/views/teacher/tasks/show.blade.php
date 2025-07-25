<x-layouts.app :title="'Detalle de Tarea'">
    <h1>{{ $task->title ?? 'Sin título' }}</h1>
    <p><strong>Descripción:</strong> {{ $task->description ?? 'Sin descripción' }}</p>
    <p><strong>Fecha de entrega:</strong> {{ $task->due_date ?? 'No definida' }}</p>
    <a href="{{ route('teacher.tasks.index') }}">Volver al listado</a>
</x-layouts.app> 