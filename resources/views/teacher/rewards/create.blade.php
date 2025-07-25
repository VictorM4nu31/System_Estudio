<x-layouts.app :title="'Crear Recompensa'">
    <h1>Crear Nueva Recompensa</h1>
    <form method="POST" action="{{ route('teacher.rewards.store') }}">
        @csrf
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="shop_id">Tienda (ID):</label>
        <input type="number" name="shop_id" id="shop_id" required>
        <br>
        <label for="guild_id">Gremio (ID):</label>
        <input type="number" name="guild_id" id="guild_id" required>
        <br>
        <label for="description">Descripción:</label>
        <textarea name="description" id="description"></textarea>
        <br>
        <label for="cost">Costo:</label>
        <input type="number" name="cost" id="cost" required>
        <br>
        <button type="submit">Crear</button>
    </form>
    <a href="{{ route('teacher.rewards.index') }}">Volver al listado</a>
</x-layouts.app> 