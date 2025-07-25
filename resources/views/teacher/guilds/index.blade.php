<x-layouts.app :title="'Gremios'">
    <h1>Listado de Gremios</h1>
    @if(isset($guilds) && count($guilds))
        <ul>
            @foreach($guilds as $guild)
                <li><a href="{{ route('teacher.guilds.show', $guild->id) }}">{{ $guild->name ?? 'Sin nombre' }}</a></li>
            @endforeach
        </ul>
    @else
        <p>No hay gremios registrados.</p>
    @endif
</x-layouts.app> 