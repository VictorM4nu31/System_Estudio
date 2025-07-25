<x-layouts.app :title="'Crear Tarea'">
    <h1>Crear Nueva Tarea</h1>
    <form method="POST" action="{{ route('teacher.tasks.store') }}">
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
    <a href="{{ route('teacher.tasks.index') }}">Volver al listado</a>
</x-layouts.app> 