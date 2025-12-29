@extends('layouts.admin')

@section('title', 'Detalle del Mensaje')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">
                    <i class="fas fa-envelope-open text-primary"></i>
                    Detalle del Mensaje
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.contacto.index') }}">Contacto</a></li>
                    <li class="breadcrumb-item active">Detalle</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Mensaje Principal -->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="card-title">
                            <i class="fas fa-comment-alt"></i>
                            {{ $mensaje['asunto'] }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <!-- Remitente -->
                        <div class="mb-4 pb-3 border-bottom">
                            <div class="d-flex align-items-center mb-3">
                                <div class="mr-3">
                                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                         style="width: 60px; height: 60px; font-size: 24px;">
                                        {{ strtoupper(substr($mensaje['nombre'], 0, 1)) }}
                                    </div>
                                </div>
                                <div>
                                    <h5 class="mb-1">{{ $mensaje['nombre'] }}</h5>
                                    <p class="mb-0 text-muted">
                                        <i class="fas fa-envelope"></i> {{ $mensaje['email'] }}
                                        @if($mensaje['telefono'] != 'No proporcionado')
                                            <span class="mx-2">|</span>
                                            <i class="fas fa-phone"></i> {{ $mensaje['telefono'] }}
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between text-muted">
                                <small>
                                    <i class="far fa-clock"></i>
                                    {{ \Carbon\Carbon::parse($mensaje['fecha'])->format('d/m/Y H:i:s') }}
                                </small>
                                <small>
                                    <i class="fas fa-tag"></i>
                                    Tipo: <strong>{{ $mensaje['tipo_consulta'] }}</strong>
                                </small>
                            </div>
                        </div>

                        <!-- Mensaje -->
                        <div class="mb-4">
                            <h5 class="mb-3">
                                <i class="fas fa-align-left"></i>
                                Mensaje:
                            </h5>
                            <div class="bg-light p-4 rounded" style="white-space: pre-wrap;">{{ $mensaje['mensaje'] }}</div>
                        </div>

                        <!-- Acciones Rápidas -->
                        <div class="d-flex gap-2">
                            <a href="mailto:{{ $mensaje['email'] }}" class="btn btn-primary">
                                <i class="fas fa-reply"></i> Responder por Email
                            </a>
                            @if($mensaje['telefono'] != 'No proporcionado')
                            <a href="tel:{{ $mensaje['telefono'] }}" class="btn btn-success">
                                <i class="fas fa-phone"></i> Llamar
                            </a>
                            @endif
                            <a href="{{ route('admin.contacto.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Volver
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Notas (Opcional - para futuras implementaciones) -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-sticky-note"></i>
                            Notas Internas
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i>
                            Esta funcionalidad estará disponible próximamente para agregar notas y seguimiento interno.
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Estado -->
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-tasks"></i>
                            Estado del Mensaje
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.contacto.updateEstado', $id) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <label for="estado">Estado Actual:</label>
                                <select name="estado" id="estado" class="form-control">
                                    <option value="Nuevo" {{ $mensaje['estado'] == 'Nuevo' ? 'selected' : '' }}>
                                        Nuevo
                                    </option>
                                    <option value="En Proceso" {{ $mensaje['estado'] == 'En Proceso' ? 'selected' : '' }}>
                                        En Proceso
                                    </option>
                                    <option value="Resuelto" {{ $mensaje['estado'] == 'Resuelto' ? 'selected' : '' }}>
                                        Resuelto
                                    </option>
                                    <option value="Archivado" {{ $mensaje['estado'] == 'Archivado' ? 'selected' : '' }}>
                                        Archivado
                                    </option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="fas fa-save"></i> Actualizar Estado
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Información -->
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-info-circle"></i>
                            Información
                        </h3>
                    </div>
                    <div class="card-body">
                        <dl class="row mb-0">
                            <dt class="col-sm-5">ID:</dt>
                            <dd class="col-sm-7">#{{ $id + 1 }}</dd>

                            <dt class="col-sm-5">Fecha:</dt>
                            <dd class="col-sm-7">{{ \Carbon\Carbon::parse($mensaje['fecha'])->format('d/m/Y') }}</dd>

                            <dt class="col-sm-5">Hora:</dt>
                            <dd class="col-sm-7">{{ \Carbon\Carbon::parse($mensaje['fecha'])->format('H:i:s') }}</dd>

                            <dt class="col-sm-5">Tipo:</dt>
                            <dd class="col-sm-7">
                                <span class="badge badge-info">{{ $mensaje['tipo_consulta'] }}</span>
                            </dd>

                            <dt class="col-sm-5">Estado:</dt>
                            <dd class="col-sm-7">
                                @if($mensaje['estado'] == 'Nuevo')
                                    <span class="badge badge-warning">{{ $mensaje['estado'] }}</span>
                                @elseif($mensaje['estado'] == 'En Proceso')
                                    <span class="badge badge-primary">{{ $mensaje['estado'] }}</span>
                                @elseif($mensaje['estado'] == 'Resuelto')
                                    <span class="badge badge-success">{{ $mensaje['estado'] }}</span>
                                @else
                                    <span class="badge badge-secondary">{{ $mensaje['estado'] }}</span>
                                @endif
                            </dd>

                            <dt class="col-sm-5">Leído:</dt>
                            <dd class="col-sm-7">
                                @if($mensaje['leido'])
                                    <i class="fas fa-check-circle text-success"></i> Sí
                                @else
                                    <i class="fas fa-times-circle text-danger"></i> No
                                @endif
                            </dd>
                        </dl>
                    </div>
                </div>

                <!-- Acciones -->
                <div class="card card-danger card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-cog"></i>
                            Acciones
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.contacto.destroy', $id) }}"
                              method="POST"
                              onsubmit="return confirm('¿Está seguro de eliminar este mensaje?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-block">
                                <i class="fas fa-trash"></i> Eliminar Mensaje
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
