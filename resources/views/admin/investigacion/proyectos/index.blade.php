@extends('layouts.admin')

@section('title', 'Proyectos de Investigación')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Proyectos de Investigación</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Proyectos</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-12">
                <a href="{{ route('admin.investigacion.proyectos.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Nuevo Proyecto
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                @if(count($proyectos) > 0)
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-project-diagram mr-2"></i>
                                Lista de Proyectos
                            </h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 80px">Imagen</th>
                                            <th>Título</th>
                                            <th>Investigador Principal</th>
                                            <th>Línea</th>
                                            <th>Financiamiento</th>
                                            <th>Estado</th>
                                            <th>Destacado</th>
                                            <th style="width: 140px">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($proyectos as $index => $proyecto)
                                        <tr>
                                            <td>
                                                <img src="{{ $proyecto['imagen'] }}"
                                                     alt="{{ $proyecto['titulo'] }}"
                                                     class="img-thumbnail"
                                                     style="width: 60px; height: 60px; object-fit: cover;">
                                            </td>
                                            <td>
                                                <strong>{{ $proyecto['titulo'] }}</strong>
                                                <br>
                                                <small class="text-muted">
                                                    <i class="far fa-clock"></i> {{ $proyecto['duracion'] }}
                                                </small>
                                            </td>
                                            <td>{{ $proyecto['investigador_principal'] }}</td>
                                            <td>
                                                <span class="badge badge-info">
                                                    {{ $proyecto['linea'] }}
                                                </span>
                                            </td>
                                            <td>
                                                <strong class="text-success">
                                                    {{ $proyecto['financiamiento'] }}
                                                </strong>
                                            </td>
                                            <td>
                                                @if($proyecto['estado'] == 'En Curso')
                                                    <span class="badge badge-primary">{{ $proyecto['estado'] }}</span>
                                                @elseif($proyecto['estado'] == 'Completado')
                                                    <span class="badge badge-success">{{ $proyecto['estado'] }}</span>
                                                @else
                                                    <span class="badge badge-warning">{{ $proyecto['estado'] }}</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($proyecto['destacado'])
                                                    <i class="fas fa-star text-warning" title="Proyecto destacado"></i>
                                                @else
                                                    <i class="far fa-star text-muted" title="No destacado"></i>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.investigacion.proyectos.edit', $index) }}"
                                                       class="btn btn-sm btn-info"
                                                       title="Editar">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('admin.investigacion.proyectos.destroy', $index) }}"
                                                          method="POST"
                                                          class="d-inline"
                                                          onsubmit="return confirm('¿Está seguro de eliminar este proyecto?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                                class="btn btn-sm btn-danger"
                                                                title="Eliminar">
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
                        </div>
                        <div class="card-footer">
                            <div class="text-muted">
                                <i class="fas fa-info-circle"></i>
                                Total de proyectos: <strong>{{ count($proyectos) }}</strong>
                                | Destacados: <strong>{{ count(array_filter($proyectos, fn($p) => $p['destacado'])) }}</strong>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="alert alert-info">
                        <h5><i class="icon fas fa-info"></i> No hay proyectos registrados</h5>
                        Comience creando su primer proyecto de investigación.
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
