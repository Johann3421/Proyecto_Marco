@extends('layouts.app')

@section('title', $title . ' - UNMSM')

@section('content')

<!-- Hero Section -->
<section class="hero-section position-relative" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); min-height: 400px;">
    <div class="container h-100">
        <div class="row align-items-center h-100 py-5">
            <div class="col-lg-8 mx-auto text-white text-center">
                <h1 class="display-3 fw-bold mb-4">Estudios de Posgrado</h1>
                <p class="lead mb-4">Impulsa tu carrera con maestrías y doctorados de clase mundial</p>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center bg-transparent">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white">Inicio</a></li>
                        <li class="breadcrumb-item text-white-50 active">Posgrado</li>
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
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="text-center">
                    <i class="fas fa-user-graduate fa-3x text-primary mb-3"></i>
                    <h3 class="fw-bold mb-2">50+</h3>
                    <p class="text-muted mb-0">Programas de Maestría</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="text-center">
                    <i class="fas fa-microscope fa-3x text-success mb-3"></i>
                    <h3 class="fw-bold mb-2">30+</h3>
                    <p class="text-muted mb-0">Programas de Doctorado</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="text-center">
                    <i class="fas fa-users fa-3x text-warning mb-3"></i>
                    <h3 class="fw-bold mb-2">8,500+</h3>
                    <p class="text-muted mb-0">Estudiantes de Posgrado</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="text-center">
                    <i class="fas fa-award fa-3x text-danger mb-3"></i>
                    <h3 class="fw-bold mb-2">100%</h3>
                    <p class="text-muted mb-0">Programas Acreditados</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Programs Tabs -->
