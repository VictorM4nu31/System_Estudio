@extends('layouts.admin')

@section('title', 'Revisar Contenido')

@section('content')
    <div class="container mt-4">
        <h1>Revisar Contenido</h1>

        <div class="card mb-4">
            <div class="card-header">
                Detalles del Contenido
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $contenido->titulo }}</h5>
                <p class="card-text">{{ $contenido->descripcion }}</p>
                <p class="card-text">
                    <small class="text-muted">Publicado por: {{ $contenido->usuario->nombre }}</small>
                </p>
            </div>
        </div>

        @can('aprobar', $contenido)
            <a href="{{ route('admin.moderation.approve', $contenido) }}" class="btn btn-success">Aprobar</a>
        @endcan
        @can('rechazar', $contenido)
            <a href="{{ route('admin.moderation.reject', $contenido) }}" class="btn btn-danger">Rechazar</a>
        @endcan
        <a href="{{ route('admin.moderation.index') }}" class="btn btn-secondary">Volver</a>
    </div>
@endsection

