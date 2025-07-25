<x-layouts.app :title="'Mensajes'">
    <h1>Listado de Mensajes</h1>
    @if(isset($messages) && count($messages))
        <ul>
            @foreach($messages as $message)
                <li><a href="{{ route('teacher.messages.show', $message->id) }}">{{ $message->content ?? 'Sin contenido' }}</a></li>
            @endforeach
        </ul>
    @else
        <p>No hay mensajes registrados.</p>
    @endif
</x-layouts.app> 