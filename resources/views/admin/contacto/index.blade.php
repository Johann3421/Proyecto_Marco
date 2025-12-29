@extends('layouts.admin')

@section('title', 'Mensajes de Contacto')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">
                    <i class="fas fa-inbox text-primary"></i>
                    Mensajes de Contacto
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Contacto</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <!-- Statistics Cards -->
        <div class="row mb-4">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $estadisticas['total'] }}</h3>
                        <p>Total Mensajes</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <a href="{{ route('admin.contacto.index') }}" class="small-box-footer">
                        Ver todos <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $estadisticas['nuevos'] }}</h3>
                        <p>Nuevos</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-bell"></i>
                    </div>
                    <a href="{{ route('admin.contacto.index', ['estado' => 'Nuevo']) }}" class="small-box-footer">
                        Ver nuevos <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{ $estadisticas['en_proceso'] }}</h3>
                        <p>En Proceso</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-tasks"></i>
                    </div>
                    <a href="{{ route('admin.contacto.index', ['estado' => 'En Proceso']) }}" class="small-box-footer">
                        Ver en proceso <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $estadisticas['resueltos'] }}</h3>
                        <p>Resueltos</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <a href="{{ route('admin.contacto.index', ['estado' => 'Resuelto']) }}" class="small-box-footer">
                        Ver resueltos <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="row mb-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="GET" action="{{ route('admin.contacto.index') }}" class="form-inline">
                            <div class="form-group mr-3">
                                <label for="estado" class="mr-2">Estado:</label>
                                <select name="estado" id="estado" class="form-control">
                                    <option value="">Todos</option>
                                    <option value="Nuevo" {{ $estado == 'Nuevo' ? 'selected' : '' }}>Nuevo</option>
                                    <option value="En Proceso" {{ $estado == 'En Proceso' ? 'selected' : '' }}>En Proceso</option>
                                    <option value="Resuelto" {{ $estado == 'Resuelto' ? 'selected' : '' }}>Resuelto</option>
                                    <option value="Archivado" {{ $estado == 'Archivado' ? 'selected' : '' }}>Archivado</option>
                                </select>
                            </div>

                            <div class="form-group mr-3">
                                <label for="tipo" class="mr-2">Tipo:</label>
                                <select name="tipo" id="tipo" class="form-control">
                                    <option value="">Todos</option>
                                    <option value="Admisión" {{ $tipo == 'Admisión' ? 'selected' : '' }}>Admisión</option>
                                    <option value="Académico" {{ $tipo == 'Académico' ? 'selected' : '' }}>Académico</option>
                                    <option value="Posgrado" {{ $tipo == 'Posgrado' ? 'selected' : '' }}>Posgrado</option>
                                    <option value="Investigación" {{ $tipo == 'Investigación' ? 'selected' : '' }}>Investigación</option>
                                    <option value="Biblioteca" {{ $tipo == 'Biblioteca' ? 'selected' : '' }}>Biblioteca</option>
                                    <option value="Otro" {{ $tipo == 'Otro' ? 'selected' : '' }}>Otro</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-filter"></i> Filtrar
                            </button>

                            <a href="{{ route('admin.contacto.index') }}" class="btn btn-secondary ml-2">
                                <i class="fas fa-redo"></i> Limpiar
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Messages List -->
        <div class="row">
            <div class="col-12">
                @if(count($mensajes) > 0)
                    @foreach($mensajes as $index => $mensaje)
                    <div class="card {{ !$mensaje['leido'] ? 'border-primary' : '' }} mb-3">
                        <div class="card-header {{ !$mensaje['leido'] ? 'bg-light' : '' }}">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="mb-1">
                                        @if(!$mensaje['leido'])
                                            <i class="fas fa-circle text-primary" style="font-size: 0.5rem;"></i>
                                        @endif
                                        {{ $mensaje['nombre'] }}
                                        <small class="text-muted">{{ $mensaje['email'] }}</small>
                                    </h5>
                                    <p class="mb-0">
                                        <strong>{{ $mensaje['asunto'] }}</strong>
                                    </p>
                                </div>
                                <div class="text-right">
                                    @if($mensaje['estado'] == 'Nuevo')
                                        <span class="badge badge-warning badge-lg">
                                            <i class="fas fa-bell"></i> {{ $mensaje['estado'] }}
                                        </span>
                                    @elseif($mensaje['estado'] == 'En Proceso')
                                        <span class="badge badge-primary badge-lg">
                                            <i class="fas fa-tasks"></i> {{ $mensaje['estado'] }}
                                        </span>
                                    @elseif($mensaje['estado'] == 'Resuelto')
                                        <span class="badge badge-success badge-lg">
                                            <i class="fas fa-check-circle"></i> {{ $mensaje['estado'] }}
                                        </span>
                                    @else
                                        <span class="badge badge-secondary badge-lg">
                                            <i class="fas fa-archive"></i> {{ $mensaje['estado'] }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <p class="mb-2">{{ Str::limit($mensaje['mensaje'], 200) }}</p>
                                    <small class="text-muted">
                                        <i class="far fa-calendar"></i> {{ \Carbon\Carbon::parse($mensaje['fecha'])->format('d/m/Y H:i') }}
                                        <span class="mx-2">|</span>
                                        <i class="fas fa-tag"></i> {{ $mensaje['tipo_consulta'] }}
                                        <span class="mx-2">|</span>
                                        <i class="fas fa-phone"></i> {{ $mensaje['telefono'] }}
                                    </small>
                                </div>
                                <div class="col-md-3 text-right">
                                    <a href="{{ route('admin.contacto.show', $index) }}" class="btn btn-info btn-sm btn-block mb-1">
                                        <i class="fas fa-eye"></i> Ver Detalles
                                    </a>
                                    @if(!$mensaje['leido'])
                                    <form action="{{ route('admin.contacto.marcarLeido', $index) }}" method="POST" class="d-inline-block w-100">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-outline-primary btn-sm btn-block mb-1">
                                            <i class="fas fa-check"></i> Marcar Leído
                                        </button>
                                    </form>
                                    @endif
                                    <form action="{{ route('admin.contacto.destroy', $index) }}"
                                          method="POST"
                                          onsubmit="return confirm('¿Está seguro de eliminar este mensaje?');"
                                          class="d-inline-block w-100">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm btn-block">
                                            <i class="fas fa-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="card">
                        <div class="card-footer">
                            <div class="text-muted">
                                <i class="fas fa-info-circle"></i>
                                Mostrando <strong>{{ count($mensajes) }}</strong> mensajes
                                @if($estadisticas['no_leidos'] > 0)
                                    | <strong class="text-primary">{{ $estadisticas['no_leidos'] }}</strong> sin leer
                                @endif
                            </div>
                        </div>
                    </div>
                @else
                    <div class="card">
                        <div class="card-body">
                            <div class="alert alert-info text-center mb-0">
                                <i class="fas fa-info-circle fa-3x mb-3"></i>
                                <h4>No hay mensajes</h4>
                                <p class="mb-0">
                                    @if($estado || $tipo)
                                        No se encontraron mensajes con los filtros seleccionados.
                                    @else
                                        Aún no has recibido mensajes de contacto.
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
