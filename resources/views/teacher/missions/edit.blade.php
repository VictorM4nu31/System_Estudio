<x-layouts.app :title="'Editar Misión'">
    <h1>Editar Misión</h1>
    <form method="POST" action="{{ route('teacher.missions.update', $mission->id) }}">
        @csrf
        @method('PUT')
        <label for="title">Título:</label>
        <input type="text" name="title" id="title" value="{{ old('title', $mission->title) }}" required>
        <br>
        <label for="description">Descripción:</label>
        <textarea name="description" id="description">{{ old('description', $mission->description) }}</textarea>
        <br>
        <label for="due_date">Fecha de entrega:</label>
        <input type="date" name="due_date" id="due_date" value="{{ old('due_date', $mission->due_date ? \Carbon\Carbon::parse($mission->due_date)->format('Y-m-d') : null) }}">
        <br>
        <button type="submit">Actualizar</button>
    </form>
    <a href="{{ route('teacher.missions.index') }}">Volver al listado</a>
</x-layouts.app> 