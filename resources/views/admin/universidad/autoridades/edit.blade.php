@extends('layouts.admin')

@section('title', 'Editar Autoridad')

@section('page-title', 'Editar Autoridad')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ route('admin.universidad.autoridades.index') }}">Autoridades</a></li>
<li class="breadcrumb-item active">Editar</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit mr-2"></i>
                        Editar: {{ $autoridad['nombre'] }}
                    </h3>
                </div>
                <form action="{{ route('admin.universidad.autoridades.update', $autoridad['id']) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">

                        <div class="form-group">
                            <label for="cargo">Cargo <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('cargo') is-invalid @enderror"
                                   id="cargo" name="cargo" value="{{ old('cargo', $autoridad['cargo']) }}"
                                   placeholder="Ej: Rector, Vicerrector Académico" required>
                            @error('cargo')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nombre">Nombre Completo <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                   id="nombre" name="nombre" value="{{ old('nombre', $autoridad['nombre']) }}"
                                   placeholder="Dr. Juan Pérez García" required>
                            @error('nombre')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="periodo">Periodo <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('periodo') is-invalid @enderror"
                                   id="periodo" name="periodo" value="{{ old('periodo', $autoridad['periodo']) }}"
                                   placeholder="2021-2026" required>
                            @error('periodo')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                   id="email" name="email" value="{{ old('email', $autoridad['email']) }}"
                                   placeholder="autoridad@unmsm.edu.pe" required>
                            @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">URL de Foto <span class="text-danger">*</span></label>
                            <input type="url" class="form-control @error('image') is-invalid @enderror"
                                   id="image" name="image" value="{{ old('image', $autoridad['image']) }}"
                                   placeholder="https://images.unsplash.com/photo-..." required>
                            <small class="form-text text-muted">
                                Ingresa la URL de una imagen de perfil (Unsplash u otra fuente)
                            </small>
                            @error('image')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Preview de imagen -->
                        <div class="form-group">
                            <label>Vista previa</label>
                            <div>
                                <img id="image-preview" src="{{ $autoridad['image'] }}" alt="Preview"
                                     class="img-circle" style="width: 150px; height: 150px; object-fit: cover;">
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save mr-1"></i> Actualizar Autoridad
                        </button>
                        <a href="{{ route('admin.universidad.autoridades.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times mr-1"></i> Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.getElementById('image').addEventListener('input', function() {
    const url = this.value;
    const preview = document.getElementById('image-preview');

    if (url) {
        preview.src = url;
    }
});
</script>
@endpush
