@extends('layouts.admin')

@section('title', 'Editar Paso del Proceso')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Editar Paso {{ $paso['numero'] }}: {{ $paso['titulo'] }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.admision.proceso.index') }}">Proceso</a></li>
                    <li class="breadcrumb-item active">Editar Paso {{ $paso['numero'] }}</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <form action="{{ route('admin.admision.proceso.update', $paso['numero']) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card">
                        <div class="card-header bg-{{ $paso['color'] }}">
                            <h3 class="card-title">
                                <i class="fas {{ $paso['icono'] }} mr-2"></i>
                                Editar Paso {{ $paso['numero'] }}
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="titulo">Título del Paso <span class="text-danger">*</span></label>
                                <input type="text"
                                       class="form-control form-control-lg @error('titulo') is-invalid @enderror"
                                       id="titulo"
                                       name="titulo"
                                       value="{{ old('titulo', $paso['titulo']) }}"
                                       placeholder="Ej: Inscripción, Pago de Derecho, etc."
                                       required>
                                @error('titulo')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="descripcion">Descripción <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('descripcion') is-invalid @enderror"
                                          id="descripcion"
                                          name="descripcion"
                                          rows="4"
                                          placeholder="Descripción detallada de este paso del proceso..."
                                          required>{{ old('descripcion', $paso['descripcion']) }}</textarea>
                                @error('descripcion')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <small class="text-muted">
                                    <i class="fas fa-info-circle"></i> Sea claro y conciso. Esta descripción se mostrará en la página pública.
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
                                               value="{{ old('icono', $paso['icono']) }}"
                                               placeholder="Ej: fa-user-plus"
                                               required>
                                        @error('icono')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                        <small class="text-muted">
                                            Ejemplo: fa-user-plus, fa-credit-card, fa-file-upload
                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="color">Color <span class="text-danger">*</span></label>
                                        <select class="form-control @error('color') is-invalid @enderror"
                                                id="color"
                                                name="color"
                                                required>
                                            <option value="primary" {{ old('color', $paso['color']) == 'primary' ? 'selected' : '' }}>Azul (Primary)</option>
                                            <option value="success" {{ old('color', $paso['color']) == 'success' ? 'selected' : '' }}>Verde (Success)</option>
                                            <option value="info" {{ old('color', $paso['color']) == 'info' ? 'selected' : '' }}>Cian (Info)</option>
                                            <option value="warning" {{ old('color', $paso['color']) == 'warning' ? 'selected' : '' }}>Amarillo (Warning)</option>
                                            <option value="danger" {{ old('color', $paso['color']) == 'danger' ? 'selected' : '' }}>Rojo (Danger)</option>
                                            <option value="secondary" {{ old('color', $paso['color']) == 'secondary' ? 'selected' : '' }}>Gris (Secondary)</option>
                                            <option value="dark" {{ old('color', $paso['color']) == 'dark' ? 'selected' : '' }}>Negro (Dark)</option>
                                        </select>
                                        @error('color')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Actualizar Paso
                            </button>
                            <a href="{{ route('admin.admision.proceso.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Volver al Proceso
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
                        <div class="card card-outline card-{{ $paso['color'] }}">
                            <div class="card-body text-center">
                                <div class="mb-3">
                                    <i class="fas {{ $paso['icono'] }} fa-4x text-{{ $paso['color'] }}"></i>
                                </div>
                                <span class="badge badge-{{ $paso['color'] }} badge-lg mb-2">
                                    Paso {{ $paso['numero'] }}
                                </span>
                                <h4 class="mt-2"><strong>{{ $paso['titulo'] }}</strong></h4>
                                <p class="text-muted mb-0">{{ $paso['descripcion'] }}</p>
                            </div>
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
                            <i class="fas fa-user-plus fa-lg text-primary mr-2"></i>
                            <code>fa-user-plus</code>
                        </div>
                        <div class="mb-2">
                            <i class="fas fa-credit-card fa-lg text-success mr-2"></i>
                            <code>fa-credit-card</code>
                        </div>
                        <div class="mb-2">
                            <i class="fas fa-file-upload fa-lg text-info mr-2"></i>
                            <code>fa-file-upload</code>
                        </div>
                        <div class="mb-2">
                            <i class="fas fa-book-reader fa-lg text-warning mr-2"></i>
                            <code>fa-book-reader</code>
                        </div>
                        <div class="mb-2">
                            <i class="fas fa-edit fa-lg text-danger mr-2"></i>
                            <code>fa-edit</code>
                        </div>
                        <div class="mb-2">
                            <i class="fas fa-trophy fa-lg text-dark mr-2"></i>
                            <code>fa-trophy</code>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
