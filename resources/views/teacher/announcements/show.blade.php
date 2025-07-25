<x-layouts.app :title="'Detalle de Anuncio'">
    <h1>{{ $announcement->title ?? 'Sin título' }}</h1>
    <p><strong>Contenido:</strong> {{ $announcement->content ?? 'Sin contenido' }}</p>
    <a href="{{ route('teacher.announcements.index') }}">Volver al listado</a>
</x-layouts.app> 