<x-layouts.app :title="'Crear Tienda'">
    <h1>Crear Nueva Tienda</h1>
    <form method="POST" action="{{ route('teacher.shops.store') }}">
        @csrf
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="guild_id">Gremio (ID):</label>
        <input type="number" name="guild_id" id="guild_id" required>
        <br>
        <label for="description">Descripción:</label>
        <textarea name="description" id="description"></textarea>
        <br>
        <button type="submit">Crear</button>
    </form>
    <a href="{{ route('teacher.shops.index') }}">Volver al listado</a>
</x-layouts.app> 