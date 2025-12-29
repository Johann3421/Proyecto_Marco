@extends('layouts.admin')

@section('title', 'Gestión de Noticias')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">
                    <i class="fas fa-newspaper text-primary"></i>
                    Gestión de Noticias
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Noticias</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <!-- Statistics Cards -->
        <div class="row mb-4">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ count($noticias) }}</h3>
                        <p>Total Noticias</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-newspaper"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ count(array_filter($noticias, fn($n) => $n['destacada'])) }}</h3>
                        <p>Destacadas</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ number_format(array_sum(array_column($noticias, 'vistas'))) }}</h3>
                        <p>Total Vistas</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-eye"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ count(array_unique(array_column($noticias, 'categoria'))) }}</h3>
                        <p>Categorías</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-folder"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions Bar -->
        <div class="row mb-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <div class="mb-2 mb-md-0">
                                <a href="{{ route('admin.noticias.noticias.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus-circle"></i> Nueva Noticia
                                </a>
                                <a href="{{ route('admin.noticias.categorias.index') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-folder"></i> Gestionar Categorías
                                </a>
                            </div>
                            <div class="input-group" style="max-width: 300px;">
                                <input type="text" id="searchInput" class="form-control" placeholder="Buscar noticias...">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Noticias List -->
        <div class="row">
            <div class="col-12">
                @if(count($noticias) > 0)
                    @foreach($noticias as $index => $noticia)
                    <div class="card mb-3 noticia-item">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="{{ $noticia['imagen'] }}"
                                         alt="{{ $noticia['titulo'] }}"
                                         class="img-fluid rounded shadow-sm"
                                         style="max-height: 120px; width: 100%; object-fit: cover;">
                                    @if($noticia['destacada'])
                                    <span class="badge badge-warning mt-2">
                                        <i class="fas fa-star"></i> Destacada
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-7">
                                    <h4 class="mb-2">
                                        {{ $noticia['titulo'] }}
                                    </h4>
                                    <p class="text-muted mb-2">
                                        <small>{{ $noticia['extracto'] }}</small>
                                    </p>
                                    <div class="d-flex flex-wrap gap-2">
                                        <span class="badge badge-{{
                                            $noticia['categoria'] == 'Institucional' ? 'primary' :
                                            ($noticia['categoria'] == 'Académico' ? 'info' :
                                            ($noticia['categoria'] == 'Investigación' ? 'success' :
                                            ($noticia['categoria'] == 'Eventos' ? 'warning' : 'danger')))
                                        }}">
                                            {{ $noticia['categoria'] }}
                                        </span>
                                        @if(isset($noticia['tags']) && count($noticia['tags']) > 0)
                                            @foreach(array_slice($noticia['tags'], 0, 3) as $tag)
                                            <span class="badge badge-secondary">{{ $tag }}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="mt-2">
                                        <small class="text-muted">
                                            <i class="far fa-calendar"></i> {{ \Carbon\Carbon::parse($noticia['fecha'])->format('d/m/Y') }}
                                            <span class="mx-2">|</span>
                                            <i class="fas fa-user"></i> {{ $noticia['autor'] }}
                                            <span class="mx-2">|</span>
                                            <i class="far fa-eye"></i> {{ number_format($noticia['vistas']) }} vistas
                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-3 text-right">
                                    <div class="btn-group-vertical">
                                        <a href="{{ route('noticias.show', $index) }}"
                                           target="_blank"
                                           class="btn btn-sm btn-outline-info mb-1">
                                            <i class="fas fa-eye"></i> Vista Previa
                                        </a>
                                        <a href="{{ route('admin.noticias.noticias.edit', $index) }}"
                                           class="btn btn-sm btn-warning mb-1">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <form action="{{ route('admin.noticias.noticias.destroy', $index) }}"
                                              method="POST"
                                              onsubmit="return confirm('¿Está seguro de eliminar esta noticia?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger btn-block">
                                                <i class="fas fa-trash"></i> Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!-- Pagination Info -->
                    <div class="card">
                        <div class="card-footer">
                            <div class="text-muted">
                                <i class="fas fa-info-circle"></i>
                                Mostrando <strong>{{ count($noticias) }}</strong> noticias en total
                            </div>
                        </div>
                    </div>
                @else
                    <div class="card">
                        <div class="card-body">
                            <div class="alert alert-info text-center mb-0">
                                <i class="fas fa-info-circle fa-3x mb-3"></i>
                                <h4>No hay noticias registradas</h4>
                                <p class="mb-3">Comience creando su primera noticia para informar a la comunidad universitaria.</p>
                                <a href="{{ route('admin.noticias.noticias.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus-circle"></i> Crear Primera Noticia
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Búsqueda en tiempo real
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const searchTerm = this.value.toLowerCase();
        const items = document.querySelectorAll('.noticia-item');

        items.forEach(item => {
            const text = item.textContent.toLowerCase();
            if (text.includes(searchTerm)) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        });
    });
</script>
@endpush
