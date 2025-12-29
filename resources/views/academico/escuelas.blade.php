@extends('layouts.app')

@section('title', $title . ' - UNMSM')

@section('content')

<!-- Hero Section -->
<section class="hero-section position-relative" style="background: linear-gradient(135deg, #2a5298 0%, #1e3c72 100%); min-height: 400px;">
    <div class="container h-100">
        <div class="row align-items-center h-100 py-5">
            <div class="col-lg-8 mx-auto text-white text-center">
                <h1 class="display-3 fw-bold mb-4">Escuelas Profesionales</h1>
                <p class="lead mb-4">67 carreras profesionales que transforman vidas y construyen el futuro del Perú</p>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center bg-transparent">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white">Inicio</a></li>
                        <li class="breadcrumb-item text-white-50 active">Escuelas Profesionales</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="position-absolute bottom-0 start-0 end-0" style="height: 60px; background: linear-gradient(to top, #fff 0%, transparent 100%);"></div>
</section>

<!-- Introducción -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="fw-bold mb-4">Oferta Académica de Excelencia</h2>
                <p class="lead text-muted mb-4">
                    San Marcos ofrece una amplia gama de programas académicos organizados por áreas del conocimiento,
                    garantizando formación de calidad con docentes altamente capacitados y infraestructura moderna.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Áreas Académicas -->
<section class="py-5">
    <div class="container">
        @foreach($areas as $index => $area)
        <div class="mb-5">
            <div class="row align-items-center mb-4">
                <div class="col-md-8">
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle bg-{{ $area['color'] }} bg-opacity-10 d-flex align-items-center justify-content-center me-3"
                             style="width: 70px; height: 70px; flex-shrink: 0;">
                            <i class="fas {{ $area['icono'] }} fa-2x text-{{ $area['color'] }}"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold mb-1">{{ $area['nombre'] }}</h3>
                            <p class="text-muted mb-0">{{ count($area['escuelas']) }} escuelas profesionales</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-md-end mt-3 mt-md-0">
                    <span class="badge bg-{{ $area['color'] }} bg-opacity-10 text-{{ $area['color'] }} px-3 py-2">
                        Área {{ $index + 1 }} de {{ count($areas) }}
                    </span>
                </div>
            </div>

            <div class="row g-3">
                @foreach($area['escuelas'] as $escuela)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card border-{{ $area['color'] }} h-100 hover-card">
                        <div class="card-body text-center">
                            <i class="fas fa-graduation-cap fa-2x text-{{ $area['color'] }} mb-3"></i>
                            <h6 class="fw-bold mb-0">{{ $escuela }}</h6>
                        </div>
                        <div class="card-footer bg-{{ $area['color'] }} bg-opacity-10 border-0 text-center">
                            <a href="#" class="text-{{ $area['color'] }} text-decoration-none small fw-semibold">
                                Ver plan de estudios <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        @if(!$loop->last)
        <hr class="my-5">
        @endif
        @endforeach
    </div>
</section>

<!-- Features Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold mb-3">¿Por qué estudiar en San Marcos?</h2>
            <p class="text-muted">Beneficios de formar parte de la Decana de América</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm h-100 text-center p-4">
                    <i class="fas fa-medal fa-3x text-warning mb-3"></i>
                    <h5 class="fw-bold mb-3">Excelencia Académica</h5>
                    <p class="text-muted mb-0">Ranking #1 de universidades públicas del Perú</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm h-100 text-center p-4">
                    <i class="fas fa-chalkboard-teacher fa-3x text-primary mb-3"></i>
                    <h5 class="fw-bold mb-3">Docentes Calificados</h5>
                    <p class="text-muted mb-0">Profesores con grados de maestría y doctorado</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm h-100 text-center p-4">
                    <i class="fas fa-flask fa-3x text-success mb-3"></i>
                    <h5 class="fw-bold mb-3">Investigación</h5>
                    <p class="text-muted mb-0">30+ laboratorios y centros de investigación</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm h-100 text-center p-4">
                    <i class="fas fa-globe fa-3x text-info mb-3"></i>
                    <h5 class="fw-bold mb-3">Convenios</h5>
                    <p class="text-muted mb-0">Intercambio con universidades de todo el mundo</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <h2 class="fw-bold mb-3">¿Interesado en estudiar un Posgrado?</h2>
                <p class="mb-0 opacity-75">Explora nuestros programas de maestría y doctorado</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('academico.posgrado') }}" class="btn btn-warning btn-lg px-4">
                    <i class="fas fa-user-graduate me-2"></i>Ver Posgrados
                </a>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
    .breadcrumb-item + .breadcrumb-item::before {
        color: rgba(255, 255, 255, 0.5);
    }

    .hover-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.15) !important;
    }
</style>
@endpush
