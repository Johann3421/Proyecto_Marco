@extends('layouts.admin')

@section('title', 'Gestión de Facultades')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Gestión de Facultades</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Inicio</a></li>
                    <li class="breadcrumb-item active">Facultades</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <i class="icon fas fa-check"></i> {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <i class="icon fas fa-ban"></i> {{ session('error') }}
        </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-university mr-2"></i>
                    Lista de Facultades
                </h3>
                <div class="card-tools">
                    <a href="{{ route('admin.academico.facultades.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus mr-1"></i> Nueva Facultad
                    </a>
                </div>
            </div>
            <div class="card-body">
                @if(count($facultades) > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th style="width: 60px">ID</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th style="width: 100px">Carreras</th>
                                <th style="width: 120px">Estudiantes</th>
                                <th style="width: 100px">Color</th>
                                <th style="width: 100px">Ícono</th>
                                <th style="width: 180px" class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($facultades as $facultad)
                            <tr>
                                <td class="text-center">{{ $facultad['id'] }}</td>
                                <td>
                                    <strong>{{ $facultad['nombre'] }}</strong>
                                </td>
                                <td>{{ Str::limit($facultad['descripcion'], 60) }}</td>
                                <td class="text-center">
                                    <span class="badge badge-info">{{ $facultad['carreras'] }}</span>
                                </td>
                                <td class="text-center">
                                    <span class="badge badge-success">{{ number_format($facultad['estudiantes']) }}</span>
                                </td>
                                <td class="text-center">
                                    <span class="badge badge-{{ $facultad['color'] }}">{{ $facultad['color'] }}</span>
                                </td>
                                <td class="text-center">
                                    <i class="fas {{ $facultad['icono'] }} fa-lg text-{{ $facultad['color'] }}"></i>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('admin.academico.facultades.edit', $facultad['id']) }}"
                                           class="btn btn-sm btn-info" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.academico.facultades.destroy', $facultad['id']) }}"
                                              method="POST"
                                              onsubmit="return confirm('¿Está seguro de eliminar esta facultad?')"
                                              class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Eliminar">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="alert alert-info">
                    <i class="icon fas fa-info-circle"></i>
                    No hay facultades registradas. <a href="{{ route('admin.academico.facultades.create') }}">Crear la primera facultad</a>
                </div>
                @endif
            </div>
            <div class="card-footer">
                <small class="text-muted">
                    <i class="fas fa-info-circle"></i> Total de facultades: <strong>{{ count($facultades) }}</strong>
                </small>
            </div>
        </div>

        <!-- Información adicional -->
        <div class="row">
            <div class="col-md-4">
                <div class="info-box bg-gradient-info">
                    <span class="info-box-icon"><i class="fas fa-university"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Facultades</span>
                        <span class="info-box-number">{{ count($facultades) }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box bg-gradient-success">
                    <span class="info-box-icon"><i class="fas fa-graduation-cap"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Carreras</span>
                        <span class="info-box-number">{{ array_sum(array_column($facultades, 'carreras')) }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box bg-gradient-warning">
                    <span class="info-box-icon"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Estudiantes</span>
                        <span class="info-box-number">{{ number_format(array_sum(array_column($facultades, 'estudiantes'))) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
