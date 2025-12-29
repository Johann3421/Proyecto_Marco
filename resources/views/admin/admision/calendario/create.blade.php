@extends('layouts.admin')

@section('title', 'Nuevo Evento')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Nuevo Evento del Calendario</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.admision.calendario.index') }}">Calendario</a></li>
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
                <form action="{{ route('admin.admision.calendario.store') }}" method="POST">
                    @csrf

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
                                            <option value="Enero" {{ old('mes') == 'Enero' ? 'selected' : '' }}>Enero</option>
                                            <option value="Febrero" {{ old('mes') == 'Febrero' ? 'selected' : '' }}>Febrero</option>
                                            <option value="Marzo" {{ old('mes') == 'Marzo' ? 'selected' : '' }}>Marzo</option>
                                            <option value="Abril" {{ old('mes') == 'Abril' ? 'selected' : '' }}>Abril</option>
                                            <option value="Mayo" {{ old('mes') == 'Mayo' ? 'selected' : '' }}>Mayo</option>
                                            <option value="Junio" {{ old('mes') == 'Junio' ? 'selected' : '' }}>Junio</option>
                                            <option value="Julio" {{ old('mes') == 'Julio' ? 'selected' : '' }}>Julio</option>
                                            <option value="Agosto" {{ old('mes') == 'Agosto' ? 'selected' : '' }}>Agosto</option>
                                            <option value="Septiembre" {{ old('mes') == 'Septiembre' ? 'selected' : '' }}>Septiembre</option>
                                            <option value="Octubre" {{ old('mes') == 'Octubre' ? 'selected' : '' }}>Octubre</option>
                                            <option value="Noviembre" {{ old('mes') == 'Noviembre' ? 'selected' : '' }}>Noviembre</option>
                                            <option value="Diciembre" {{ old('mes') == 'Diciembre' ? 'selected' : '' }}>Diciembre</option>
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
                                               value="{{ old('fecha') }}"
                                               placeholder="Ej: 15 de Enero"
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
                                       value="{{ old('evento') }}"
                                       placeholder="Ej: Inicio de inscripciones - Proceso Ordinario"
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
                                       value="{{ old('icono') }}"
                                       placeholder="Ej: fa-calendar-plus"
                                       required>
                                <small class="text-muted">
                                    <i class="fas fa-info-circle"></i> Use clases de Font Awesome (fa-calendar-plus, fa-pencil-alt, fa-trophy, etc.)
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
                                           {{ old('destacado') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="destacado">
                                        <i class="fas fa-star text-warning"></i> Marcar como evento destacado
                                    </label>
                                </div>
                                <small class="text-muted">
                                    Los eventos destacados aparecerán resaltados en el calendario público
                                </small>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Guardar Evento
                            </button>
                            <a href="{{ route('admin.admision.calendario.index') }}" class="btn btn-secondary">
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
                            <i class="fas fa-lightbulb"></i> Iconos Sugeridos
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-2">
                            <i class="fas fa-calendar-plus fa-lg text-primary mr-2"></i>
                            <code>fa-calendar-plus</code> - Inicio de inscripciones
                        </div>
                        <div class="mb-2">
                            <i class="fas fa-calendar-times fa-lg text-danger mr-2"></i>
                            <code>fa-calendar-times</code> - Cierre de inscripciones
                        </div>
                        <div class="mb-2">
                            <i class="fas fa-pencil-alt fa-lg text-warning mr-2"></i>
                            <code>fa-pencil-alt</code> - Examen
                        </div>
                        <div class="mb-2">
                            <i class="fas fa-trophy fa-lg text-success mr-2"></i>
                            <code>fa-trophy</code> - Resultados
                        </div>
                        <div class="mb-2">
                            <i class="fas fa-file-alt fa-lg text-info mr-2"></i>
                            <code>fa-file-alt</code> - Documentos
                        </div>
                        <div class="mb-2">
                            <i class="fas fa-bell fa-lg text-secondary mr-2"></i>
                            <code>fa-bell</code> - Avisos importantes
                        </div>
                        <hr>
                        <small class="text-muted">
                            Visite <a href="https://fontawesome.com/icons" target="_blank">fontawesome.com</a> para más iconos
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
