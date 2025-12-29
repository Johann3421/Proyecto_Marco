@extends('layouts.admin')

@section('title', 'Editar Noticia')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">
                    <i class="fas fa-edit text-warning"></i>
                    Editar Noticia
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.noticias.noticias.index') }}">Noticias</a></li>
                    <li class="breadcrumb-item active">Editar</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <form action="{{ route('admin.noticias.noticias.update', $id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <div class="card card-warning card-outline">
                        <div class="card-header">
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
                                       value="{{ old('titulo', $noticia['titulo']) }}"
                                       placeholder="Ingrese un título atractivo y descriptivo"
                                       required>
                                @error('titulo')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="extracto">Extracto <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('extracto') is-invalid @enderror"
                                          id="extracto"
                                          name="extracto"
                                          rows="3"
                                          placeholder="Resumen breve de la noticia..."
                                          required>{{ old('extracto', $noticia['extracto']) }}</textarea>
                                @error('extracto')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="contenido">Contenido Completo <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('contenido') is-invalid @enderror"
                                          id="contenido"
                                          name="contenido"
                                          rows="12"
                                          placeholder="Escriba el contenido completo de la noticia..."
                                          required>{{ old('contenido', $noticia['contenido']) }}</textarea>
                                @error('contenido')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="imagen">URL de la Imagen <span class="text-danger">*</span></label>
                                <input type="url"
                                       class="form-control @error('imagen') is-invalid @enderror"
                                       id="imagen"
                                       name="imagen"
                                       value="{{ old('imagen', $noticia['imagen']) }}"
                                       placeholder="https://ejemplo.com/imagen.jpg"
                                       required>
                                @error('imagen')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Current Image Preview -->
                            <div class="form-group">
                                <label>Imagen Actual</label>
                                <div class="text-center">
                                    <img id="currentImg"
                                         src="{{ $noticia['imagen'] }}"
                                         alt="Current"
                                         class="img-fluid rounded shadow"
                                         style="max-height: 300px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Publish Settings -->
                    <div class="card card-warning card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-cog"></i>
                                Configuración
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
                                    <option value="{{ $cat['nombre'] }}"
                                            {{ old('categoria', $noticia['categoria']) == $cat['nombre'] ? 'selected' : '' }}>
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
                                       value="{{ old('autor', $noticia['autor']) }}"
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
                                           {{ old('destacada', $noticia['destacada']) ? 'checked' : '' }}>
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
                                       value="{{ old('tags', isset($noticia['tags']) ? implode(', ', $noticia['tags']) : '') }}"
                                       placeholder="tecnología, innovación, educación">
                                @error('tags')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <small class="text-muted">Separadas por comas</small>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-warning btn-block btn-lg">
                                <i class="fas fa-save"></i> Actualizar Noticia
                            </button>
                            <a href="{{ route('admin.noticias.noticias.index') }}" class="btn btn-secondary btn-block">
                                <i class="fas fa-times"></i> Cancelar
                            </a>
                        </div>
                    </div>

                    <!-- Info Card -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-info-circle"></i>
                                Información
                            </h3>
                        </div>
                        <div class="card-body">
                            <p class="mb-2">
                                <strong>Fecha de publicación:</strong><br>
                                {{ \Carbon\Carbon::parse($noticia['fecha'])->format('d/m/Y H:i') }}
                            </p>
                            <p class="mb-2">
                                <strong>Vistas:</strong><br>
                                {{ number_format($noticia['vistas']) }}
                            </p>
                            <p class="mb-0">
                                <strong>Estado:</strong><br>
                                @if($noticia['destacada'])
                                    <span class="badge badge-warning">
                                        <i class="fas fa-star"></i> Destacada
                                    </span>
                                @else
                                    <span class="badge badge-secondary">Normal</span>
                                @endif
                            </p>
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
    // Preview de imagen al cambiar URL
    document.getElementById('imagen').addEventListener('blur', function() {
        const url = this.value;
        const img = document.getElementById('currentImg');

        if (url) {
            img.src = url;
        }
    });
</script>
@endpush
