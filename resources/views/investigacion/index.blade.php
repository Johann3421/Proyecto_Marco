@extends('layouts.app')

@section('title', 'Investigación - UNMSM')

@push('styles')
<!-- AOS (Animate On Scroll) -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<style>
    /* Hero Section */
    .investigacion-hero {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 100px 0 80px;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .investigacion-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        opacity: 0.3;
    }

    .investigacion-hero h1 {
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
    }

    .investigacion-hero p {
        font-size: 1.3rem;
        opacity: 0.95;
        max-width: 700px;
        margin: 0 auto 2rem;
    }

    /* Estadísticas Cards */
    .stats-card {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        border: none;
        height: 100%;
    }

    .stats-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.15);
    }

    .stats-icon {
        width: 70px;
        height: 70px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        margin-bottom: 1rem;
    }

    .stats-number {
        font-size: 2.5rem;
        font-weight: 700;
        margin: 0.5rem 0;
    }

    /* Líneas de Investigación */
    .linea-card {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        border-left: 5px solid;
        height: 100%;
        position: relative;
        overflow: hidden;
    }

    .linea-card::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 100px;
        height: 100px;
        opacity: 0.1;
        transition: all 0.3s ease;
    }

    .linea-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.12);
    }

    .linea-card:hover::before {
        transform: scale(1.2) rotate(10deg);
    }

    .linea-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        margin-bottom: 1rem;
    }

    .linea-badge {
        position: absolute;
        top: 1rem;
        right: 1rem;
        padding: 0.4rem 0.8rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
    }

    /* Proyectos Cards */
    .proyecto-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        transition: all 0.4s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .proyecto-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }

    .proyecto-imagen {
        height: 220px;
        background-size: cover;
        background-position: center;
        position: relative;
        overflow: hidden;
    }

    .proyecto-imagen::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to bottom, transparent 0%, rgba(0,0,0,0.7) 100%);
    }

    .proyecto-badge {
        position: absolute;
        top: 1rem;
        right: 1rem;
        z-index: 1;
        padding: 0.5rem 1rem;
        border-radius: 25px;
        font-weight: 600;
        font-size: 0.85rem;
    }

    .proyecto-content {
        padding: 1.5rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .proyecto-titulo {
        font-size: 1.3rem;
        font-weight: 700;
        margin-bottom: 0.8rem;
        color: #2d3748;
    }

    .proyecto-meta {
        font-size: 0.9rem;
        color: #718096;
        margin-bottom: 0.5rem;
    }

    .proyecto-meta i {
        margin-right: 0.5rem;
        color: #667eea;
    }

    /* Investigadores */
    .investigador-card {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        text-align: center;
        height: 100%;
    }

    .investigador-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.12);
    }

    .investigador-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        margin: 0 auto 1.5rem;
        object-fit: cover;
        border: 5px solid #f7fafc;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .investigador-nombre {
        font-size: 1.2rem;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 0.5rem;
    }

    .investigador-stats {
        display: flex;
        justify-content: space-around;
        margin-top: 1.5rem;
        padding-top: 1.5rem;
        border-top: 2px solid #e2e8f0;
    }

    .investigador-stat-item {
        text-align: center;
    }

    .investigador-stat-number {
        font-size: 1.5rem;
        font-weight: 700;
        color: #667eea;
        display: block;
    }

    .investigador-stat-label {
        font-size: 0.8rem;
        color: #718096;
        text-transform: uppercase;
    }

    /* Publicaciones */
    .publicacion-item {
        background: white;
        border-radius: 10px;
        padding: 1.5rem;
        box-shadow: 0 3px 10px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        border-left: 4px solid #667eea;
        margin-bottom: 1rem;
    }

    .publicacion-item:hover {
        transform: translateX(5px);
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }

    .publicacion-titulo {
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 0.5rem;
    }

    .publicacion-autores {
        color: #4a5568;
        font-size: 0.95rem;
        margin-bottom: 0.3rem;
    }

    .publicacion-revista {
        color: #718096;
        font-size: 0.9rem;
        font-style: italic;
    }

    /* Grupos de Investigación */
    .grupo-card {
        background: linear-gradient(135deg, #ffffff 0%, #f7fafc 100%);
        border-radius: 15px;
        padding: 2rem;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        border: 2px solid #e2e8f0;
        height: 100%;
    }

    .grupo-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.12);
        border-color: #667eea;
    }

    .grupo-header {
        display: flex;
        justify-content: space-between;
        align-items: start;
        margin-bottom: 1rem;
    }

    .grupo-acronimo {
        font-size: 1.5rem;
        font-weight: 700;
        color: #667eea;
        margin-bottom: 0.5rem;
    }

    .grupo-categoria {
        padding: 0.3rem 0.8rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .grupo-lineas {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-top: 1rem;
    }

    .grupo-linea-tag {
        padding: 0.4rem 0.8rem;
        background: #edf2f7;
        border-radius: 15px;
        font-size: 0.85rem;
        color: #4a5568;
    }

    /* Section Headers */
    .section-header {
        text-align: center;
        margin-bottom: 3rem;
    }

    .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 1rem;
        position: relative;
        display: inline-block;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 2px;
    }

    .section-subtitle {
        font-size: 1.1rem;
        color: #718096;
        max-width: 600px;
        margin: 1.5rem auto 0;
    }

    /* CTA Section */
    .cta-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 4rem 0;
        color: white;
        border-radius: 20px;
        margin: 4rem 0;
    }

    .cta-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .investigacion-hero h1 {
            font-size: 2.5rem;
        }

        .section-title {
            font-size: 2rem;
        }
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="investigacion-hero">
    <div class="container position-relative">
        <div class="row">
            <div class="col-lg-10 mx-auto text-center">
                <h1 data-aos="fade-down">Investigación e Innovación</h1>
                <p data-aos="fade-up" data-aos-delay="100">
                    Generando conocimiento científico de calidad para transformar la sociedad y contribuir al desarrollo del país
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Estadísticas -->
<section class="py-5" style="margin-top: -50px;">
    <div class="container">
        <div class="row g-4">
            @foreach($estadisticas as $index => $stat)
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="stats-card">
                        <div class="stats-icon bg-{{ $stat['color'] }} bg-opacity-10 text-{{ $stat['color'] }}">
                            <i class="fas {{ $stat['icono'] }}"></i>
                        </div>
                        <h3 class="stats-number text-{{ $stat['color'] }}">{{ $stat['valor'] }}</h3>
                        <p class="text-muted mb-0">{{ $stat['label'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Líneas de Investigación -->
<section class="py-5">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2 class="section-title">Líneas de Investigación</h2>
            <p class="section-subtitle">
                Nuestras áreas estratégicas de investigación abarcan diversas disciplinas científicas
            </p>
        </div>

        <div class="row g-4">
            @foreach($lineas as $index => $linea)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="linea-card border-{{ $linea['color'] }}">
                        <span class="linea-badge bg-{{ $linea['color'] }} bg-opacity-10 text-{{ $linea['color'] }}">
                            {{ $linea['proyectos_activos'] }} proyectos
                        </span>
                        <div class="linea-icon bg-{{ $linea['color'] }} bg-opacity-10 text-{{ $linea['color'] }}">
                            <i class="fas {{ $linea['icono'] }}"></i>
                        </div>
                        <h4 class="mb-3 fw-bold">{{ $linea['nombre'] }}</h4>
                        <p class="text-muted mb-0">{{ $linea['descripcion'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Proyectos Destacados -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2 class="section-title">Proyectos Destacados</h2>
            <p class="section-subtitle">
                Investigaciones de alto impacto que están transformando nuestra sociedad
            </p>
        </div>

        <div class="row g-4">
            @foreach(collect($proyectos)->where('destacado', true) as $index => $proyecto)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="proyecto-card">
                        <div class="proyecto-imagen" style="background-image: url('{{ $proyecto['imagen'] }}')">
                            <span class="proyecto-badge bg-success text-white">
                                <i class="fas fa-check-circle me-1"></i>{{ $proyecto['estado'] }}
                            </span>
                        </div>
                        <div class="proyecto-content">
                            <h4 class="proyecto-titulo">{{ $proyecto['titulo'] }}</h4>
                            <p class="text-muted">{{ $proyecto['descripcion'] }}</p>

                            <div class="mt-auto">
                                <div class="proyecto-meta">
                                    <i class="fas fa-user-tie"></i>{{ $proyecto['investigador_principal'] }}
                                </div>
                                <div class="proyecto-meta">
                                    <i class="fas fa-flask"></i>{{ $proyecto['linea'] }}
                                </div>
                                <div class="proyecto-meta">
                                    <i class="fas fa-coins"></i>{{ $proyecto['financiamiento'] }}
                                </div>
                                <div class="proyecto-meta">
                                    <i class="fas fa-calendar-alt"></i>{{ $proyecto['duracion'] }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-5" data-aos="fade-up">
            <a href="#" class="btn btn-primary btn-lg px-5">
                <i class="fas fa-list me-2"></i>Ver Todos los Proyectos
            </a>
        </div>
    </div>
</section>

<!-- Investigadores Destacados -->
<section class="py-5">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2 class="section-title">Investigadores Destacados</h2>
            <p class="section-subtitle">
                Nuestro equipo de investigadores reconocidos a nivel nacional e internacional
            </p>
        </div>

        <div class="row g-4">
            @foreach($investigadores as $index => $investigador)
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="investigador-card">
                        <img src="{{ $investigador['imagen'] }}"
                             alt="{{ $investigador['nombre'] }}"
                             class="investigador-avatar">
                        <h5 class="investigador-nombre">{{ $investigador['nombre'] }}</h5>
                        <p class="text-primary fw-semibold mb-1">{{ $investigador['especialidad'] }}</p>
                        <p class="text-muted small">{{ $investigador['facultad'] }}</p>

                        <div class="investigador-stats">
                            <div class="investigador-stat-item">
                                <span class="investigador-stat-number">{{ $investigador['proyectos'] }}</span>
                                <span class="investigador-stat-label">Proyectos</span>
                            </div>
                            <div class="investigador-stat-item">
                                <span class="investigador-stat-number">{{ $investigador['publicaciones'] }}</span>
                                <span class="investigador-stat-label">Publicaciones</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Publicaciones Recientes -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2 class="section-title">Publicaciones Recientes</h2>
            <p class="section-subtitle">
                Artículos científicos publicados en revistas indexadas de alto impacto
            </p>
        </div>

        <div class="row">
            <div class="col-lg-8 mx-auto">
                @foreach($publicaciones as $index => $publicacion)
                    <div class="publicacion-item" data-aos="fade-right" data-aos-delay="{{ $index * 100 }}">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <span class="badge bg-primary">{{ $publicacion['tipo'] }}</span>
                            <span class="badge bg-secondary">{{ $publicacion['año'] }}</span>
                        </div>
                        <h5 class="publicacion-titulo">{{ $publicacion['titulo'] }}</h5>
                        <p class="publicacion-autores">
                            <i class="fas fa-users me-2"></i>{{ $publicacion['autores'] }}
                        </p>
                        <p class="publicacion-revista mb-2">
                            <i class="fas fa-book me-2"></i>{{ $publicacion['revista'] }}
                        </p>
                        <small class="text-muted">
                            <i class="fas fa-link me-2"></i>DOI: {{ $publicacion['doi'] }}
                        </small>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="text-center mt-4" data-aos="fade-up">
            <a href="#" class="btn btn-outline-primary">
                <i class="fas fa-book-open me-2"></i>Ver Todas las Publicaciones
            </a>
        </div>
    </div>
</section>

<!-- Grupos de Investigación -->
<section class="py-5">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2 class="section-title">Grupos de Investigación</h2>
            <p class="section-subtitle">
                Equipos multidisciplinarios trabajando en investigación de frontera
            </p>
        </div>

        <div class="row g-4">
            @foreach($grupos as $index => $grupo)
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="grupo-card">
                        <div class="grupo-header">
                            <div>
                                <h4 class="grupo-acronimo">{{ $grupo['acronimo'] }}</h4>
                                <h6 class="fw-bold mb-2">{{ $grupo['nombre'] }}</h6>
                            </div>
                            <span class="grupo-categoria bg-success text-white">{{ $grupo['categoria'] }}</span>
                        </div>

                        <p class="text-muted mb-3">{{ $grupo['descripcion'] }}</p>

                        <div class="mb-3">
                            <p class="mb-1">
                                <i class="fas fa-user-tie text-primary me-2"></i>
                                <strong>Líder:</strong> {{ $grupo['lider'] }}
                            </p>
                            <p class="mb-0">
                                <i class="fas fa-users text-primary me-2"></i>
                                <strong>Miembros:</strong> {{ $grupo['miembros'] }}
                            </p>
                        </div>

                        <div class="grupo-lineas">
                            @foreach($grupo['lineas'] as $linea)
                                <span class="grupo-linea-tag">{{ $linea }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5">
    <div class="container">
        <div class="cta-section" data-aos="zoom-in">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="cta-title">¿Quieres colaborar con nosotros?</h2>
                    <p class="lead mb-4">
                        Únete a nuestra comunidad de investigadores y contribuye al avance del conocimiento científico
                    </p>
                    <div class="d-flex gap-3 justify-content-center flex-wrap">
                        <a href="#" class="btn btn-light btn-lg px-4">
                            <i class="fas fa-handshake me-2"></i>Colabora con Nosotros
                        </a>
                        <a href="#" class="btn btn-outline-light btn-lg px-4">
                            <i class="fas fa-envelope me-2"></i>Contactar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<!-- AOS (Animate On Scroll) -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true,
        offset: 100
    });
</script>
@endpush
