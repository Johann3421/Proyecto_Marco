@extends('layouts.admin')

@section('title', 'Nueva Pregunta Frecuente')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Nueva Pregunta Frecuente</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.admision.faqs.index') }}">FAQs</a></li>
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
                <form action="{{ route('admin.admision.faqs.store') }}" method="POST">
                    @csrf

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-question-circle mr-2"></i>
                                Datos de la Pregunta
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="pregunta">Pregunta <span class="text-danger">*</span></label>
                                <input type="text"
                                       class="form-control @error('pregunta') is-invalid @enderror"
                                       id="pregunta"
                                       name="pregunta"
                                       value="{{ old('pregunta') }}"
                                       placeholder="Ej: ¿Cuánto cuesta el examen de admisión?"
                                       required>
                                @error('pregunta')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="respuesta">Respuesta <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('respuesta') is-invalid @enderror"
                                          id="respuesta"
                                          name="respuesta"
                                          rows="6"
                                          placeholder="Escriba aquí la respuesta detallada..."
                                          required>{{ old('respuesta') }}</textarea>
                                @error('respuesta')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <small class="text-muted">
                                    <i class="fas fa-info-circle"></i> Sea claro y conciso. Proporcione toda la información relevante.
                                </small>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Guardar Pregunta
                            </button>
                            <a href="{{ route('admin.admision.faqs.index') }}" class="btn btn-secondary">
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
                            <i class="fas fa-lightbulb"></i> Consejos
                        </h3>
                    </div>
                    <div class="card-body">
                        <h6><strong>Preguntas Efectivas:</strong></h6>
                        <ul class="mb-3">
                            <li>Sea específico y directo</li>
                            <li>Use un lenguaje claro</li>
                            <li>Anticipe dudas comunes</li>
                        </ul>

                        <h6><strong>Respuestas de Calidad:</strong></h6>
                        <ul>
                            <li>Proporcione datos exactos</li>
                            <li>Incluya cifras cuando aplique</li>
                            <li>Sea exhaustivo pero conciso</li>
                            <li>Actualice información regularmente</li>
                        </ul>
                    </div>
                </div>

                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-star"></i> Temas Comunes
                        </h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2">
                                <i class="fas fa-check text-success mr-2"></i>
                                Costos y pagos
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check text-success mr-2"></i>
                                Fechas importantes
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check text-success mr-2"></i>
                                Requisitos y documentos
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check text-success mr-2"></i>
                                Proceso de examen
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check text-success mr-2"></i>
                                Becas y beneficios
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
