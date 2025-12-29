@extends('layouts.admin')

@section('title', 'Nueva Categoría de Noticias')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">
                    <i class="fas fa-plus-circle text-primary"></i>
                    Nueva Categoría
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.noticias.noticias.index') }}">Noticias</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.noticias.categorias.index') }}">Categorías</a></li>
                    <li class="breadcrumb-item active">Crear</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Main Form -->
            <div class="col-lg-8">
                <form action="{{ route('admin.noticias.categorias.store') }}" method="POST">
                    @csrf

                    <div class="card">
                        <div class="card-header bg-primary">
                            <h3 class="card-title">
                                <i class="fas fa-folder mr-2"></i>
                                Información de la Categoría
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nombre">Nombre de la Categoría <span class="text-danger">*</span></label>
                                <input type="text"
                                       class="form-control form-control-lg @error('nombre') is-invalid @enderror"
                                       id="nombre"
                                       name="nombre"
                                       value="{{ old('nombre') }}"
                                       placeholder="Ej: Institucional, Tecnología, Eventos..."
                                       required>
                                @error('nombre')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <small class="text-muted">
                                    <i class="fas fa-info-circle"></i> Nombre descriptivo de la categoría
                                </small>
                            </div>

                            <div class="form-group">
                                <label for="slug">Slug (URL amigable) <span class="text-danger">*</span></label>
                                <input type="text"
                                       class="form-control @error('slug') is-invalid @enderror"
                                       id="slug"
                                       name="slug"
                                       value="{{ old('slug') }}"
                                       placeholder="institucional, tecnologia, eventos..."
                                       required>
                                @error('slug')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <small class="text-muted">
                                    <i class="fas fa-info-circle"></i> Se generará automáticamente desde el nombre o puede personalizarlo
                                </small>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="color">Color Bootstrap <span class="text-danger">*</span></label>
                                        <select class="form-control @error('color') is-invalid @enderror"
                                                id="color"
                                                name="color"
                                                required>
                                            <option value="">Seleccione un color...</option>
                                            <option value="primary" {{ old('color') == 'primary' ? 'selected' : '' }}>Azul (Primary)</option>
                                            <option value="secondary" {{ old('color') == 'secondary' ? 'selected' : '' }}>Gris (Secondary)</option>
                                            <option value="success" {{ old('color') == 'success' ? 'selected' : '' }}>Verde (Success)</option>
                                            <option value="danger" {{ old('color') == 'danger' ? 'selected' : '' }}>Rojo (Danger)</option>
                                            <option value="warning" {{ old('color') == 'warning' ? 'selected' : '' }}>Amarillo (Warning)</option>
                                            <option value="info" {{ old('color') == 'info' ? 'selected' : '' }}>Cian (Info)</option>
                                            <option value="dark" {{ old('color') == 'dark' ? 'selected' : '' }}>Negro (Dark)</option>
                                        </select>
                                        @error('color')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                        <small class="text-muted">Color para identificación visual</small>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="icono">Icono Font Awesome <span class="text-danger">*</span></label>
                                        <input type="text"
                                               class="form-control @error('icono') is-invalid @enderror"
                                               id="icono"
                                               name="icono"
                                               value="{{ old('icono') }}"
                                               placeholder="fa-newspaper"
                                               required>
                                        @error('icono')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                        <small class="text-muted">Sin prefijo "fas" - Ej: fa-newspaper</small>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="descripcion">Descripción <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('descripcion') is-invalid @enderror"
                                          id="descripcion"
                                          name="descripcion"
                                          rows="3"
                                          placeholder="Descripción breve de qué tipo de noticias agrupa esta categoría..."
                                          required>{{ old('descripcion') }}</textarea>
                                @error('descripcion')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <small class="text-muted">
                                    <i class="fas fa-info-circle"></i> Máximo 255 caracteres
                                </small>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Guardar Categoría
                            </button>
                            <a href="{{ route('admin.noticias.categorias.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Cancelar
                            </a>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Preview Card -->
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-eye"></i>
                            Vista Previa
                        </h3>
                    </div>
                    <div class="card-body">
                        <div id="preview-container">
                            <div class="callout" id="preview-callout" style="border-left-color: #007bff;">
                                <h5 id="preview-name">
                                    <i class="fas fa-folder" id="preview-icon"></i>
                                    Nombre de Categoría
                                </h5>
                                <p id="preview-description">La descripción aparecerá aquí...</p>
                                <span class="badge" id="preview-badge" style="background-color: #007bff;">
                                    slug-ejemplo
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Help Card -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-lightbulb"></i>
                            Iconos Sugeridos
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-2">
                            <i class="fas fa-university fa-lg text-primary mr-2"></i>
                            <code>fa-university</code> - Institucional
                        </div>
                        <div class="mb-2">
                            <i class="fas fa-graduation-cap fa-lg text-info mr-2"></i>
                            <code>fa-graduation-cap</code> - Académico
                        </div>
                        <div class="mb-2">
                            <i class="fas fa-flask fa-lg text-success mr-2"></i>
                            <code>fa-flask</code> - Investigación
                        </div>
                        <div class="mb-2">
                            <i class="fas fa-calendar-alt fa-lg text-warning mr-2"></i>
                            <code>fa-calendar-alt</code> - Eventos
                        </div>
                        <div class="mb-2">
                            <i class="fas fa-laptop-code fa-lg text-danger mr-2"></i>
                            <code>fa-laptop-code</code> - Tecnología
                        </div>
                        <div class="mb-2">
                            <i class="fas fa-globe fa-lg text-secondary mr-2"></i>
                            <code>fa-globe</code> - Internacional
                        </div>
                        <hr>
                        <small class="text-muted">
                            Más iconos en <a href="https://fontawesome.com/icons" target="_blank">fontawesome.com</a>
                        </small>
                    </div>
                </div>

                <!-- Info Card -->
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-question-circle"></i>
                            Ayuda
                        </h3>
                    </div>
                    <div class="card-body">
                        <p><strong>Nombre:</strong> Identificador de la categoría.</p>
                        <p><strong>Slug:</strong> Versión amigable para URLs.</p>
                        <p><strong>Color:</strong> Para diferenciación visual.</p>
                        <p><strong>Icono:</strong> Representación gráfica.</p>
                        <p class="mb-0"><strong>Descripción:</strong> Breve explicación del tipo de noticias.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Auto-generar slug desde nombre
    document.getElementById('nombre').addEventListener('input', function() {
        const nombre = this.value;
        const slug = nombre
            .toLowerCase()
            .normalize("NFD").replace(/[\u0300-\u036f]/g, "") // Remover acentos
            .replace(/[^a-z0-9]+/g, '-')
            .replace(/^-+|-+$/g, '');

        document.getElementById('slug').value = slug;
        updatePreview();
    });

    // Actualizar preview en tiempo real
    function updatePreview() {
        const nombre = document.getElementById('nombre').value || 'Nombre de Categoría';
        const descripcion = document.getElementById('descripcion').value || 'La descripción aparecerá aquí...';
        const slug = document.getElementById('slug').value || 'slug-ejemplo';
        const color = document.getElementById('color').value || 'primary';
        const icono = document.getElementById('icono').value || 'fa-folder';

        const colorMap = {
            'primary': '#007bff',
            'secondary': '#6c757d',
            'success': '#28a745',
            'danger': '#dc3545',
            'warning': '#ffc107',
            'info': '#17a2b8',
            'dark': '#343a40'
        };

        document.getElementById('preview-name').innerHTML = `<i class="fas ${icono}" id="preview-icon"></i> ${nombre}`;
        document.getElementById('preview-description').textContent = descripcion;
        document.getElementById('preview-badge').textContent = slug;
        document.getElementById('preview-badge').style.backgroundColor = colorMap[color] || '#007bff';
        document.getElementById('preview-callout').style.borderLeftColor = colorMap[color] || '#007bff';
    }

    // Event listeners para actualizar preview
    ['nombre', 'descripcion', 'slug', 'color', 'icono'].forEach(id => {
        document.getElementById(id).addEventListener('input', updatePreview);
    });
</script>
@endpush
