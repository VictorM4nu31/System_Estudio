<x-layouts.app :title="'Crear Equipo'">
    <h1>Crear Nuevo Equipo</h1>
    <form method="POST" action="{{ route('teacher.teams.store') }}">
        @csrf
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="description">Descripción:</label>
        <textarea name="description" id="description"></textarea>
        <br>
        <button type="submit">Crear</button>
    </form>
    <a href="{{ route('teacher.teams.index') }}">Volver al listado</a>
</x-layouts.app> 