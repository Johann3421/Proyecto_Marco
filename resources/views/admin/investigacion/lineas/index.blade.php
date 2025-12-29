@extends('layouts.admin')

@section('title', 'Líneas de Investigación')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Líneas de Investigación</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Investigación</li>
                    <li class="breadcrumb-item active">Líneas</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <i class="icon fas fa-check"></i> {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-stream mr-2"></i>
                    Lista de Líneas de Investigación
                </h3>
                <div class="card-tools">
                    <a href="{{ route('admin.investigacion.lineas.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Nueva Línea
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    @forelse($lineas as $linea)
                        <div class="col-md-6 mb-4">
                            <div class="card card-outline card-{{ $linea['color'] }} h-100">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">
                                        <i class="fas {{ $linea['icono'] }} text-{{ $linea['color'] }} mr-2"></i>
                                        <strong>{{ $linea['nombre'] }}</strong>
                                    </h5>
                                    <div class="card-tools">
                                        <span class="badge badge-{{ $linea['color'] }}">
                                            {{ $linea['proyectos_activos'] }} proyectos
                                        </span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="mb-3">{{ $linea['descripcion'] }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <span class="badge badge-light">
                                                <i class="fas fa-palette mr-1"></i>{{ $linea['color'] }}
                                            </span>
                                            <span class="badge badge-light ml-1">
                                                <i class="fas {{ $linea['icono'] }} mr-1"></i>{{ $linea['icono'] }}
                                            </span>
                                        </div>
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('admin.investigacion.lineas.edit', $linea['id']) }}"
                                               class="btn btn-warning" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.investigacion.lineas.destroy', $linea['id']) }}"
                                                  method="POST"
                                                  style="display: inline;"
                                                  onsubmit="return confirm('¿Está seguro de eliminar esta línea de investigación?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" title="Eliminar">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle"></i> No hay líneas de investigación registradas
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
            <div class="card-footer">
                <div class="text-muted">
                    <i class="fas fa-info-circle"></i> Total de líneas: <strong>{{ count($lineas) }}</strong>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
