<x-layouts.app :title="'Equipos'">
    <h1>Listado de Equipos</h1>
    @if(isset($teams) && count($teams))
        <ul>
            @foreach($teams as $team)
                <li><a href="{{ route('teacher.teams.show', $team->id) }}">{{ $team->name ?? 'Sin nombre' }}</a></li>
            @endforeach
        </ul>
    @else
        <p>No hay equipos registrados.</p>
    @endif
</x-layouts.app> 