@extends('layouts.admin')

@section('title', 'Editar Modalidad')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Editar Modalidad: {{ $modalidad['nombre'] }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.admision.modalidades.index') }}">Modalidades</a></li>
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
                <form action="{{ route('admin.admision.modalidades.update', $modalidad['id']) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-door-open mr-2"></i>
                                Información de la Modalidad
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nombre">Nombre de la Modalidad <span class="text-danger">*</span></label>
                                <input type="text"
                                       class="form-control @error('nombre') is-invalid @enderror"
                                       id="nombre"
                                       name="nombre"
                                       value="{{ old('nombre', $modalidad['nombre']) }}"
                                       required>
                                @error('nombre')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="descripcion">Descripción <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('descripcion') is-invalid @enderror"
                                          id="descripcion"
                                          name="descripcion"
                                          rows="3"
                                          required>{{ old('descripcion', $modalidad['descripcion']) }}</textarea>
                                @error('descripcion')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="vacantes">Vacantes <span class="text-danger">*</span></label>
                                        <input type="text"
                                               class="form-control @error('vacantes') is-invalid @enderror"
                                               id="vacantes"
                                               name="vacantes"
                                               value="{{ old('vacantes', $modalidad['vacantes']) }}"
                                               required>
                                        @error('vacantes')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fecha_examen">Fecha del Examen <span class="text-danger">*</span></label>
                                        <input type="text"
                                               class="form-control @error('fecha_examen') is-invalid @enderror"
                                               id="fecha_examen"
                                               name="fecha_examen"
                                               value="{{ old('fecha_examen', $modalidad['fecha_examen']) }}"
                                               required>
                                        @error('fecha_examen')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="color">Color de la Modalidad <span class="text-danger">*</span></label>
                                <select class="form-control @error('color') is-invalid @enderror"
                                        id="color"
                                        name="color"
                                        required>
                                    <option value="">Seleccione un color...</option>
                                    <option value="primary" {{ old('color', $modalidad['color']) == 'primary' ? 'selected' : '' }}>Azul (Primary)</option>
                                    <option value="success" {{ old('color', $modalidad['color']) == 'success' ? 'selected' : '' }}>Verde (Success)</option>
                                    <option value="info" {{ old('color', $modalidad['color']) == 'info' ? 'selected' : '' }}>Cian (Info)</option>
                                    <option value="warning" {{ old('color', $modalidad['color']) == 'warning' ? 'selected' : '' }}>Amarillo (Warning)</option>
                                    <option value="danger" {{ old('color', $modalidad['color']) == 'danger' ? 'selected' : '' }}>Rojo (Danger)</option>
                                    <option value="secondary" {{ old('color', $modalidad['color']) == 'secondary' ? 'selected' : '' }}>Gris (Secondary)</option>
                                    <option value="dark" {{ old('color', $modalidad['color']) == 'dark' ? 'selected' : '' }}>Negro (Dark)</option>
                                </select>
                                @error('color')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="requisitos">Requisitos <span class="text-danger">*</span></label>
                                <small class="text-muted d-block mb-2">
                                    <i class="fas fa-info-circle"></i> Ingrese un requisito por línea
                                </small>
                                <textarea class="form-control @error('requisitos') is-invalid @enderror"
                                          id="requisitos"
                                          name="requisitos"
                                          rows="6"
                                          required>{{ old('requisitos', implode("\n", $modalidad['requisitos'])) }}</textarea>
                                @error('requisitos')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Actualizar Modalidad
                            </button>
                            <a href="{{ route('admin.admision.modalidades.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Cancelar
                            </a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-4">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-eye"></i> Vista Previa
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-{{ $modalidad['color'] }}">
                            <h5><strong>{{ $modalidad['nombre'] }}</strong></h5>
                            <p class="mb-2">{{ $modalidad['descripcion'] }}</p>
                            <hr>
                            <p class="mb-1"><strong>Vacantes:</strong> {{ $modalidad['vacantes'] }}</p>
                            <p class="mb-1"><strong>Fecha:</strong> {{ $modalidad['fecha_examen'] }}</p>
                        </div>
                        <div class="mt-3">
                            <strong>Requisitos:</strong>
                            <ul class="mt-2">
                                @foreach($modalidad['requisitos'] as $requisito)
                                    <li>{{ $requisito }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
