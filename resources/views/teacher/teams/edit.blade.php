<x-layouts.app :title="'Editar Equipo'">
    <h1>Editar Equipo</h1>
    <form method="POST" action="{{ route('teacher.teams.update', $team->id) }}">
        @csrf
        @method('PUT')
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" value="{{ old('name', $team->name) }}" required>
        <br>
        <label for="description">Descripción:</label>
        <textarea name="description" id="description">{{ old('description', $team->description) }}</textarea>
        <br>
        <button type="submit">Actualizar</button>
    </form>
    <a href="{{ route('teacher.teams.index') }}">Volver al listado</a>
</x-layouts.app> 