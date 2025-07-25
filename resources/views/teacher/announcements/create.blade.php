<x-layouts.app :title="'Crear Anuncio'">
    <h1>Crear Nuevo Anuncio</h1>
    <form method="POST" action="{{ route('teacher.announcements.store') }}">
        @csrf
        <label for="title">Título:</label>
        <input type="text" name="title" id="title" required>
        <br>
        <label for="content">Contenido:</label>
        <textarea name="content" id="content" required></textarea>
        <br>
        <button type="submit">Crear</button>
    </form>
    <a href="{{ route('teacher.announcements.index') }}">Volver al listado</a>
</x-layouts.app> 