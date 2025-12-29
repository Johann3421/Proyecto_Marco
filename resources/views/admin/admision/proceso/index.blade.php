@extends('layouts.admin')

@section('title', 'Proceso de Admisión')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Proceso de Admisión</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Admisión</li>
                    <li class="breadcrumb-item active">Proceso</li>
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
                    <i class="fas fa-list-ol mr-2"></i>
                    Pasos del Proceso de Admisión
                </h3>
            </div>
            <div class="card-body">
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i>
                    <strong>Nota:</strong> Los pasos del proceso están predefinidos. Puede editar el contenido de cada paso pero no agregar o eliminar pasos.
                </div>

                <div class="row">
                    @foreach($pasos as $paso)
                        <div class="col-md-6 mb-4">
                            <div class="card card-outline card-{{ $paso['color'] }} h-100">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">
                                        <span class="badge badge-{{ $paso['color'] }} badge-lg mr-2">
                                            Paso {{ $paso['numero'] }}
                                        </span>
                                        <strong>{{ $paso['titulo'] }}</strong>
                                    </h5>
                                    <div class="card-tools">
                                        <a href="{{ route('admin.admision.proceso.edit', $paso['numero']) }}"
                                           class="btn btn-warning btn-sm" title="Editar">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="text-center mb-3">
                                        <i class="fas {{ $paso['icono'] }} fa-3x text-{{ $paso['color'] }}"></i>
                                    </div>
                                    <p class="mb-0">{{ $paso['descripcion'] }}</p>
                                </div>
                                <div class="card-footer text-muted small">
                                    <i class="fas fa-palette mr-1"></i> Color: {{ $paso['color'] }}
                                    <span class="mx-2">|</span>
                                    <i class="fas {{ $paso['icono'] }} mr-1"></i> Icono: {{ $paso['icono'] }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="card-footer">
                <div class="text-muted">
                    <i class="fas fa-info-circle"></i> Total de pasos: <strong>{{ count($pasos) }}</strong>
                </div>
            </div>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-eye"></i> Vista Previa del Flujo Completo
                </h3>
            </div>
            <div class="card-body">
                <div class="timeline">
                    @foreach($pasos as $index => $paso)
                        <div>
                            <i class="fas {{ $paso['icono'] }} bg-{{ $paso['color'] }}"></i>
                            <div class="timeline-item">
                                <span class="time">
                                    <i class="fas fa-hashtag"></i> Paso {{ $paso['numero'] }}
                                </span>
                                <h3 class="timeline-header">
                                    <strong>{{ $paso['titulo'] }}</strong>
                                </h3>
                                <div class="timeline-body">
                                    {{ $paso['descripcion'] }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div>
                        <i class="fas fa-flag-checkered bg-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
