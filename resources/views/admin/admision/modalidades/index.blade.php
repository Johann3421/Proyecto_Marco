@extends('layouts.admin')

@section('title', 'Modalidades de Admisión')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Modalidades de Admisión</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Admisión</li>
                    <li class="breadcrumb-item active">Modalidades</li>
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
                    <i class="fas fa-door-open mr-2"></i>
                    Lista de Modalidades de Ingreso
                </h3>
                <div class="card-tools">
                    <a href="{{ route('admin.admision.modalidades.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Nueva Modalidad
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 50px">#</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Vacantes</th>
                                <th>Fecha Examen</th>
                                <th style="width: 80px">Color</th>
                                <th style="width: 150px">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($modalidades as $modalidad)
                                <tr>
                                    <td>{{ $modalidad['id'] }}</td>
                                    <td>
                                        <strong>{{ $modalidad['nombre'] }}</strong>
                                    </td>
                                    <td>{{ Str::limit($modalidad['descripcion'], 80) }}</td>
                                    <td>
                                        <span class="badge badge-info">{{ $modalidad['vacantes'] }}</span>
                                    </td>
                                    <td>
                                        <i class="fas fa-calendar mr-1"></i>{{ $modalidad['fecha_examen'] }}
                                    </td>
                                    <td class="text-center">
                                        <span class="badge badge-{{ $modalidad['color'] }} badge-lg p-2">
                                            {{ $modalidad['color'] }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('admin.admision.modalidades.edit', $modalidad['id']) }}"
                                               class="btn btn-warning" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.admision.modalidades.destroy', $modalidad['id']) }}"
                                                  method="POST"
                                                  style="display: inline;"
                                                  onsubmit="return confirm('¿Está seguro de eliminar esta modalidad?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" title="Eliminar">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">
                                        <p class="text-muted my-3">No hay modalidades registradas</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <div class="text-muted">
                    <i class="fas fa-info-circle"></i> Total de modalidades: <strong>{{ count($modalidades) }}</strong>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
