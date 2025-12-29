@extends('layouts.admin')

@section('title', 'Nueva Línea de Investigación')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Nueva Línea de Investigación</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.investigacion.lineas.index') }}">Líneas</a></li>
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
                <form action="{{ route('admin.investigacion.lineas.store') }}" method="POST">
                    @csrf

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-stream mr-2"></i>
                                Información de la Línea
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nombre">Nombre de la Línea <span class="text-danger">*</span></label>
                                <input type="text"
                                       class="form-control @error('nombre') is-invalid @enderror"
                                       id="nombre"
                                       name="nombre"
                                       value="{{ old('nombre') }}"
                                       placeholder="Ej: Ciencias de la Salud, Tecnología e Innovación..."
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
                                          placeholder="Descripción clara y concisa de la línea de investigación..."
                                          required>{{ old('descripcion') }}</textarea>
                                @error('descripcion')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <small class="text-muted">
                                    <i class="fas fa-info-circle"></i> Describa el enfoque y alcance de esta línea de investigación
                                </small>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="icono">Icono (Font Awesome) <span class="text-danger">*</span></label>
                                        <input type="text"
                                               class="form-control @error('icono') is-invalid @enderror"
                                               id="icono"
                                               name="icono"
                                               value="{{ old('icono') }}"
                                               placeholder="fa-heartbeat"
                                               required>
                                        @error('icono')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                        <small class="text-muted">
                                            Sin el prefijo "fas" - Ej: fa-heartbeat, fa-laptop-code
                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="color">Color Bootstrap <span class="text-danger">*</span></label>
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
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="proyectos_activos">Proyectos Activos <span class="text-danger">*</span></label>
                                <input type="number"
                                       class="form-control @error('proyectos_activos') is-invalid @enderror"
                                       id="proyectos_activos"
                                       name="proyectos_activos"
                                       value="{{ old('proyectos_activos', 0) }}"
                                       min="0"
                                       required>
                                @error('proyectos_activos')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <small class="text-muted">
                                    <i class="fas fa-info-circle"></i> Número de proyectos actualmente en desarrollo
                                </small>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Guardar Línea
                            </button>
                            <a href="{{ route('admin.investigacion.lineas.index') }}" class="btn btn-secondary">
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
                            <i class="fas fa-heartbeat fa-lg text-danger mr-2"></i>
                            <code>fa-heartbeat</code> - Ciencias de la Salud
                        </div>
                        <div class="mb-2">
                            <i class="fas fa-laptop-code fa-lg text-primary mr-2"></i>
                            <code>fa-laptop-code</code> - Tecnología
                        </div>
                        <div class="mb-2">
                            <i class="fas fa-users fa-lg text-info mr-2"></i>
                            <code>fa-users</code> - Ciencias Sociales
                        </div>
                        <div class="mb-2">
                            <i class="fas fa-leaf fa-lg text-success mr-2"></i>
                            <code>fa-leaf</code> - Medio Ambiente
                        </div>
                        <div class="mb-2">
                            <i class="fas fa-atom fa-lg text-warning mr-2"></i>
                            <code>fa-atom</code> - Ciencias Básicas
                        </div>
                        <div class="mb-2">
                            <i class="fas fa-book fa-lg text-secondary mr-2"></i>
                            <code>fa-book</code> - Humanidades
                        </div>
                        <hr>
                        <small class="text-muted">
                            Más iconos en <a href="https://fontawesome.com/icons" target="_blank">fontawesome.com</a>
                        </small>
                    </div>
                </div>

                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-question-circle"></i> Ayuda
                        </h3>
                    </div>
                    <div class="card-body">
                        <p><strong>Nombre:</strong> Identificador claro de la línea de investigación.</p>
                        <p><strong>Descripción:</strong> Explique el enfoque, objetivos y alcance de esta línea.</p>
                        <p><strong>Icono:</strong> Representación visual que identifica la línea.</p>
                        <p><strong>Color:</strong> Usado para diferenciación visual en la interfaz pública.</p>
                        <p><strong>Proyectos Activos:</strong> Cantidad actual de proyectos en desarrollo.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
