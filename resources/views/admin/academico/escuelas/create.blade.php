@extends('layouts.admin')

@section('title', 'Nueva Escuela Profesional')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Nueva Escuela Profesional</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.academico.escuelas.index') }}">Escuelas</a></li>
                    <li class="breadcrumb-item active">Nueva</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-success">
                <h3 class="card-title">
                    <i class="fas fa-plus-circle mr-2"></i>
                    Formulario de Nueva Escuela Profesional
                </h3>
            </div>
            <form action="{{ route('admin.academico.escuelas.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre">Nombre de la Escuela Profesional <span class="text-danger">*</span></label>
                                <input type="text"
                                       class="form-control @error('nombre') is-invalid @enderror"
                                       id="nombre"
                                       name="nombre"
                                       value="{{ old('nombre') }}"
                                       placeholder="Ej: Medicina Humana"
                                       required>
                                @error('nombre')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <small class="form-text text-muted">
                                    <i class="fas fa-info-circle"></i> Nombre de la carrera profesional
                                </small>
                            </div>

                            <div class="form-group">
                                <label for="area">Área Académica <span class="text-danger">*</span></label>
                                <select class="form-control @error('area') is-invalid @enderror"
                                        id="area"
                                        name="area"
                                        required>
                                    <option value="">Seleccionar área...</option>
                                    @foreach($areas as $areaOption)
                                    <option value="{{ $areaOption }}" {{ old('area') == $areaOption ? 'selected' : '' }}>
                                        {{ $areaOption }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('area')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <small class="form-text text-muted">
                                    <i class="fas fa-info-circle"></i> Categoría académica de la escuela
                                </small>
                            </div>

                            <div class="form-group">
                                <label for="facultad">Facultad <span class="text-danger">*</span></label>
                                <input type="text"
                                       class="form-control @error('facultad') is-invalid @enderror"
                                       id="facultad"
                                       name="facultad"
                                       value="{{ old('facultad') }}"
                                       placeholder="Ej: Facultad de Medicina"
                                       required>
                                @error('facultad')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <small class="form-text text-muted">
                                    <i class="fas fa-info-circle"></i> Facultad a la que pertenece
                                </small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="duracion">Duración <span class="text-danger">*</span></label>
                                <select class="form-control @error('duracion') is-invalid @enderror"
                                        id="duracion"
                                        name="duracion"
                                        required>
                                    <option value="">Seleccionar duración...</option>
                                    <option value="4 años" {{ old('duracion') == '4 años' ? 'selected' : '' }}>4 años</option>
                                    <option value="5 años" {{ old('duracion') == '5 años' ? 'selected' : '' }}>5 años</option>
                                    <option value="6 años" {{ old('duracion') == '6 años' ? 'selected' : '' }}>6 años</option>
                                    <option value="7 años" {{ old('duracion') == '7 años' ? 'selected' : '' }}>7 años</option>
                                </select>
                                @error('duracion')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="grado">Grado que Otorga <span class="text-danger">*</span></label>
                                <input type="text"
                                       class="form-control @error('grado') is-invalid @enderror"
                                       id="grado"
                                       name="grado"
                                       value="{{ old('grado') }}"
                                       placeholder="Ej: Médico Cirujano"
                                       required>
                                @error('grado')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <small class="form-text text-muted">
                                    <i class="fas fa-info-circle"></i> Título profesional que otorga
                                </small>
                            </div>

                            <div class="form-group">
                                <label for="estudiantes">Número de Estudiantes <span class="text-danger">*</span></label>
                                <input type="number"
                                       class="form-control @error('estudiantes') is-invalid @enderror"
                                       id="estudiantes"
                                       name="estudiantes"
                                       value="{{ old('estudiantes', 500) }}"
                                       min="1"
                                       required>
                                @error('estudiantes')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Información adicional -->
                    <div class="row">
                        <div class="col-12">
                            <div class="callout callout-info">
                                <h5><i class="icon fas fa-info"></i> Nota:</h5>
                                <p>Esta información aparecerá en la página pública de Escuelas Profesionales. Asegúrese de ingresar datos correctos y actualizados.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save mr-1"></i> Guardar Escuela Profesional
                    </button>
                    <a href="{{ route('admin.academico.escuelas.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times mr-1"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>

        <!-- Ayuda -->
        <div class="card card-info collapsed-card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-question-circle mr-2"></i>Ayuda
                </h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <h5>Ejemplos de Escuelas Profesionales:</h5>
                <ul>
                    <li><strong>Ciencias de la Salud:</strong> Medicina Humana, Enfermería, Obstetricia</li>
                    <li><strong>Ingenierías:</strong> Ingeniería de Sistemas, Ingeniería Industrial, Ingeniería Civil</li>
                    <li><strong>Ciencias Sociales:</strong> Derecho, Sociología, Psicología</li>
                    <li><strong>Ciencias Económicas:</strong> Economía, Administración, Contabilidad</li>
                    <li><strong>Ciencias Básicas:</strong> Matemática, Física, Química</li>
                    <li><strong>Arte y Diseño:</strong> Arte, Diseño Gráfico, Conservación y Restauración</li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection
