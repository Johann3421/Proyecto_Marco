@extends('layouts.admin')

@section('title', 'Crear Noticia')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">
                    <i class="fas fa-plus-circle text-primary"></i>
                    Nueva Noticia
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.noticias.noticias.index') }}">Noticias</a></li>
                    <li class="breadcrumb-item active">Crear</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <form action="{{ route('admin.noticias.noticias.store') }}" method="POST">
            @csrf

            <div class="row">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h3 class="card-title">
                                <i class="fas fa-file-alt"></i>
                                Contenido de la Noticia
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="titulo">Título de la Noticia <span class="text-danger">*</span></label>
                                <input type="text"
                                       class="form-control form-control-lg @error('titulo') is-invalid @enderror"
                                       id="titulo"
                                       name="titulo"
                                       value="{{ old('titulo') }}"
                                       placeholder="Ingrese un título atractivo y descriptivo"
                                       required>
                                @error('titulo')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <small class="text-muted">
                                    <i class="fas fa-info-circle"></i> Use un título claro y conciso (máximo 255 caracteres)
                                </small>
                            </div>

                            <div class="form-group">
                                <label for="extracto">Extracto <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('extracto') is-invalid @enderror"
                                          id="extracto"
                                          name="extracto"
                                          rows="3"
                                          placeholder="Resumen breve de la noticia que aparecerá en las vistas previas..."
                                          required>{{ old('extracto') }}</textarea>
                                @error('extracto')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <small class="text-muted">
                                    <i class="fas fa-info-circle"></i> Resumen corto y atractivo (máximo 500 caracteres)
                                </small>
                            </div>

                            <div class="form-group">
                                <label for="contenido">Contenido Completo <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('contenido') is-invalid @enderror"
                                          id="contenido"
                                          name="contenido"
                                          rows="12"
                                          placeholder="Escriba el contenido completo de la noticia..."
                                          required>{{ old('contenido') }}</textarea>
                                @error('contenido')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <small class="text-muted">
                                    <i class="fas fa-info-circle"></i> Contenido detallado de la noticia
                                </small>
                            </div>

                            <div class="form-group">
                                <label for="imagen">URL de la Imagen <span class="text-danger">*</span></label>
                                <input type="url"
                                       class="form-control @error('imagen') is-invalid @enderror"
                                       id="imagen"
                                       name="imagen"
                                       value="{{ old('imagen') }}"
                                       placeholder="https://ejemplo.com/imagen.jpg"
                                       required>
                                @error('imagen')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <small class="text-muted">
                                    <i class="fas fa-info-circle"></i> URL de imagen (recomendado: 800x600px). Puede usar
                                    <a href="https://unsplash.com" target="_blank">Unsplash</a>
                                </small>
                            </div>

                            <!-- Image Preview -->
                            <div class="form-group" id="imagePreview" style="display: none;">
                                <label>Vista Previa de la Imagen</label>
                                <div class="text-center">
                                    <img id="previewImg" src="" alt="Preview" class="img-fluid rounded shadow" style="max-height: 300px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Publish Settings -->
                    <div class="card">
                        <div class="card-header bg-success">
                            <h3 class="card-title">
                                <i class="fas fa-cog"></i>
                                Configuración de Publicación
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="categoria">Categoría <span class="text-danger">*</span></label>
                                <select class="form-control @error('categoria') is-invalid @enderror"
                                        id="categoria"
                                        name="categoria"
                                        required>
                                    <option value="">Seleccione una categoría...</option>
                                    @foreach($categorias as $cat)
                                    <option value="{{ $cat['nombre'] }}" {{ old('categoria') == $cat['nombre'] ? 'selected' : '' }}>
                                        {{ $cat['nombre'] }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('categoria')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="autor">Autor <span class="text-danger">*</span></label>
                                <input type="text"
                                       class="form-control @error('autor') is-invalid @enderror"
                                       id="autor"
                                       name="autor"
                                       value="{{ old('autor', auth()->user()->name ?? 'Administrador') }}"
                                       placeholder="Nombre del autor"
                                       required>
                                @error('autor')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-switch custom-switch-lg">
                                    <input type="checkbox"
                                           class="custom-control-input"
                                           id="destacada"
                                           name="destacada"
                                           {{ old('destacada') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="destacada">
                                        <strong>Noticia Destacada</strong>
                                        <br>
                                        <small class="text-muted">Aparecerá en la sección principal</small>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tags">Etiquetas</label>
                                <input type="text"
                                       class="form-control @error('tags') is-invalid @enderror"
                                       id="tags"
                                       name="tags"
                                       value="{{ old('tags') }}"
                                       placeholder="tecnología, innovación, educación"
                                       data-role="tagsinput">
                                @error('tags')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <small class="text-muted">
                                    Separadas por comas
                                </small>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-block btn-lg">
                                <i class="fas fa-save"></i> Publicar Noticia
                            </button>
                            <a href="{{ route('admin.noticias.noticias.index') }}" class="btn btn-secondary btn-block">
                                <i class="fas fa-times"></i> Cancelar
                            </a>
                        </div>
                    </div>

                    <!-- Help Card -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-question-circle"></i>
                                Guía Rápida
                            </h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2">
                                    <i class="fas fa-check text-success"></i>
                                    <strong>Título:</strong> Breve y descriptivo
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check text-success"></i>
                                    <strong>Extracto:</strong> Resumen atractivo
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check text-success"></i>
                                    <strong>Contenido:</strong> Información completa
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check text-success"></i>
                                    <strong>Imagen:</strong> Alta calidad
                                </li>
                                <li class="mb-0">
                                    <i class="fas fa-check text-success"></i>
                                    <strong>Destacada:</strong> Solo lo más importante
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Preview de imagen
    document.getElementById('imagen').addEventListener('blur', function() {
        const url = this.value;
        const preview = document.getElementById('imagePreview');
        const img = document.getElementById('previewImg');

        if (url) {
            img.src = url;
            preview.style.display = 'block';

            img.onerror = function() {
                preview.style.display = 'none';
            };
        } else {
            preview.style.display = 'none';
        }
    });

    // Contador de caracteres para título
    document.getElementById('titulo').addEventListener('input', function() {
        const maxLength = 255;
        const currentLength = this.value.length;
        console.log(`Título: ${currentLength}/${maxLength} caracteres`);
    });
</script>
@endpush
