<x-layouts.app :title="'Crear Evento'">
    <h1>Crear Nuevo Evento</h1>
    <form method="POST" action="{{ route('teacher.events.store') }}">
        @csrf
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="description">Descripción:</label>
        <textarea name="description" id="description"></textarea>
        <br>
        <label for="date">Fecha:</label>
        <input type="date" name="date" id="date" required>
        <br>
        <button type="submit">Crear</button>
    </form>
    <a href="{{ route('teacher.events.index') }}">Volver al listado</a>
</x-layouts.app> 