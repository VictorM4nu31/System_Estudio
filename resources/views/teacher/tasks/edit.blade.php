<x-layouts.app :title="'Editar Tarea'">
    <h1>Editar Tarea</h1>
    <form method="POST" action="{{ route('teacher.tasks.update', $task->id) }}">
        @csrf
        @method('PUT')
        <label for="title">Título:</label>
        <input type="text" name="title" id="title" value="{{ old('title', $task->title) }}" required>
        <br>
        <label for="description">Descripción:</label>
        <textarea name="description" id="description">{{ old('description', $task->description) }}</textarea>
        <br>
        <label for="due_date">Fecha de entrega:</label>
        <input type="date" name="due_date" id="due_date" value="{{ old('due_date', $task->due_date) }}">
        <br>
        <button type="submit">Actualizar</button>
    </form>
    <a href="{{ route('teacher.tasks.index') }}">Volver al listado</a>
</x-layouts.app> 