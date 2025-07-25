<x-layouts.app :title="'Tareas'">
    <h1>Listado de Tareas</h1>
    @if(isset($tasks) && count($tasks))
        <ul>
            @foreach($tasks as $task)
                <li><a href="{{ route('teacher.tasks.show', $task->id) }}">{{ $task->title ?? 'Sin título' }}</a></li>
            @endforeach
        </ul>
    @else
        <p>No hay tareas registradas.</p>
    @endif
</x-layouts.app> 