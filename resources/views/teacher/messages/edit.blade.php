<x-layouts.app :title="'Editar Mensaje'">
    <h1>Editar Mensaje</h1>
    <form method="POST" action="{{ route('teacher.messages.update', $message->id) }}">
        @csrf
        @method('PUT')
        <label for="content">Contenido:</label>
        <textarea name="content" id="content" required>{{ old('content', $message->content) }}</textarea>
        <br>
        <label for="recipient_id">Destinatario (ID):</label>
        <input type="number" name="recipient_id" id="recipient_id" value="{{ old('recipient_id', $message->recipient_id) }}" required>
        <br>
        <label for="guild_id">Gremio (ID):</label>
        <input type="number" name="guild_id" id="guild_id" value="{{ old('guild_id', $message->guild_id) }}" required>
        <br>
        <button type="submit">Actualizar</button>
    </form>
    <a href="{{ route('teacher.messages.index') }}">Volver al listado</a>
</x-layouts.app> 