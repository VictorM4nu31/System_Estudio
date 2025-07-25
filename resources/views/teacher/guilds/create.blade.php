<x-layouts.app :title="'Crear Gremio'">
    <h1>Crear Nuevo Gremio</h1>
    <form method="POST" action="{{ route('teacher.guilds.store') }}">
        @csrf
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="code">Código:</label>
        <input type="text" name="code" id="code" required>
        <br>
        <label for="description">Descripción:</label>
        <textarea name="description" id="description"></textarea>
        <br>
        <button type="submit">Crear</button>
    </form>
    <a href="{{ route('teacher.guilds.index') }}">Volver al listado</a>
</x-layouts.app> 