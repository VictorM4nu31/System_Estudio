<x-layouts.app :title="'Editar Gremio'">
    <h1>Editar Gremio</h1>
    <form method="POST" action="{{ route('teacher.guilds.update', $guild->id) }}">
        @csrf
        @method('PUT')
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" value="{{ old('name', $guild->name) }}" required>
        <br>
        <label for="code">Código:</label>
        <input type="text" name="code" id="code" value="{{ old('code', $guild->code) }}" required>
        <br>
        <label for="description">Descripción:</label>
        <textarea name="description" id="description">{{ old('description', $guild->description) }}</textarea>
        <br>
        <button type="submit">Actualizar</button>
    </form>
    <a href="{{ route('teacher.guilds.index') }}">Volver al listado</a>
</x-layouts.app> 