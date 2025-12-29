@extends('layouts.admin')

@section('title', 'Editar Facultad')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Editar Facultad</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.academico.facultades.index') }}">Facultades</a></li>
                    <li class="breadcrumb-item active">Editar</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="card-title">
                    <i class="fas fa-edit mr-2"></i>
                    Editar: {{ $facultad['nombre'] }}
                </h3>
            </div>
            <form action="{{ route('admin.academico.facultades.update', $facultad['id']) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="nombre">Nombre de la Facultad <span class="text-danger">*</span></label>
                                <input type="text"
                                       class="form-control @error('nombre') is-invalid @enderror"
                                       id="nombre"
                                       name="nombre"
                                       value="{{ old('nombre', $facultad['nombre']) }}"
                                       placeholder="Ej: Facultad de Medicina Humana"
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
                                          rows="4"
                                          placeholder="Descripción breve de la facultad..."
                                          required>{{ old('descripcion', $facultad['descripcion']) }}</textarea>
                                @error('descripcion')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="imagen">URL de Imagen <span class="text-danger">*</span></label>
                                <input type="url"
                                       class="form-control @error('imagen') is-invalid @enderror"
                                       id="imagen"
                                       name="imagen"
                                       value="{{ old('imagen', $facultad['imagen']) }}"
                                       placeholder="https://images.unsplash.com/..."
                                       required>
                                @error('imagen')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <small class="form-text text-muted">
                                    <a href="{{ $facultad['imagen'] }}" target="_blank">Ver imagen actual</a>
                                </small>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="carreras">Número de Carreras <span class="text-danger">*</span></label>
                                <input type="number"
                                       class="form-control @error('carreras') is-invalid @enderror"
                                       id="carreras"
                                       name="carreras"
                                       value="{{ old('carreras', $facultad['carreras']) }}"
                                       min="1"
                                       required>
                                @error('carreras')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="estudiantes">Número de Estudiantes <span class="text-danger">*</span></label>
                                <input type="number"
                                       class="form-control @error('estudiantes') is-invalid @enderror"
                                       id="estudiantes"
                                       name="estudiantes"
                                       value="{{ old('estudiantes', $facultad['estudiantes']) }}"
                                       min="1"
                                       required>
                                @error('estudiantes')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="color">Color de Badge <span class="text-danger">*</span></label>
                                <select class="form-control @error('color') is-invalid @enderror"
                                        id="color"
                                        name="color"
                                        required>
                                    <option value="">Seleccionar color...</option>
                                    <option value="primary" {{ old('color', $facultad['color']) == 'primary' ? 'selected' : '' }}>Azul (Primary)</option>
                                    <option value="success" {{ old('color', $facultad['color']) == 'success' ? 'selected' : '' }}>Verde (Success)</option>
                                    <option value="danger" {{ old('color', $facultad['color']) == 'danger' ? 'selected' : '' }}>Rojo (Danger)</option>
                                    <option value="warning" {{ old('color', $facultad['color']) == 'warning' ? 'selected' : '' }}>Amarillo (Warning)</option>
                                    <option value="info" {{ old('color', $facultad['color']) == 'info' ? 'selected' : '' }}>Celeste (Info)</option>
                                    <option value="dark" {{ old('color', $facultad['color']) == 'dark' ? 'selected' : '' }}>Negro (Dark)</option>
                                    <option value="secondary" {{ old('color', $facultad['color']) == 'secondary' ? 'selected' : '' }}>Gris (Secondary)</option>
                                </select>
                                @error('color')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="icono">Ícono Font Awesome <span class="text-danger">*</span></label>
                                <input type="text"
                                       class="form-control @error('icono') is-invalid @enderror"
                                       id="icono"
                                       name="icono"
                                       value="{{ old('icono', $facultad['icono']) }}"
                                       placeholder="fa-university"
                                       required>
                                @error('icono')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <small class="form-text text-muted">
                                    <i class="fas fa-info-circle"></i> Clase del ícono sin "fas"
                                </small>
                            </div>

                            <div class="card bg-light">
                                <div class="card-body">
                                    <h6 class="font-weight-bold">Vista Previa:</h6>
                                    <div id="preview" class="text-center p-3">
                                        <i class="fas {{ $facultad['icono'] }} fa-3x text-{{ $facultad['color'] }} mb-2"></i>
                                        <p class="mb-0"><span class="badge badge-{{ $facultad['color'] }}">{{ $facultad['color'] }}</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-info">
                        <i class="fas fa-save mr-1"></i> Actualizar Facultad
                    </button>
                    <a href="{{ route('admin.academico.facultades.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times mr-1"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const iconoInput = document.getElementById('icono');
    const colorSelect = document.getElementById('color');
    const preview = document.getElementById('preview');

    function updatePreview() {
        const icono = iconoInput.value || 'fa-university';
        const color = colorSelect.value || 'primary';

        preview.innerHTML = `
            <i class="fas ${icono} fa-3x text-${color} mb-2"></i>
            <p class="mb-0"><span class="badge badge-${color}">${color}</span></p>
        `;
    }

    iconoInput.addEventListener('input', updatePreview);
    colorSelect.addEventListener('change', updatePreview);
});
</script>
@endsection
