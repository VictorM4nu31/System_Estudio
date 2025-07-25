<x-layouts.app :title="'Eventos'">
    <h1>Listado de Eventos</h1>
    @if(isset($events) && count($events))
        <ul>
            @foreach($events as $event)
                <li><a href="{{ route('teacher.events.show', $event->id) }}">{{ $event->name ?? 'Sin nombre' }}</a></li>
            @endforeach
        </ul>
    @else
        <p>No hay eventos registrados.</p>
    @endif
</x-layouts.app> 