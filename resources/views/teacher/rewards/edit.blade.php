<x-layouts.app :title="'Editar Recompensa'">
    <h1>Editar Recompensa</h1>
    <form method="POST" action="{{ route('teacher.rewards.update', $reward->id) }}">
        @csrf
        @method('PUT')
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" value="{{ old('name', $reward->name) }}" required>
        <br>
        <label for="shop_id">Tienda (ID):</label>
        <input type="number" name="shop_id" id="shop_id" value="{{ old('shop_id', $reward->shop_id) }}" required>
        <br>
        <label for="guild_id">Gremio (ID):</label>
        <input type="number" name="guild_id" id="guild_id" value="{{ old('guild_id', $reward->guild_id) }}" required>
        <br>
        <label for="description">Descripción:</label>
        <textarea name="description" id="description">{{ old('description', $reward->description) }}</textarea>
        <br>
        <label for="cost">Costo:</label>
        <input type="number" name="cost" id="cost" value="{{ old('cost', $reward->cost) }}" required>
        <br>
        <button type="submit">Actualizar</button>
    </form>
    <a href="{{ route('teacher.rewards.index') }}">Volver al listado</a>
</x-layouts.app> 