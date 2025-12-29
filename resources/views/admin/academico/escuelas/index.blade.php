@extends('layouts.admin')

@section('title', 'Gestión de Escuelas Profesionales')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Gestión de Escuelas Profesionales</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Inicio</a></li>
                    <li class="breadcrumb-item active">Escuelas Profesionales</li>
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
                    <i class="fas fa-graduation-cap mr-2"></i>
                    Lista de Escuelas Profesionales
                </h3>
                <div class="card-tools">
                    <a href="{{ route('admin.academico.escuelas.create') }}" class="btn btn-success btn-sm">
                        <i class="fas fa-plus mr-1"></i> Nueva Escuela Profesional
                    </a>
                </div>
            </div>
            <div class="card-body">
                @if(count($escuelas) > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th style="width: 60px">ID</th>
                                <th>Nombre</th>
                                <th>Área</th>
                                <th>Facultad</th>
                                <th style="width: 100px">Duración</th>
                                <th>Grado</th>
                                <th style="width: 120px">Estudiantes</th>
                                <th style="width: 180px" class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($escuelas as $escuela)
                            <tr>
                                <td class="text-center">{{ $escuela['id'] }}</td>
                                <td>
                                    <strong>{{ $escuela['nombre'] }}</strong>
                                </td>
                                <td>
                                    @php
                                        $areaBadgeClass = match($escuela['area']) {
                                            'Ciencias de la Salud' => 'danger',
                                            'Ingenierías' => 'primary',
                                            'Ciencias Sociales y Humanidades' => 'info',
                                            'Ciencias Económicas y de Gestión' => 'warning',
                                            'Ciencias Básicas' => 'success',
                                            'Arte y Diseño' => 'secondary',
                                            default => 'dark'
                                        };
                                    @endphp
                                    <span class="badge badge-{{ $areaBadgeClass }}">{{ $escuela['area'] }}</span>
                                </td>
                                <td>{{ $escuela['facultad'] }}</td>
                                <td class="text-center">
                                    <span class="badge badge-info">{{ $escuela['duracion'] }}</span>
                                </td>
                                <td>{{ $escuela['grado'] }}</td>
                                <td class="text-center">
                                    <span class="badge badge-success">{{ number_format($escuela['estudiantes']) }}</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('admin.academico.escuelas.edit', $escuela['id']) }}"
                                           class="btn btn-sm btn-info" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.academico.escuelas.destroy', $escuela['id']) }}"
                                              method="POST"
                                              onsubmit="return confirm('¿Está seguro de eliminar esta escuela profesional?')"
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
                    No hay escuelas profesionales registradas. <a href="{{ route('admin.academico.escuelas.create') }}">Crear la primera escuela</a>
                </div>
                @endif
            </div>
            <div class="card-footer">
                <small class="text-muted">
                    <i class="fas fa-info-circle"></i> Total de escuelas profesionales: <strong>{{ count($escuelas) }}</strong>
                </small>
            </div>
        </div>

        <!-- Estadísticas por área -->
        <div class="row">
            @php
                $areas = collect($escuelas)->groupBy('area');
            @endphp
            @foreach($areas as $area => $escuelasArea)
            <div class="col-md-4 col-sm-6">
                <div class="info-box">
                    @php
                        $areaColor = match($area) {
                            'Ciencias de la Salud' => 'danger',
                            'Ingenierías' => 'primary',
                            'Ciencias Sociales y Humanidades' => 'info',
                            'Ciencias Económicas y de Gestión' => 'warning',
                            'Ciencias Básicas' => 'success',
                            'Arte y Diseño' => 'secondary',
                            default => 'dark'
                        };
                    @endphp
                    <span class="info-box-icon bg-{{ $areaColor }}">
                        <i class="fas fa-graduation-cap"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">{{ $area }}</span>
                        <span class="info-box-number">{{ $escuelasArea->count() }} escuelas</span>
                        <span class="progress-description text-muted">
                            {{ number_format($escuelasArea->sum('estudiantes')) }} estudiantes
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
