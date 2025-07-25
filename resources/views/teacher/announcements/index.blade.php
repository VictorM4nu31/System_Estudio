<x-layouts.app :title="'Anuncios'">
    <h1>Listado de Anuncios</h1>
    @if(isset($announcements) && count($announcements))
        <ul>
            @foreach($announcements as $announcement)
                <li><a href="{{ route('teacher.announcements.show', $announcement->id) }}">{{ $announcement->title ?? 'Sin título' }}</a></li>
            @endforeach
        </ul>
    @else
        <p>No hay anuncios registrados.</p>
    @endif
</x-layouts.app> 