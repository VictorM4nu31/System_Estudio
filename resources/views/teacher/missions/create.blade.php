<x-layouts.app :title="'Crear Misión'">
    <h1>Crear Nueva Misión</h1>
    <form method="POST" action="{{ route('teacher.missions.store') }}">
        @csrf
        <label for="title">Título:</label>
        <input type="text" name="title" id="title" required>
        <br>
        <label for="description">Descripción:</label>
        <textarea name="description" id="description"></textarea>
        <br>
        <label for="due_date">Fecha de entrega:</label>
        <input type="date" name="due_date" id="due_date">
        <br>
        <button type="submit">Crear</button>
    </form>
    <a href="{{ route('teacher.missions.index') }}">Volver al listado</a>
</x-layouts.app> 