<x-layouts.app :title="'Editar Evento'">
    <h1>Editar Evento</h1>
    <form method="POST" action="{{ route('teacher.events.update', $event->id) }}">
        @csrf
        @method('PUT')
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" value="{{ old('name', $event->name) }}" required>
        <br>
        <label for="description">Descripción:</label>
        <textarea name="description" id="description">{{ old('description', $event->description) }}</textarea>
        <br>
        <label for="date">Fecha:</label>
        <input type="date" name="date" id="date" value="{{ old('date', $event->date) }}" required>
        <br>
        <button type="submit">Actualizar</button>
    </form>
    <a href="{{ route('teacher.events.index') }}">Volver al listado</a>
</x-layouts.app> 