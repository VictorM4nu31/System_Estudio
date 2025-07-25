<x-layouts.app :title="'Recompensas'">
    <h1>Listado de Recompensas</h1>
    @if(isset($rewards) && count($rewards))
        <ul>
            @foreach($rewards as $reward)
                <li><a href="{{ route('teacher.rewards.show', $reward->id) }}">{{ $reward->name ?? 'Sin nombre' }}</a></li>
            @endforeach
        </ul>
    @else
        <p>No hay recompensas registradas.</p>
    @endif
</x-layouts.app> 