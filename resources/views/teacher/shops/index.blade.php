<x-layouts.app :title="'Tiendas'">
    <h1>Listado de Tiendas</h1>
    @if(isset($shops) && count($shops))
        <ul>
            @foreach($shops as $shop)
                <li><a href="{{ route('teacher.shops.show', $shop->id) }}">{{ $shop->name ?? 'Sin nombre' }}</a></li>
            @endforeach
        </ul>
    @else
        <p>No hay tiendas registradas.</p>
    @endif
</x-layouts.app> 