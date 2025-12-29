@extends('layouts.admin')

@section('title', 'Editar Línea de Investigación')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Editar Línea de Investigación</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.investigacion.lineas.index') }}">Líneas</a></li>
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
                <form action="{{ route('admin.investigacion.lineas.update', $id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card card-{{ $linea['color'] ?? 'primary' }} card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas {{ $linea['icono'] ?? 'fa-stream' }} mr-2"></i>
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
                                       value="{{ old('nombre', $linea['nombre']) }}"
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
                                          required>{{ old('descripcion', $linea['descripcion']) }}</textarea>
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
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas {{ $linea['icono'] ?? 'fa-stream' }}"></i>
                                                </span>
                                            </div>
                                            <input type="text"
                                                   class="form-control @error('icono') is-invalid @enderror"
                                                   id="icono"
                                                   name="icono"
                                                   value="{{ old('icono', $linea['icono']) }}"
                                                   placeholder="fa-heartbeat"
                                                   required>
                                        </div>
                                        @error('icono')
                                            <span class="invalid-feedback d-block">{{ $message }}</span>
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
                                            <option value="primary" {{ old('color', $linea['color']) == 'primary' ? 'selected' : '' }}>Azul (Primary)</option>
                                            <option value="success" {{ old('color', $linea['color']) == 'success' ? 'selected' : '' }}>Verde (Success)</option>
                                            <option value="info" {{ old('color', $linea['color']) == 'info' ? 'selected' : '' }}>Cian (Info)</option>
                                            <option value="warning" {{ old('color', $linea['color']) == 'warning' ? 'selected' : '' }}>Amarillo (Warning)</option>
                                            <option value="danger" {{ old('color', $linea['color']) == 'danger' ? 'selected' : '' }}>Rojo (Danger)</option>
                                            <option value="secondary" {{ old('color', $linea['color']) == 'secondary' ? 'selected' : '' }}>Gris (Secondary)</option>
                                            <option value="dark" {{ old('color', $linea['color']) == 'dark' ? 'selected' : '' }}>Negro (Dark)</option>
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
                                       value="{{ old('proyectos_activos', $linea['proyectos_activos']) }}"
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
                                <i class="fas fa-save"></i> Actualizar Línea
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
                            <i class="fas fa-eye"></i> Vista Previa
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="callout callout-{{ $linea['color'] ?? 'primary' }}">
                            <h5>
                                <i class="fas {{ $linea['icono'] ?? 'fa-stream' }} mr-2"></i>
                                {{ $linea['nombre'] }}
                            </h5>
                            <p>{{ $linea['descripcion'] }}</p>
                            <span class="badge badge-{{ $linea['color'] ?? 'primary' }}">
                                {{ $linea['proyectos_activos'] }} proyectos activos
                            </span>
                        </div>
                    </div>
                </div>

                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-lightbulb"></i> Iconos Sugeridos
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-2">
                            <i class="fas fa-heartbeat fa-lg text-danger mr-2"></i>
                            <code>fa-heartbeat</code>
                        </div>
                        <div class="mb-2">
                            <i class="fas fa-laptop-code fa-lg text-primary mr-2"></i>
                            <code>fa-laptop-code</code>
                        </div>
                        <div class="mb-2">
                            <i class="fas fa-users fa-lg text-info mr-2"></i>
                            <code>fa-users</code>
                        </div>
                        <div class="mb-2">
                            <i class="fas fa-leaf fa-lg text-success mr-2"></i>
                            <code>fa-leaf</code>
                        </div>
                        <div class="mb-2">
                            <i class="fas fa-atom fa-lg text-warning mr-2"></i>
                            <code>fa-atom</code>
                        </div>
                        <div class="mb-2">
                            <i class="fas fa-book fa-lg text-secondary mr-2"></i>
                            <code>fa-book</code>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
