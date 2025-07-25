<x-layouts.app :title="'Misiones'">
    <h1>Listado de Misiones</h1>
    @if(isset($missions) && count($missions))
        <ul>
            @foreach($missions as $mission)
                <li><a href="{{ route('teacher.missions.show', $mission->id) }}">{{ $mission->title ?? 'Sin título' }}</a></li>
            @endforeach
        </ul>
    @else
        <p>No hay misiones registradas.</p>
    @endif
</x-layouts.app> 