<section class="py-5">
    <div class="container">
        <!-- Tabs Navigation -->
        <ul class="nav nav-pills nav-fill mb-5" id="posgradoTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="maestrias-tab" data-bs-toggle="pill" data-bs-target="#maestrias"
                        type="button" role="tab" aria-controls="maestrias" aria-selected="true">
                    <i class="fas fa-graduation-cap me-2"></i>Maestrías
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="doctorados-tab" data-bs-toggle="pill" data-bs-target="#doctorados"
                        type="button" role="tab" aria-controls="doctorados" aria-selected="false">
                    <i class="fas fa-user-graduate me-2"></i>Doctorados
                </button>
            </li>
        </ul>

        <!-- Tabs Content -->
        <div class="tab-content" id="posgradoTabsContent">

            <!-- Maestrías Tab -->
            <div class="tab-pane fade show active" id="maestrias" role="tabpanel" aria-labelledby="maestrias-tab">
                <div class="mb-5 text-center">
                    <h2 class="fw-bold mb-3">Programas de Maestría</h2>
                    <p class="lead text-muted">Especialízate y alcanza nuevas metas profesionales</p>
                </div>

                <div class="row g-4">
                    @foreach($maestrias as $maestria)
                    <div class="col-lg-6">
                        <div class="card h-100 border-0 shadow-sm overflow-hidden hover-card">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <div class="position-relative h-100" style="min-height: 250px;">
                                        <img src="{{ $maestria['imagen'] }}" class="w-100 h-100 object-fit-cover" alt="{{ $maestria['nombre'] }}">
                                        <div class="position-absolute top-0 end-0 m-3">
                                            <span class="badge bg-primary px-3 py-2">{{ $maestria['modalidad'] }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body p-4">
                                        <h5 class="card-title fw-bold mb-3">{{ $maestria['nombre'] }}</h5>

                                        <ul class="list-unstyled mb-4">
                                            <li class="mb-2">
                                                <i class="fas fa-clock text-primary me-2"></i>
                                                <strong>Duración:</strong> {{ $maestria['duracion'] }}
                                            </li>
                                            <li class="mb-2">
                                                <i class="fas fa-book text-success me-2"></i>
                                                <strong>Créditos:</strong> {{ $maestria['creditos'] }}
                                            </li>
                                            <li class="mb-2">
                                                <i class="fas fa-laptop text-info me-2"></i>
                                                <strong>Modalidad:</strong> {{ $maestria['modalidad'] }}
                                            </li>
                                        </ul>

                                        <div class="d-grid gap-2">
                                            <a href="#" class="btn btn-outline-primary">
                                                <i class="fas fa-info-circle me-2"></i>Más información
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="text-center mt-5">
                    <a href="#" class="btn btn-primary btn-lg px-5">
                        <i class="fas fa-list me-2"></i>Ver Todos los Programas de Maestría
                    </a>
                </div>
            </div>

            <!-- Doctorados Tab -->
            <div class="tab-pane fade" id="doctorados" role="tabpanel" aria-labelledby="doctorados-tab">
                <div class="mb-5 text-center">
                    <h2 class="fw-bold mb-3">Programas de Doctorado</h2>
                    <p class="lead text-muted">Lidera la investigación y genera nuevo conocimiento</p>
                </div>

                <div class="row g-4">
                    @foreach($doctorados as $doctorado)
                    <div class="col-lg-6">
                        <div class="card h-100 border-0 shadow-sm hover-card">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-start mb-3">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center"
                                             style="width: 60px; height: 60px;">
                                            <i class="fas fa-microscope fa-2x text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5 class="card-title fw-bold mb-2">{{ $doctorado['nombre'] }}</h5>
                                        <div class="d-flex gap-2 mb-3">
                                            <span class="badge bg-success">{{ $doctorado['duracion'] }}</span>
                                            <span class="badge bg-info">{{ $doctorado['modalidad'] }}</span>
                                        </div>
                                    </div>
                                </div>

                                <h6 class="fw-bold mb-3">
                                    <i class="fas fa-search text-primary me-2"></i>Líneas de Investigación
                                </h6>
                                <ul class="mb-4">
                                    @foreach($doctorado['lineas_investigacion'] as $linea)
                                    <li class="text-muted mb-2">{{ $linea }}</li>
                                    @endforeach
                                </ul>

                                <div class="d-flex gap-2">
                                    <a href="#" class="btn btn-outline-primary flex-fill">
                                        <i class="fas fa-file-alt me-2"></i>Plan de Estudios
                                    </a>
                                    <a href="#" class="btn btn-primary flex-fill">
                                        <i class="fas fa-envelope me-2"></i>Contactar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="text-center mt-5">
                    <a href="#" class="btn btn-primary btn-lg px-5">
                        <i class="fas fa-list me-2"></i>Ver Todos los Programas de Doctorado
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Benefits Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold mb-3">Beneficios de Estudiar Posgrado en San Marcos</h2>
        </div>

        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 h-100 text-center p-4 shadow-sm">
                    <i class="fas fa-trophy fa-3x text-warning mb-3"></i>
                    <h5 class="fw-bold mb-3">Prestigio Internacional</h5>
                    <p class="text-muted">Títulos reconocidos globalmente respaldados por 470 años de excelencia académica</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 h-100 text-center p-4 shadow-sm">
                    <i class="fas fa-users-cog fa-3x text-primary mb-3"></i>
                    <h5 class="fw-bold mb-3">Networking de Élite</h5>
                    <p class="text-muted">Conecta con profesionales destacados y líderes de diversas industrias</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 h-100 text-center p-4 shadow-sm">
                    <i class="fas fa-flask fa-3x text-success mb-3"></i>
                    <h5 class="fw-bold mb-3">Investigación de Punta</h5>
                    <p class="text-muted">Acceso a laboratorios modernos y recursos de investigación de última generación</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 h-100 text-center p-4 shadow-sm">
                    <i class="fas fa-briefcase fa-3x text-info mb-3"></i>
                    <h5 class="fw-bold mb-3">Oportunidades Laborales</h5>
                    <p class="text-muted">Bolsa de trabajo exclusiva y convenios con empresas líderes del sector</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 h-100 text-center p-4 shadow-sm">
                    <i class="fas fa-book-reader fa-3x text-danger mb-3"></i>
                    <h5 class="fw-bold mb-3">Flexibilidad Académica</h5>
                    <p class="text-muted">Programas presenciales, semipresenciales y virtuales adaptados a tu ritmo</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 h-100 text-center p-4 shadow-sm">
                    <i class="fas fa-globe-americas fa-3x text-secondary mb-3"></i>
                    <h5 class="fw-bold mb-3">Movilidad Internacional</h5>
                    <p class="text-muted">Convenios con más de 100 universidades para intercambio y doble titulación</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-gradient" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mb-4 mb-lg-0 text-white">
                <h2 class="fw-bold mb-3">¿Listo para dar el siguiente paso?</h2>
                <p class="mb-0 opacity-75">Descarga nuestro catálogo completo de programas de posgrado 2024</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="#" class="btn btn-warning btn-lg px-4 mb-2 w-100 w-lg-auto">
                    <i class="fas fa-download me-2"></i>Descargar Catálogo
                </a>
                <a href="#" class="btn btn-outline-light btn-lg px-4 w-100 w-lg-auto">
                    <i class="fas fa-calendar-alt me-2"></i>Solicitar Información
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

    .nav-pills .nav-link {
        border-radius: 50px;
        padding: 15px 40px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .nav-pills .nav-link:not(.active) {
        background-color: #f8f9fa;
        color: #6c757d;
    }

    .nav-pills .nav-link:not(.active):hover {
        background-color: #e9ecef;
        color: #495057;
    }

    .object-fit-cover {
        object-fit: cover;
    }
</style>
@endpush
