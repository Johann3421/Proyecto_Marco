@extends('layouts.admin')

@section('title', 'Editar Evento')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Editar Evento</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.admision.calendario.index') }}">Calendario</a></li>
                    <li class="breadcrumb-item active">Editar</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <form action="{{ route('admin.admision.calendario.update', $evento['id']) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-calendar-alt mr-2"></i>
                                Detalles del Evento
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mes">Mes <span class="text-danger">*</span></label>
                                        <select class="form-control @error('mes') is-invalid @enderror"
                                                id="mes"
                                                name="mes"
                                                required>
                                            <option value="">Seleccione un mes...</option>
                                            @foreach(['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'] as $mes)
                                                <option value="{{ $mes }}" {{ old('mes', $evento['mes']) == $mes ? 'selected' : '' }}>{{ $mes }}</option>
                                            @endforeach
                                        </select>
                                        @error('mes')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fecha">Fecha <span class="text-danger">*</span></label>
                                        <input type="text"
                                               class="form-control @error('fecha') is-invalid @enderror"
                                               id="fecha"
                                               name="fecha"
                                               value="{{ old('fecha', $evento['fecha']) }}"
                                               required>
                                        @error('fecha')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="evento">Nombre del Evento <span class="text-danger">*</span></label>
                                <input type="text"
                                       class="form-control @error('evento') is-invalid @enderror"
                                       id="evento"
                                       name="evento"
                                       value="{{ old('evento', $evento['evento']) }}"
                                       required>
                                @error('evento')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="icono">Icono (Font Awesome) <span class="text-danger">*</span></label>
                                <input type="text"
                                       class="form-control @error('icono') is-invalid @enderror"
                                       id="icono"
                                       name="icono"
                                       value="{{ old('icono', $evento['icono']) }}"
                                       required>
                                <small class="text-muted">
                                    <i class="fas fa-info-circle"></i> Use clases de Font Awesome
                                </small>
                                @error('icono')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox"
                                           class="custom-control-input"
                                           id="destacado"
                                           name="destacado"
                                           {{ old('destacado', $evento['destacado']) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="destacado">
                                        <i class="fas fa-star text-warning"></i> Marcar como evento destacado
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Actualizar Evento
                            </button>
                            <a href="{{ route('admin.admision.calendario.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Cancelar
                            </a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-eye"></i> Vista Previa
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="callout {{ $evento['destacado'] ? 'callout-warning' : 'callout-info' }}">
                            <div class="d-flex align-items-center">
                                <div class="mr-3">
                                    <i class="fas {{ $evento['icono'] }} fa-3x text-primary"></i>
                                </div>
                                <div>
                                    <h5 class="mb-1">{{ $evento['evento'] }}</h5>
                                    <p class="mb-0">
                                        <i class="fas fa-calendar mr-1"></i>{{ $evento['fecha'] }}
                                    </p>
                                    <span class="badge badge-secondary mt-1">{{ $evento['mes'] }}</span>
                                    @if($evento['destacado'])
                                        <span class="badge badge-warning mt-1">
                                            <i class="fas fa-star"></i> Destacado
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
