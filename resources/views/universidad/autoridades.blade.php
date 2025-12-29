@extends('layouts.app')

@section('title', $title . ' - UNMSM')

@section('content')

<!-- Hero Section -->
<section class="hero-section position-relative" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); min-height: 300px;">
    <div class="container h-100">
        <div class="row align-items-center h-100 py-5">
            <div class="col-12 text-white text-center">
                <h1 class="display-4 fw-bold mb-3">Autoridades Universitarias</h1>
                <p class="lead">Liderazgo comprometido con la excelencia académica</p>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white">Inicio</a></li>
                        <li class="breadcrumb-item text-white-50 active">Autoridades</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold mb-3">Gobierno Universitario</h2>
            <p class="text-muted">Periodo {{ $autoridades[0]['periodo'] }}</p>
        </div>

        <div class="row g-4">
            @foreach($autoridades as $index => $autoridad)
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm hover-card h-100">
                    <div class="card-body text-center p-4">
                        <!-- Image -->
                        <div class="mb-4 position-relative">
                            <div class="rounded-circle overflow-hidden mx-auto shadow" style="width: 150px; height: 150px; background: url('{{ $autoridad['image'] }}'); background-size: cover; background-position: center;">
                            </div>
                            @if($index === 0)
                            <span class="position-absolute top-0 start-50 translate-middle badge rounded-pill bg-warning text-dark">
                                <i class="fas fa-crown"></i> Principal
                            </span>
                            @endif
                        </div>

                        <!-- Cargo Badge -->
                        <span class="badge bg-primary mb-3" style="font-size: 0.9rem;">{{ $autoridad['cargo'] }}</span>

                        <!-- Name -->
                        <h4 class="fw-bold mb-2">{{ $autoridad['nombre'] }}</h4>

                        <!-- Info -->
                        <p class="text-muted mb-3">
                            <small><i class="fas fa-calendar-alt me-2"></i>{{ $autoridad['periodo'] }}</small>
                        </p>

                        <!-- Contact -->
                        <div class="mt-auto">
                            <a href="mailto:{{ $autoridad['email'] }}" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-envelope me-2"></i>Contactar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Organizational Structure -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold mb-3">Estructura Organizacional</h2>
            <p class="text-muted">Órganos de gobierno y gestión universitaria</p>
        </div>

        <div class="row g-4">
            <!-- Asamblea Universitaria -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start">
                            <div class="flex-shrink-0">
                                <div class="rounded-circle bg-primary bg-opacity-10 p-3">
                                    <i class="fas fa-users fa-2x text-primary"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="fw-bold mb-2">Asamblea Universitaria</h5>
                                <p class="text-muted mb-0">Órgano máximo de gobierno de la universidad. Está integrada por autoridades, docentes y estudiantes.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Consejo Universitario -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start">
                            <div class="flex-shrink-0">
                                <div class="rounded-circle bg-success bg-opacity-10 p-3">
                                    <i class="fas fa-balance-scale fa-2x text-success"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="fw-bold mb-2">Consejo Universitario</h5>
                                <p class="text-muted mb-0">Órgano de dirección superior. Planifica, dirige y evalúa las actividades institucionales.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rectorado -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start">
                            <div class="flex-shrink-0">
                                <div class="rounded-circle bg-warning bg-opacity-10 p-3">
                                    <i class="fas fa-university fa-2x text-warning"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="fw-bold mb-2">Rectorado</h5>
                                <p class="text-muted mb-0">Máxima autoridad ejecutiva. Representa legalmente a la universidad y dirige su gestión.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Vicerrectorado Académico -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start">
                            <div class="flex-shrink-0">
                                <div class="rounded-circle bg-info bg-opacity-10 p-3">
                                    <i class="fas fa-chalkboard-teacher fa-2x text-info"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="fw-bold mb-2">Vicerrectorado Académico</h5>
                                <p class="text-muted mb-0">Responsable de la dirección, coordinación y supervisión de las actividades académicas.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Vicerrectorado de Investigación -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start">
                            <div class="flex-shrink-0">
                                <div class="rounded-circle bg-danger bg-opacity-10 p-3">
                                    <i class="fas fa-microscope fa-2x text-danger"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="fw-bold mb-2">Vicerrectorado de Investigación</h5>
                                <p class="text-muted mb-0">Dirige, coordina y promueve la investigación científica y tecnológica en la universidad.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Secretaría General -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start">
                            <div class="flex-shrink-0">
                                <div class="rounded-circle bg-secondary bg-opacity-10 p-3">
                                    <i class="fas fa-file-alt fa-2x text-secondary"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="fw-bold mb-2">Secretaría General</h5>
                                <p class="text-muted mb-0">Da fe de los actos administrativos y custodia la documentación oficial de la universidad.</p>
                            </div>
                        </div>
                    </div>
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
                <h2 class="fw-bold mb-3">¿Consultas sobre Gestión Universitaria?</h2>
                <p class="mb-0 opacity-75">Nuestro equipo está comprometido con la transparencia y el servicio a la comunidad universitaria.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('universidad.mision-vision') }}" class="btn btn-warning btn-lg px-4">
                    <i class="fas fa-info-circle me-2"></i>Misión y Visión
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
