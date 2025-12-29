@extends('layouts.app')

@section('title', 'Noticias - UNMSM')

@push('styles')
<!-- AOS (Animate On Scroll) -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --text-dark: #2c3e50;
            --text-light: #7f8c8d;
            --bg-light: #f8f9fa;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-dark);
            line-height: 1.6;
        }

        /* Hero Section */
        .news-hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 100px 0 80px;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .news-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            opacity: 0.3;
        }

        .news-hero h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            position: relative;
        }

        .news-hero .search-box {
            max-width: 600px;
            margin: 2rem auto 0;
            position: relative;
        }

        .news-hero .search-box input {
            padding: 15px 50px 15px 20px;
            border-radius: 50px;
            border: none;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .news-hero .search-box button {
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
            border-radius: 50px;
            padding: 10px 25px;
        }

        /* Category Filter */
        .category-filter {
            background: white;
            padding: 30px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-top: -30px;
            position: relative;
            z-index: 10;
            border-radius: 10px;
        }

        .category-btn {
            padding: 12px 24px;
            border-radius: 50px;
            border: 2px solid #e0e0e0;
            background: white;
            color: var(--text-dark);
            font-weight: 500;
            transition: all 0.3s ease;
            margin: 5px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .category-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border-color: var(--secondary-color);
            color: var(--secondary-color);
        }

        .category-btn.active {
            background: var(--secondary-color);
            border-color: var(--secondary-color);
            color: white;
        }

        /* Featured News */
        .featured-section {
            padding: 60px 0;
            background: var(--bg-light);
        }

        .featured-news-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            height: 100%;
        }

        .featured-news-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .featured-news-card .card-img-wrapper {
            position: relative;
            overflow: hidden;
            height: 300px;
        }

        .featured-news-card .card-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .featured-news-card:hover .card-img-wrapper img {
            transform: scale(1.1);
        }

        .featured-news-card .card-category {
            position: absolute;
            top: 20px;
            left: 20px;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            background: rgba(255,255,255,0.95);
            z-index: 2;
        }

        .featured-news-card .card-body {
            padding: 30px;
        }

        .featured-news-card .card-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: var(--text-dark);
            line-height: 1.3;
        }

        .featured-news-card .card-text {
            color: var(--text-light);
            margin-bottom: 20px;
        }

        .featured-news-card .card-meta {
            display: flex;
            align-items: center;
            gap: 20px;
            font-size: 0.9rem;
            color: var(--text-light);
            padding-top: 15px;
            border-top: 1px solid #e0e0e0;
        }

        .featured-news-card .card-meta i {
            margin-right: 5px;
        }

        /* Regular News Grid */
        .news-section {
            padding: 60px 0;
        }

        .news-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.12);
        }

        .news-card .card-img-top {
            height: 220px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .news-card:hover .card-img-top {
            transform: scale(1.05);
        }

        .news-card .card-img-wrapper {
            overflow: hidden;
            position: relative;
        }

        .news-card .card-body {
            padding: 25px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .news-card .badge-category {
            font-size: 0.75rem;
            padding: 6px 12px;
            border-radius: 15px;
            font-weight: 600;
            margin-bottom: 12px;
            display: inline-block;
            width: fit-content;
        }

        .news-card .card-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 12px;
            color: var(--text-dark);
            line-height: 1.4;
        }

        .news-card .card-text {
            color: var(--text-light);
            font-size: 0.95rem;
            margin-bottom: auto;
        }

        .news-card .card-footer {
            background: transparent;
            border-top: 1px solid #e0e0e0;
            padding: 15px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .news-card .card-date {
            font-size: 0.85rem;
            color: var(--text-light);
        }

        .news-card .read-more {
            color: var(--secondary-color);
            font-weight: 600;
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .news-card .read-more:hover {
            color: var(--accent-color);
            gap: 8px;
        }

        .news-card .read-more i {
            transition: transform 0.3s ease;
        }

        .news-card:hover .read-more i {
            transform: translateX(5px);
        }

        /* Sidebar */
        .sidebar {
            position: sticky;
            top: 20px;
        }

        .sidebar-widget {
            background: white;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        .sidebar-widget h4 {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 3px solid var(--secondary-color);
        }

        .recent-news-item {
            display: flex;
            gap: 15px;
            padding: 15px 0;
            border-bottom: 1px solid #e0e0e0;
            transition: all 0.3s ease;
        }

        .recent-news-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .recent-news-item:hover {
            transform: translateX(5px);
        }

        .recent-news-item img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
        }

        .recent-news-item .content h5 {
            font-size: 0.95rem;
            font-weight: 600;
            margin-bottom: 8px;
            line-height: 1.3;
        }

        .recent-news-item .content h5 a {
            color: var(--text-dark);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .recent-news-item .content h5 a:hover {
            color: var(--secondary-color);
        }

        .recent-news-item .content small {
            color: var(--text-light);
            font-size: 0.8rem;
        }

        /* Categories Widget */
        .category-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .category-list li {
            padding: 12px 0;
            border-bottom: 1px solid #e0e0e0;
            transition: all 0.3s ease;
        }

        .category-list li:last-child {
            border-bottom: none;
        }

        .category-list li:hover {
            padding-left: 10px;
        }

        .category-list li a {
            color: var(--text-dark);
            text-decoration: none;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 500;
        }

        .category-list li a:hover {
            color: var(--secondary-color);
        }

        .category-list .count {
            background: var(--bg-light);
            padding: 4px 10px;
            border-radius: 15px;
            font-size: 0.85rem;
            color: var(--text-light);
        }

        /* Stats Section */
        .stats-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 60px 0;
            color: white;
        }

        .stat-card {
            text-align: center;
            padding: 30px;
        }

        .stat-card i {
            font-size: 3rem;
            margin-bottom: 15px;
            opacity: 0.9;
        }

        .stat-card h3 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .stat-card p {
            font-size: 1.1rem;
            opacity: 0.9;
            margin: 0;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .news-hero h1 {
                font-size: 2rem;
            }

            .featured-news-card .card-img-wrapper {
                height: 200px;
            }

            .category-filter {
                text-align: center;
            }
        }

        [data-aos] {
            pointer-events: auto;
        }
    </style>
@endpush

@section('content')

    <!-- Hero Section -->
    <section class="news-hero">
        <div class="container">
            <div class="text-center" data-aos="fade-down">
                <h1>Noticias Universitarias</h1>
                <p class="lead mb-0">Mantente informado sobre las últimas novedades de nuestra comunidad académica</p>

                <div class="search-box">
                    <form action="{{ route('noticias.index') }}" method="GET">
                        <div class="input-group">
                            <input type="text"
                                   name="buscar"
                                   class="form-control"
                                   placeholder="Buscar noticias..."
                                   value="{{ request('buscar') }}">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search"></i> Buscar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Category Filter -->
    <section class="category-filter" data-aos="fade-up">
        <div class="container">
            <div class="text-center">
                <a href="{{ route('noticias.index') }}"
                   class="category-btn {{ !$categoriaActual ? 'active' : '' }}">
                    <i class="fas fa-th-large"></i> Todas
                </a>
                @foreach($categorias as $categoria)
                <a href="{{ route('noticias.index', ['categoria' => $categoria['slug']]) }}"
                   class="category-btn {{ $categoriaActual == $categoria['slug'] ? 'active' : '' }}">
                    <i class="fas {{ $categoria['icono'] }}"></i> {{ $categoria['nombre'] }}
                </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Featured News -->
    @if(count($noticiasDestacadas) > 0 && !$categoriaActual)
    <section class="featured-section">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="display-5 fw-bold">Noticias Destacadas</h2>
                <p class="text-muted">Lo más relevante de nuestra universidad</p>
            </div>

            <div class="row g-4">
                @foreach(array_slice($noticiasDestacadas, 0, 3) as $index => $noticia)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="featured-news-card">
                        <div class="card-img-wrapper">
                            <img src="{{ $noticia['imagen'] }}" alt="{{ $noticia['titulo'] }}">
                            <span class="card-category badge bg-{{ $categorias[array_search($noticia['categoria'], array_column($categorias, 'nombre'))]['color'] ?? 'primary' }}">
                                {{ $noticia['categoria'] }}
                            </span>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">{{ $noticia['titulo'] }}</h3>
                            <p class="card-text">{{ $noticia['extracto'] }}</p>
                            <div class="card-meta">
                                <span>
                                    <i class="far fa-calendar"></i>
                                    {{ \Carbon\Carbon::parse($noticia['fecha'])->format('d M, Y') }}
                                </span>
                                <span>
                                    <i class="far fa-eye"></i>
                                    {{ number_format($noticia['vistas']) }} vistas
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- News Grid -->
    <section class="news-section">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <div class="mb-4" data-aos="fade-up">
                        <h2 class="fw-bold">
                            @if($categoriaActual)
                                Noticias de {{ $categoriaActual }}
                            @else
                                Todas las Noticias
                            @endif
                        </h2>
                        <p class="text-muted">{{ count($noticiasRegulares) }} noticias encontradas</p>
                    </div>

                    <div class="row g-4">
                        @forelse($noticiasRegulares as $index => $noticia)
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="{{ ($index % 4) * 50 }}">
                            <div class="news-card">
                                <div class="card-img-wrapper">
                                    <img src="{{ $noticia['imagen'] }}" class="card-img-top" alt="{{ $noticia['titulo'] }}">
                                </div>
                                <div class="card-body">
                                    <span class="badge-category bg-{{ $categorias[array_search($noticia['categoria'], array_column($categorias, 'nombre'))]['color'] ?? 'primary' }}">
                                        {{ $noticia['categoria'] }}
                                    </span>
                                    <h5 class="card-title">{{ $noticia['titulo'] }}</h5>
                                    <p class="card-text">{{ Str::limit($noticia['extracto'], 100) }}</p>
                                </div>
                                <div class="card-footer">
                                    <span class="card-date">
                                        <i class="far fa-calendar"></i>
                                        {{ \Carbon\Carbon::parse($noticia['fecha'])->format('d M, Y') }}
                                    </span>
                                    <a href="#" class="read-more">
                                        Leer más <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12">
                            <div class="alert alert-info text-center">
                                <i class="fas fa-info-circle fa-3x mb-3"></i>
                                <h4>No se encontraron noticias</h4>
                                <p class="mb-0">No hay noticias disponibles en esta categoría.</p>
                            </div>
                        </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="mt-5 text-center" data-aos="fade-up">
                        <button class="btn btn-outline-primary btn-lg">
                            <i class="fas fa-plus-circle"></i> Cargar más noticias
                        </button>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="sidebar">
                        <!-- Recent News Widget -->
                        <div class="sidebar-widget" data-aos="fade-left">
                            <h4>
                                <i class="fas fa-clock"></i> Noticias Recientes
                            </h4>
                            @foreach(array_slice($noticias, 0, 4) as $noticia)
                            <div class="recent-news-item">
                                <img src="{{ $noticia['imagen'] }}" alt="{{ $noticia['titulo'] }}">
                                <div class="content">
                                    <h5>
                                        <a href="#">{{ Str::limit($noticia['titulo'], 60) }}</a>
                                    </h5>
                                    <small>
                                        <i class="far fa-calendar"></i>
                                        {{ \Carbon\Carbon::parse($noticia['fecha'])->format('d M, Y') }}
                                    </small>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <!-- Categories Widget -->
                        <div class="sidebar-widget" data-aos="fade-left" data-aos-delay="100">
                            <h4>
                                <i class="fas fa-folder"></i> Categorías
                            </h4>
                            <ul class="category-list">
                                @foreach($categorias as $categoria)
                                <li>
                                    <a href="{{ route('noticias.index', ['categoria' => $categoria['slug']]) }}">
                                        <span>
                                            <i class="fas {{ $categoria['icono'] }} me-2"></i>
                                            {{ $categoria['nombre'] }}
                                        </span>
                                        <span class="count">
                                            {{ count(array_filter($noticias, fn($n) => $n['categoria'] == $categoria['nombre'])) }}
                                        </span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Tags Widget -->
                        <div class="sidebar-widget" data-aos="fade-left" data-aos-delay="200">
                            <h4>
                                <i class="fas fa-tags"></i> Etiquetas Populares
                            </h4>
                            <div class="d-flex flex-wrap gap-2">
                                @php
                                    $allTags = [];
                                    foreach($noticias as $noticia) {
                                        if(isset($noticia['tags'])) {
                                            $allTags = array_merge($allTags, $noticia['tags']);
                                        }
                                    }
                                    $uniqueTags = array_unique($allTags);
                                @endphp
                                @foreach(array_slice($uniqueTags, 0, 10) as $tag)
                                <a href="#" class="badge bg-secondary text-decoration-none" style="font-size: 0.9rem; padding: 8px 12px;">
                                    {{ $tag }}
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section" data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-6">
                    <div class="stat-card" data-aos="zoom-in" data-aos-delay="0">
                        <i class="fas fa-newspaper"></i>
                        <h3>{{ count($noticias) }}</h3>
                        <p>Noticias Publicadas</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-card" data-aos="zoom-in" data-aos-delay="100">
                        <i class="fas fa-folder-open"></i>
                        <h3>{{ count($categorias) }}</h3>
                        <p>Categorías</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-card" data-aos="zoom-in" data-aos-delay="200">
                        <i class="fas fa-eye"></i>
                        <h3>{{ number_format(array_sum(array_column($noticias, 'vistas'))) }}</h3>
                        <p>Lectores</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-card" data-aos="zoom-in" data-aos-delay="300">
                        <i class="fas fa-calendar-week"></i>
                        <h3>24/7</h3>
                        <p>Actualización</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });
    </script>
@endpush
