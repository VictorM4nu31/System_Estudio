<x-layouts.app :title="'Editar Tienda'">
    <h1>Editar Tienda</h1>
    <form method="POST" action="{{ route('teacher.shops.update', $shop->id) }}">
        @csrf
        @method('PUT')
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" value="{{ old('name', $shop->name) }}" required>
        <br>
        <label for="guild_id">Gremio (ID):</label>
        <input type="number" name="guild_id" id="guild_id" value="{{ old('guild_id', $shop->guild_id) }}" required>
        <br>
        <label for="description">Descripción:</label>
        <textarea name="description" id="description">{{ old('description', $shop->description) }}</textarea>
        <br>
        <button type="submit">Actualizar</button>
    </form>
    <a href="{{ route('teacher.shops.index') }}">Volver al listado</a>
</x-layouts.app> 