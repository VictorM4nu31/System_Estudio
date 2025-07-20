@extends('layouts.admin')

@section('title', 'Moderación de Contenido')

@section('content')
<div class="container mt-4">
    <h1>Moderación de Contenido</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Usuario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pendientes as $contenido)
            <tr>
                <td>{{ $contenido->id }}</td>
                <td>{{ $contenido->titulo }}</td>
                <td>{{ $contenido->usuario->nombre }}</td>
                <td>
                    @can('aprobar', $contenido)
                    <a href="{{ route('admin.moderation.approve', $contenido) }}" class="btn btn-success">Aprobar</a>
                    @endcan
                    @can('rechazar', $contenido)
                    <a href="{{ route('admin.moderation.reject', $contenido) }}" class="btn btn-danger">Rechazar</a>
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

