@extends('layouts.admin')

@section('title', 'Nueva Modalidad')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Nueva Modalidad de Admisión</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.admision.modalidades.index') }}">Modalidades</a></li>
                    <li class="breadcrumb-item active">Crear</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <form action="{{ route('admin.admision.modalidades.store') }}" method="POST">
                    @csrf

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
                                       value="{{ old('nombre') }}"
                                       placeholder="Ej: Ordinario, CEPREUNMSM, Primeros Puestos..."
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
                                          placeholder="Descripción detallada de la modalidad..."
                                          required>{{ old('descripcion') }}</textarea>
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
                                               value="{{ old('vacantes') }}"
                                               placeholder="Ej: 5,000"
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
                                               value="{{ old('fecha_examen') }}"
                                               placeholder="Ej: Marzo 2024"
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
                                    <option value="primary" {{ old('color') == 'primary' ? 'selected' : '' }}>Azul (Primary)</option>
                                    <option value="success" {{ old('color') == 'success' ? 'selected' : '' }}>Verde (Success)</option>
                                    <option value="info" {{ old('color') == 'info' ? 'selected' : '' }}>Cian (Info)</option>
                                    <option value="warning" {{ old('color') == 'warning' ? 'selected' : '' }}>Amarillo (Warning)</option>
                                    <option value="danger" {{ old('color') == 'danger' ? 'selected' : '' }}>Rojo (Danger)</option>
                                    <option value="secondary" {{ old('color') == 'secondary' ? 'selected' : '' }}>Gris (Secondary)</option>
                                    <option value="dark" {{ old('color') == 'dark' ? 'selected' : '' }}>Negro (Dark)</option>
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
                                          placeholder="Haber culminado estudios secundarios&#10;Certificado de estudios original&#10;Partida de nacimiento original&#10;DNI vigente&#10;Fotografía actualizada"
                                          required>{{ old('requisitos') }}</textarea>
                                @error('requisitos')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Guardar Modalidad
                            </button>
                            <a href="{{ route('admin.admision.modalidades.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Cancelar
                            </a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-4">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-question-circle"></i> Ayuda
                        </h3>
                    </div>
                    <div class="card-body">
                        <p><strong>Nombre:</strong> Identificador principal de la modalidad de ingreso.</p>
                        <p><strong>Descripción:</strong> Explique brevemente en qué consiste esta modalidad.</p>
                        <p><strong>Vacantes:</strong> Número total de vacantes disponibles.</p>
                        <p><strong>Fecha:</strong> Cuándo se realiza el examen o proceso.</p>
                        <p><strong>Color:</strong> Se usa para distinguir visualmente la modalidad en la página pública.</p>
                        <p><strong>Requisitos:</strong> Liste todos los documentos y condiciones necesarios.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
