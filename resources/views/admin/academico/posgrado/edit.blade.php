@extends('layouts.admin')

@section('title', 'Editar Programa de Posgrado')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Editar Programa de Posgrado</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.academico.posgrado.index') }}">Posgrado</a></li>
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
                    Editar: {{ $programa['nombre'] }}
                </h3>
            </div>
            <form action="{{ route('admin.academico.posgrado.update', $programa['id']) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tipo">Tipo de Programa <span class="text-danger">*</span></label>
                                <select class="form-control @error('tipo') is-invalid @enderror"
                                        id="tipo"
                                        name="tipo"
                                        required>
                                    <option value="">Seleccionar tipo...</option>
                                    <option value="maestria" {{ old('tipo', $programa['tipo']) == 'maestria' ? 'selected' : '' }}>Maestría</option>
                                    <option value="doctorado" {{ old('tipo', $programa['tipo']) == 'doctorado' ? 'selected' : '' }}>Doctorado</option>
                                </select>
                                @error('tipo')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nombre">Nombre del Programa <span class="text-danger">*</span></label>
                                <input type="text"
                                       class="form-control @error('nombre') is-invalid @enderror"
                                       id="nombre"
                                       name="nombre"
                                       value="{{ old('nombre', $programa['nombre']) }}"
                                       placeholder="Ej: Maestría en Medicina con mención en Cardiología"
                                       required>
                                @error('nombre')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="duracion">Duración <span class="text-danger">*</span></label>
                                <select class="form-control @error('duracion') is-invalid @enderror"
                                        id="duracion"
                                        name="duracion"
                                        required>
                                    <option value="">Seleccionar duración...</option>
                                    <option value="1 año" {{ old('duracion', $programa['duracion']) == '1 año' ? 'selected' : '' }}>1 año</option>
                                    <option value="2 años" {{ old('duracion', $programa['duracion']) == '2 años' ? 'selected' : '' }}>2 años</option>
                                    <option value="3 años" {{ old('duracion', $programa['duracion']) == '3 años' ? 'selected' : '' }}>3 años</option>
                                    <option value="4 años" {{ old('duracion', $programa['duracion']) == '4 años' ? 'selected' : '' }}>4 años</option>
                                </select>
                                @error('duracion')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="modalidad">Modalidad <span class="text-danger">*</span></label>
                                <select class="form-control @error('modalidad') is-invalid @enderror"
                                        id="modalidad"
                                        name="modalidad"
                                        required>
                                    <option value="">Seleccionar modalidad...</option>
                                    <option value="Presencial" {{ old('modalidad', $programa['modalidad']) == 'Presencial' ? 'selected' : '' }}>Presencial</option>
                                    <option value="Semi-presencial" {{ old('modalidad', $programa['modalidad']) == 'Semi-presencial' ? 'selected' : '' }}>Semi-presencial</option>
                                    <option value="Virtual" {{ old('modalidad', $programa['modalidad']) == 'Virtual' ? 'selected' : '' }}>Virtual</option>
                                </select>
                                @error('modalidad')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Campos específicos para MAESTRÍA -->
                            <div id="maestriaFields" style="display: {{ $programa['tipo'] == 'maestria' ? 'block' : 'none' }};">
                                <div class="form-group">
                                    <label for="creditos">Créditos <span class="text-danger">*</span></label>
                                    <input type="number"
                                           class="form-control @error('creditos') is-invalid @enderror"
                                           id="creditos"
                                           name="creditos"
                                           value="{{ old('creditos', $programa['creditos'] ?? 60) }}"
                                           min="1">
                                    @error('creditos')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="imagen">URL de Imagen</label>
                                    <input type="url"
                                           class="form-control @error('imagen') is-invalid @enderror"
                                           id="imagen"
                                           name="imagen"
                                           value="{{ old('imagen', $programa['imagen'] ?? 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=800&h=500&fit=crop&auto=format') }}"
                                           placeholder="https://images.unsplash.com/...">
                                    @error('imagen')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Campos específicos para DOCTORADO -->
                            <div id="doctoradoFields" style="display: {{ $programa['tipo'] == 'doctorado' ? 'block' : 'none' }};">
                                <div class="form-group">
                                    <label for="lineas_investigacion">Líneas de Investigación <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('lineas_investigacion') is-invalid @enderror"
                                              id="lineas_investigacion"
                                              name="lineas_investigacion"
                                              rows="5"
                                              placeholder="Ingrese las líneas separadas por comas...">{{ old('lineas_investigacion', isset($programa['lineas_investigacion']) ? implode(', ', $programa['lineas_investigacion']) : '') }}</textarea>
                                    @error('lineas_investigacion')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                    <small class="form-text text-muted">
                                        <i class="fas fa-info-circle"></i> Separe cada línea con una coma
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-info">
                        <i class="fas fa-save mr-1"></i> Actualizar Programa
                    </button>
                    <a href="{{ route('admin.academico.posgrado.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times mr-1"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tipoSelect = document.getElementById('tipo');
    const maestriaFields = document.getElementById('maestriaFields');
    const doctoradoFields = document.getElementById('doctoradoFields');
    const creditosInput = document.getElementById('creditos');
    const lineasInput = document.getElementById('lineas_investigacion');

    function updateFields() {
        const tipo = tipoSelect.value;

        if (tipo === 'maestria') {
            maestriaFields.style.display = 'block';
            doctoradoFields.style.display = 'none';
            creditosInput.required = true;
            lineasInput.required = false;
        } else if (tipo === 'doctorado') {
            maestriaFields.style.display = 'none';
            doctoradoFields.style.display = 'block';
            creditosInput.required = false;
            lineasInput.required = true;
        } else {
            maestriaFields.style.display = 'none';
            doctoradoFields.style.display = 'none';
            creditosInput.required = false;
            lineasInput.required = false;
        }
    }

    tipoSelect.addEventListener('change', updateFields);
});
</script>
@endsection
