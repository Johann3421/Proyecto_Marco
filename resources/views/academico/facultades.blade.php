@extends('layouts.app')

@section('title', $title . ' - UNMSM')

@section('content')

<!-- Hero Section -->
<section class="hero-section position-relative" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); min-height: 400px;">
    <div class="container h-100">
        <div class="row align-items-center h-100 py-5">
            <div class="col-lg-8 mx-auto text-white text-center">
                <h1 class="display-3 fw-bold mb-4">Nuestras Facultades</h1>
                <p class="lead mb-4">20 facultades comprometidas con la excelencia académica y la formación integral de profesionales</p>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center bg-transparent">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white">Inicio</a></li>
                        <li class="breadcrumb-item text-white-50 active">Facultades</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="position-absolute bottom-0 start-0 end-0" style="height: 60px; background: linear-gradient(to top, #fff 0%, transparent 100%);"></div>
</section>

<!-- Stats Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row text-center g-4">
            <div class="col-md-3">
                <div class="p-4">
                    <i class="fas fa-university fa-3x text-primary mb-3"></i>
                    <h3 class="fw-bold display-5">20</h3>
                    <p class="text-muted mb-0">Facultades</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-4">
                    <i class="fas fa-graduation-cap fa-3x text-success mb-3"></i>
                    <h3 class="fw-bold display-5">67</h3>
                    <p class="text-muted mb-0">Escuelas Profesionales</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-4">
                    <i class="fas fa-users fa-3x text-warning mb-3"></i>
                    <h3 class="fw-bold display-5">40,000+</h3>
                    <p class="text-muted mb-0">Estudiantes</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-4">
                    <i class="fas fa-chalkboard-teacher fa-3x text-danger mb-3"></i>
                    <h3 class="fw-bold display-5">3,500+</h3>
                    <p class="text-muted mb-0">Docentes</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Facultades Grid -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold mb-3">Explora Nuestras Facultades</h2>
            <p class="text-muted">Descubre la oferta académica de la universidad más antigua de América</p>
        </div>

        <div class="row g-4">
            @foreach($facultades as $facultad)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm hover-card overflow-hidden">
                    <!-- Imagen -->
                    <div class="position-relative overflow-hidden" style="height: 250px;">
                        <img src="{{ $facultad['imagen'] }}" alt="{{ $facultad['nombre'] }}"
                             class="w-100 h-100 object-fit-cover" style="transition: transform 0.5s;">
                        <div class="position-absolute top-0 start-0 p-3">
                            <div class="rounded-circle bg-{{ $facultad['color'] }} bg-opacity-90 d-flex align-items-center justify-content-center"
                                 style="width: 60px; height: 60px;">
                                <i class="fas {{ $facultad['icono'] }} fa-2x text-white"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Contenido -->
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold mb-3">{{ $facultad['nombre'] }}</h5>
                        <p class="card-text text-muted mb-4">{{ $facultad['descripcion'] }}</p>

                        <!-- Info -->
                        <div class="row g-3 mt-auto mb-3">
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-book text-{{ $facultad['color'] }} me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Carreras</small>
                                        <strong>{{ $facultad['carreras'] }}</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-user-graduate text-{{ $facultad['color'] }} me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Estudiantes</small>
                                        <strong>{{ number_format($facultad['estudiantes']) }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="#" class="btn btn-outline-{{ $facultad['color'] }} w-100">
                            <i class="fas fa-info-circle me-2"></i>Más información
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <h2 class="fw-bold mb-3">¿Listo para formar parte de San Marcos?</h2>
                <p class="mb-0 opacity-75">Descubre más sobre nuestras escuelas profesionales y programas académicos</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('academico.escuelas') }}" class="btn btn-warning btn-lg px-4 me-2">
                    <i class="fas fa-building me-2"></i>Escuelas
                </a>
                <a href="#admision" class="btn btn-outline-light btn-lg px-4">
                    <i class="fas fa-graduation-cap me-2"></i>Admisión
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
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.2) !important;
    }

    .hover-card:hover img {
        transform: scale(1.1);
    }

    .object-fit-cover {
        object-fit: cover;
        object-position: center;
    }
</style>
@endpush
