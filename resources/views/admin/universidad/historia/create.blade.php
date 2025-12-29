@extends('layouts.admin')

@section('title', 'Crear Evento Histórico')

@section('page-title', 'Crear Evento Histórico')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ route('admin.universidad.historia.index') }}">Eventos Históricos</a></li>
<li class="breadcrumb-item active">Crear</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-plus mr-2"></i>
                        Nuevo Evento Histórico
                    </h3>
                </div>
                <form action="{{ route('admin.universidad.historia.store') }}" method="POST">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="year">Año <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('year') is-invalid @enderror"
                                   id="year" name="year" value="{{ old('year') }}"
                                   placeholder="Ej: 1551" required>
                            @error('year')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="title">Título <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                   id="title" name="title" value="{{ old('title') }}"
                                   placeholder="Título del evento histórico" required>
                            @error('title')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Descripción <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                      id="description" name="description" rows="4"
                                      placeholder="Descripción detallada del evento" required>{{ old('description') }}</textarea>
                            @error('description')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">URL de Imagen <span class="text-danger">*</span></label>
                            <input type="url" class="form-control @error('image') is-invalid @enderror"
                                   id="image" name="image" value="{{ old('image') }}"
                                   placeholder="https://images.unsplash.com/photo-..." required>
                            <small class="form-text text-muted">
                                Ingresa la URL de una imagen de Unsplash u otra fuente
                            </small>
                            @error('image')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Preview de imagen -->
                        <div class="form-group" id="image-preview-container" style="display: none;">
                            <label>Vista previa de la imagen</label>
                            <div>
                                <img id="image-preview" src="" alt="Preview"
                                     class="img-thumbnail" style="max-width: 300px;">
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save mr-1"></i> Guardar Evento
                        </button>
                        <a href="{{ route('admin.universidad.historia.index') }}" class="btn btn-secondary">
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
    const container = document.getElementById('image-preview-container');

    if (url) {
        preview.src = url;
        container.style.display = 'block';
    } else {
        container.style.display = 'none';
    }
});
</script>
@endpush
