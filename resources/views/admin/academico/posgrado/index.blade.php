@extends('layouts.admin')

@section('title', 'Gestión de Programas de Posgrado')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Gestión de Programas de Posgrado</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Inicio</a></li>
                    <li class="breadcrumb-item active">Posgrado</li>
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

        <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="posgrado-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="maestrias-tab" data-toggle="pill" href="#maestrias" role="tab">
                            <i class="fas fa-graduation-cap mr-2"></i>Maestrías ({{ count($programas['maestrias']) }})
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="doctorados-tab" data-toggle="pill" href="#doctorados" role="tab">
                            <i class="fas fa-user-graduate mr-2"></i>Doctorados ({{ count($programas['doctorados']) }})
                        </a>
                    </li>
                </ul>
                <div class="card-tools mt-2 mr-2">
                    <a href="{{ route('admin.academico.posgrado.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus mr-1"></i> Nuevo Programa
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content" id="posgrado-tabsContent">
                    <!-- TAB MAESTRÍAS -->
                    <div class="tab-pane fade show active" id="maestrias" role="tabpanel">
                        @if(count($programas['maestrias']) > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="width: 60px">ID</th>
                                        <th>Nombre del Programa</th>
                                        <th style="width: 100px">Duración</th>
                                        <th style="width: 150px">Modalidad</th>
                                        <th style="width: 100px">Créditos</th>
                                        <th style="width: 180px" class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($programas['maestrias'] as $maestria)
                                    <tr>
                                        <td class="text-center">{{ $maestria['id'] }}</td>
                                        <td>
                                            <strong>{{ $maestria['nombre'] }}</strong>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge badge-info">{{ $maestria['duracion'] }}</span>
                                        </td>
                                        <td>
                                            @php
                                                $modalidadBadge = match($maestria['modalidad']) {
                                                    'Presencial' => 'success',
                                                    'Semi-presencial' => 'warning',
                                                    'Virtual' => 'primary',
                                                    default => 'secondary'
                                                };
                                            @endphp
                                            <span class="badge badge-{{ $modalidadBadge }}">{{ $maestria['modalidad'] }}</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge badge-dark">{{ $maestria['creditos'] }}</span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="{{ route('admin.academico.posgrado.edit', $maestria['id']) }}"
                                                   class="btn btn-sm btn-info" title="Editar">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.academico.posgrado.destroy', $maestria['id']) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('¿Está seguro de eliminar este programa?')"
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
                            No hay programas de maestría registrados. <a href="{{ route('admin.academico.posgrado.create') }}">Crear el primer programa</a>
                        </div>
                        @endif
                    </div>

                    <!-- TAB DOCTORADOS -->
                    <div class="tab-pane fade" id="doctorados" role="tabpanel">
                        @if(count($programas['doctorados']) > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="width: 60px">ID</th>
                                        <th>Nombre del Programa</th>
                                        <th style="width: 100px">Duración</th>
                                        <th style="width: 150px">Modalidad</th>
                                        <th>Líneas de Investigación</th>
                                        <th style="width: 180px" class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($programas['doctorados'] as $doctorado)
                                    <tr>
                                        <td class="text-center">{{ $doctorado['id'] }}</td>
                                        <td>
                                            <strong>{{ $doctorado['nombre'] }}</strong>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge badge-info">{{ $doctorado['duracion'] }}</span>
                                        </td>
                                        <td>
                                            @php
                                                $modalidadBadge = match($doctorado['modalidad']) {
                                                    'Presencial' => 'success',
                                                    'Semi-presencial' => 'warning',
                                                    'Virtual' => 'primary',
                                                    default => 'secondary'
                                                };
                                            @endphp
                                            <span class="badge badge-{{ $modalidadBadge }}">{{ $doctorado['modalidad'] }}</span>
                                        </td>
                                        <td>
                                            @foreach($doctorado['lineas_investigacion'] as $linea)
                                            <span class="badge badge-secondary mr-1 mb-1">{{ $linea }}</span>
                                            @endforeach
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="{{ route('admin.academico.posgrado.edit', $doctorado['id']) }}"
                                                   class="btn btn-sm btn-info" title="Editar">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.academico.posgrado.destroy', $doctorado['id']) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('¿Está seguro de eliminar este programa?')"
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
                            No hay programas de doctorado registrados. <a href="{{ route('admin.academico.posgrado.create') }}">Crear el primer programa</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Estadísticas -->
        <div class="row">
            <div class="col-md-6">
                <div class="info-box bg-gradient-primary">
                    <span class="info-box-icon"><i class="fas fa-graduation-cap"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Maestrías</span>
                        <span class="info-box-number">{{ count($programas['maestrias']) }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-box bg-gradient-success">
                    <span class="info-box-icon"><i class="fas fa-user-graduate"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Doctorados</span>
                        <span class="info-box-number">{{ count($programas['doctorados']) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
