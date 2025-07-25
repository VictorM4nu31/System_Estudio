<x-layouts.app :title="'Editar Anuncio'">
    <h1>Editar Anuncio</h1>
    <form method="POST" action="{{ route('teacher.announcements.update', $announcement->id) }}">
        @csrf
        @method('PUT')
        <label for="title">Título:</label>
        <input type="text" name="title" id="title" value="{{ old('title', $announcement->title) }}" required>
        <br>
        <label for="content">Contenido:</label>
        <textarea name="content" id="content" required>{{ old('content', $announcement->content) }}</textarea>
        <br>
        <button type="submit">Actualizar</button>
    </form>
    <a href="{{ route('teacher.announcements.index') }}">Volver al listado</a>
</x-layouts.app> 