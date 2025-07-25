<x-layouts.app :title="'Detalle de Recompensa'">
    <h1>{{ $reward->name ?? 'Sin nombre' }}</h1>
    <p><strong>Descripción:</strong> {{ $reward->description ?? 'Sin descripción' }}</p>
    <p><strong>Costo:</strong> {{ $reward->cost ?? 'No definido' }}</p>
    <a href="{{ route('teacher.rewards.index') }}">Volver al listado</a>
</x-layouts.app> 