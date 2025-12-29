@extends('layouts.admin')

@section('title', 'Editar Categoría de Noticias')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">
                    <i class="fas fa-edit text-warning"></i>
                    Editar Categoría
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.noticias.noticias.index') }}">Noticias</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.noticias.categorias.index') }}">Categorías</a></li>
                    <li class="breadcrumb-item active">Editar</li>
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
                <form action="{{ route('admin.noticias.categorias.update', $id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card card-{{ $categoria['color'] ?? 'primary' }} card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas {{ $categoria['icono'] ?? 'fa-folder' }} mr-2"></i>
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
                                       value="{{ old('nombre', $categoria['nombre']) }}"
                                       placeholder="Ej: Institucional, Tecnología, Eventos..."
                                       required>
                                @error('nombre')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="slug">Slug (URL amigable) <span class="text-danger">*</span></label>
                                <input type="text"
                                       class="form-control @error('slug') is-invalid @enderror"
                                       id="slug"
                                       name="slug"
                                       value="{{ old('slug', $categoria['slug']) }}"
                                       placeholder="institucional, tecnologia, eventos..."
                                       required>
                                @error('slug')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <small class="text-muted">
                                    <i class="fas fa-info-circle"></i> URL amigable para filtros y enlaces
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
                                            <option value="primary" {{ old('color', $categoria['color']) == 'primary' ? 'selected' : '' }}>Azul (Primary)</option>
                                            <option value="secondary" {{ old('color', $categoria['color']) == 'secondary' ? 'selected' : '' }}>Gris (Secondary)</option>
                                            <option value="success" {{ old('color', $categoria['color']) == 'success' ? 'selected' : '' }}>Verde (Success)</option>
                                            <option value="danger" {{ old('color', $categoria['color']) == 'danger' ? 'selected' : '' }}>Rojo (Danger)</option>
                                            <option value="warning" {{ old('color', $categoria['color']) == 'warning' ? 'selected' : '' }}>Amarillo (Warning)</option>
                                            <option value="info" {{ old('color', $categoria['color']) == 'info' ? 'selected' : '' }}>Cian (Info)</option>
                                            <option value="dark" {{ old('color', $categoria['color']) == 'dark' ? 'selected' : '' }}>Negro (Dark)</option>
                                        </select>
                                        @error('color')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="icono">Icono Font Awesome <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas {{ $categoria['icono'] ?? 'fa-folder' }}" id="icon-preview"></i>
                                                </span>
                                            </div>
                                            <input type="text"
                                                   class="form-control @error('icono') is-invalid @enderror"
                                                   id="icono"
                                                   name="icono"
                                                   value="{{ old('icono', $categoria['icono']) }}"
                                                   placeholder="fa-newspaper"
                                                   required>
                                        </div>
                                        @error('icono')
                                            <span class="invalid-feedback d-block">{{ $message }}</span>
                                        @enderror
                                        <small class="text-muted">Sin prefijo "fas"</small>
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
                                          required>{{ old('descripcion', $categoria['descripcion']) }}</textarea>
                                @error('descripcion')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-warning">
                                <i class="fas fa-save"></i> Actualizar Categoría
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
                <div class="card card-{{ $categoria['color'] ?? 'primary' }} card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-eye"></i>
                            Vista Previa
                        </h3>
                    </div>
                    <div class="card-body">
                        <div id="preview-container">
                            <div class="callout callout-{{ $categoria['color'] ?? 'primary' }}" id="preview-callout">
                                <h5 id="preview-name">
                                    <i class="fas {{ $categoria['icono'] ?? 'fa-folder' }}" id="preview-icon"></i>
                                    {{ $categoria['nombre'] }}
                                </h5>
                                <p id="preview-description">{{ $categoria['descripcion'] }}</p>
                                <span class="badge badge-{{ $categoria['color'] ?? 'primary' }}" id="preview-badge">
                                    {{ $categoria['slug'] }}
                                </span>
                            </div>
                        </div>
                        <small class="text-muted">
                            <i class="fas fa-info-circle"></i> Así se verá la categoría en el sistema
                        </small>
                    </div>
                </div>

                <!-- Stats Card -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-chart-bar"></i>
                            Estadísticas
                        </h3>
                    </div>
                    <div class="card-body">
                        @php
                            $noticias = session('noticias', []);
                            $noticiasCategoria = array_filter($noticias, fn($n) => $n['categoria'] == $categoria['nombre']);
                            $totalNoticias = count($noticiasCategoria);
                            $noticiasDestacadas = count(array_filter($noticiasCategoria, fn($n) => $n['destacada']));
                        @endphp
                        <dl class="row mb-0">
                            <dt class="col-sm-7">Noticias en esta categoría:</dt>
                            <dd class="col-sm-5">
                                <span class="badge badge-primary badge-lg">{{ $totalNoticias }}</span>
                            </dd>

                            <dt class="col-sm-7">Noticias destacadas:</dt>
                            <dd class="col-sm-5">
                                <span class="badge badge-warning badge-lg">{{ $noticiasDestacadas }}</span>
                            </dd>
                        </dl>
                    </div>
                </div>

                <!-- Help Card -->
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-lightbulb"></i>
                            Iconos Sugeridos
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-2">
                            <i class="fas fa-university fa-lg text-primary mr-2"></i>
                            <code>fa-university</code>
                        </div>
                        <div class="mb-2">
                            <i class="fas fa-graduation-cap fa-lg text-info mr-2"></i>
                            <code>fa-graduation-cap</code>
                        </div>
                        <div class="mb-2">
                            <i class="fas fa-flask fa-lg text-success mr-2"></i>
                            <code>fa-flask</code>
                        </div>
                        <div class="mb-2">
                            <i class="fas fa-calendar-alt fa-lg text-warning mr-2"></i>
                            <code>fa-calendar-alt</code>
                        </div>
                        <div class="mb-2">
                            <i class="fas fa-laptop-code fa-lg text-danger mr-2"></i>
                            <code>fa-laptop-code</code>
                        </div>
                        <div class="mb-0">
                            <i class="fas fa-globe fa-lg text-secondary mr-2"></i>
                            <code>fa-globe</code>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Actualizar preview del icono en tiempo real
    document.getElementById('icono').addEventListener('input', function() {
        const iconClass = this.value || 'fa-folder';
        document.getElementById('icon-preview').className = `fas ${iconClass}`;
        document.getElementById('preview-icon').className = `fas ${iconClass}`;
    });

    // Actualizar preview en tiempo real
    function updatePreview() {
        const nombre = document.getElementById('nombre').value;
        const descripcion = document.getElementById('descripcion').value;
        const slug = document.getElementById('slug').value;
        const icono = document.getElementById('icono').value;

        if (nombre) {
            document.getElementById('preview-name').innerHTML =
                `<i class="fas ${icono}" id="preview-icon"></i> ${nombre}`;
        }
        if (descripcion) {
            document.getElementById('preview-description').textContent = descripcion;
        }
        if (slug) {
            document.getElementById('preview-badge').textContent = slug;
        }
    }

    // Event listeners
    ['nombre', 'descripcion', 'slug', 'icono'].forEach(id => {
        document.getElementById(id).addEventListener('input', updatePreview);
    });
</script>
@endpush
