<x-layouts.app :title="'Crear Mensaje'">
    <h1>Crear Nuevo Mensaje</h1>
    <form method="POST" action="{{ route('teacher.messages.store') }}">
        @csrf
        <label for="content">Contenido:</label>
        <textarea name="content" id="content" required></textarea>
        <br>
        <label for="recipient_id">Destinatario (ID):</label>
        <input type="number" name="recipient_id" id="recipient_id" required>
        <br>
        <label for="guild_id">Gremio (ID):</label>
        <input type="number" name="guild_id" id="guild_id" required>
        <br>
        <button type="submit">Enviar</button>
    </form>
    <a href="{{ route('teacher.messages.index') }}">Volver al listado</a>
</x-layouts.app> 