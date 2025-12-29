@extends('layouts.app')

@section('title', $title . ' - UNMSM')

@section('content')

<!-- Hero Section con Video Background -->
<section class="hero-admision position-relative" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); min-height: 500px; overflow: hidden;">
    <div class="position-absolute w-100 h-100" style="background: rgba(0,0,0,0.3); z-index: 1;"></div>
    <div class="container h-100 position-relative" style="z-index: 2;">
        <div class="row align-items-center h-100 py-5">
            <div class="col-lg-8 mx-auto text-white text-center">
                <h1 class="display-2 fw-bold mb-4 animate__animated animate__fadeInDown">¡Únete a San Marcos!</h1>
                <p class="lead mb-4 fs-4 animate__animated animate__fadeInUp">
                    Da el primer paso hacia tu futuro profesional en la universidad más prestigiosa del Perú
                </p>
                <div class="d-flex gap-3 justify-content-center flex-wrap animate__animated animate__fadeInUp animate__delay-1s">
                    <a href="#proceso" class="btn btn-warning btn-lg px-5 py-3">
                        <i class="fas fa-rocket me-2"></i>Iniciar Postulación
                    </a>
                    <a href="#modalidades" class="btn btn-outline-light btn-lg px-5 py-3">
                        <i class="fas fa-info-circle me-2"></i>Ver Modalidades
                    </a>
                </div>
                <div class="mt-5">
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="text-center">
                                <h3 class="fw-bold mb-1">470+</h3>
                                <p class="mb-0 text-white-50">Años de Historia</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center">
                                <h3 class="fw-bold mb-1">8,000+</h3>
                                <p class="mb-0 text-white-50">Vacantes Anuales</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center">
                                <h3 class="fw-bold mb-1">67</h3>
                                <p class="mb-0 text-white-50">Carreras Profesionales</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="position-absolute bottom-0 start-0 end-0" style="height: 80px; background: linear-gradient(to top, #fff 0%, transparent 100%); z-index: 2;"></div>
</section>

<!-- Proceso de Admisión -->
<section id="proceso" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-4 fw-bold mb-3">Proceso de Admisión</h2>
            <p class="lead text-muted">Sigue estos 6 pasos para convertirte en parte de la familia sanmarquina</p>
        </div>

        <div class="row">
            @foreach($proceso as $index => $paso)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm proceso-card">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start mb-3">
                            <div class="rounded-circle bg-{{ $paso['color'] }} bg-opacity-10 d-flex align-items-center justify-content-center me-3"
                                 style="width: 60px; height: 60px; flex-shrink: 0;">
                                <i class="fas {{ $paso['icono'] }} fa-2x text-{{ $paso['color'] }}"></i>
                            </div>
                            <div class="flex-grow-1">
                                <span class="badge bg-{{ $paso['color'] }} mb-2">Paso {{ $paso['numero'] }}</span>
                                <h5 class="card-title fw-bold mb-2">{{ $paso['titulo'] }}</h5>
                            </div>
                        </div>
                        <p class="card-text text-muted">{{ $paso['descripcion'] }}</p>
                    </div>
                    <div class="card-footer bg-{{ $paso['color'] }} bg-opacity-10 border-0">
                        <small class="text-{{ $paso['color'] }} fw-semibold">
                            <i class="fas fa-check-circle me-1"></i>Importante
                        </small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Botón de descarga del prospecto -->
        <div class="text-center mt-5">
            <div class="card shadow-lg border-0" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                <div class="card-body p-5">
                    <h3 class="fw-bold mb-3 text-white">
                        <i class="fas fa-file-pdf me-2"></i>Descarga el Prospecto de Admisión 2024
                    </h3>
                    <p class="lead mb-4 text-white" style="color: #fff !important;">Toda la información que necesitas para prepararte</p>
                    <a href="#" class="btn btn-light btn-lg px-5 shadow">
                        <i class="fas fa-download me-2"></i>Descargar Prospecto (PDF - 5.2 MB)
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modalidades de Ingreso -->
<section id="modalidades" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-4 fw-bold mb-3">Modalidades de Ingreso</h2>
            <p class="lead text-muted">Elige la modalidad que mejor se adapte a tu situación académica</p>
        </div>

        <ul class="nav nav-pills nav-fill mb-4" id="modalidadesTabs" role="tablist">
            @foreach($modalidades as $index => $modalidad)
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $index === 0 ? 'active' : '' }}"
                        id="tab-{{ $index }}"
                        data-bs-toggle="pill"
                        data-bs-target="#modalidad-{{ $index }}"
                        type="button"
                        role="tab">
                    {{ $modalidad['nombre'] }}
                </button>
            </li>
            @endforeach
        </ul>

        <div class="tab-content" id="modalidadesContent">
            @foreach($modalidades as $index => $modalidad)
            <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}"
                 id="modalidad-{{ $index }}"
                 role="tabpanel">
                <div class="card border-0 shadow-lg">
                    <div class="card-header bg-{{ $modalidad['color'] }} text-white p-4">
                        <h3 class="mb-2 fw-bold">{{ $modalidad['nombre'] }}</h3>
                        <p class="mb-0 opacity-75">{{ $modalidad['descripcion'] }}</p>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-8">
                                <h5 class="fw-bold mb-3">
                                    <i class="fas fa-clipboard-list text-{{ $modalidad['color'] }} me-2"></i>Requisitos
                                </h5>
                                <ul class="list-group list-group-flush mb-4">
                                    @foreach($modalidad['requisitos'] as $requisito)
                                    <li class="list-group-item px-0">
                                        <i class="fas fa-check text-success me-2"></i>{{ $requisito }}
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-light">
                                    <div class="card-body text-center">
                                        <i class="fas fa-users fa-3x text-{{ $modalidad['color'] }} mb-3"></i>
                                        <h6 class="text-muted mb-2">Vacantes Disponibles</h6>
                                        <h3 class="fw-bold text-{{ $modalidad['color'] }}">{{ $modalidad['vacantes'] }}</h3>
                                        <hr>
                                        <h6 class="text-muted mb-2">Fecha de Examen</h6>
                                        <p class="fw-semibold mb-0">{{ $modalidad['fecha_examen'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-light p-4">
                        <a href="#" class="btn btn-{{ $modalidad['color'] }} btn-lg w-100">
                            <i class="fas fa-arrow-right me-2"></i>Postular por esta Modalidad
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Calendario de Admisión -->
<section id="calendario" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-4 fw-bold mb-3">Calendario de Admisión 2024</h2>
            <p class="lead text-muted">Fechas importantes que debes conocer</p>
        </div>

        <div class="row">
            @foreach($calendario as $evento)
            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow-sm h-100 {{ $evento['destacado'] ? 'border-start border-5 border-warning' : '' }}">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start">
                            <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center me-3"
                                 style="width: 50px; height: 50px; flex-shrink: 0;">
                                <i class="fas {{ $evento['icono'] }} text-primary"></i>
                            </div>
                            <div class="flex-grow-1">
                                <span class="badge bg-primary mb-2">{{ $evento['mes'] }}</span>
                                <h5 class="fw-bold mb-2">{{ $evento['evento'] }}</h5>
                                <p class="text-muted mb-0">
                                    <i class="fas fa-calendar-day me-2"></i>{{ $evento['fecha'] }}
                                </p>
                                @if($evento['destacado'])
                                <span class="badge bg-warning text-dark mt-2">
                                    <i class="fas fa-star me-1"></i>Fecha Clave
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-4">
            <a href="#" class="btn btn-outline-primary btn-lg">
                <i class="fas fa-calendar-alt me-2"></i>Descargar Calendario Completo (PDF)
            </a>
        </div>
    </div>
</section>

<!-- Simulador de Examen -->
<section class="py-5" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 mb-4 mb-lg-0">
                <h2 class="display-5 fw-bold mb-3 text-white">
                    <i class="fas fa-graduation-cap me-3"></i>Simulador de Examen en Línea
                </h2>
                <p class="lead mb-4 text-white" style="color: #fff !important;">Practica con preguntas reales de exámenes anteriores y evalúa tu nivel de preparación</p>
                <ul class="list-unstyled text-white">
                    <li class="mb-2" style="color: #fff !important;"><i class="fas fa-check-circle me-2"></i>100 preguntas tipo examen real</li>
                    <li class="mb-2" style="color: #fff !important;"><i class="fas fa-check-circle me-2"></i>Resultados instantáneos con retroalimentación</li>
                    <li class="mb-2" style="color: #fff !important;"><i class="fas fa-check-circle me-2"></i>Cronómetro de 3 horas como el examen oficial</li>
                    <li class="mb-2" style="color: #fff !important;"><i class="fas fa-check-circle me-2"></i>Acceso ilimitado y gratuito</li>
                </ul>
            </div>
            <div class="col-lg-5 text-center">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-5">
                        <i class="fas fa-laptop-code fa-4x text-primary mb-4"></i>
                        <h4 class="fw-bold mb-4 text-dark">¿Listo para practicar?</h4>
                        <a href="#" class="btn btn-primary btn-lg w-100 mb-2">
                            <i class="fas fa-play me-2"></i>Iniciar Simulacro
                        </a>
                        <small class="text-muted d-block">No requiere registro</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Preguntas Frecuentes -->
<section id="faqs" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-4 fw-bold mb-3">Preguntas Frecuentes</h2>
            <p class="lead text-muted">Resolvemos tus dudas más comunes sobre el proceso de admisión</p>
        </div>

        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="accordion" id="faqsAccordion">
                    @foreach($faqs as $index => $faq)
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header" id="faq-heading-{{ $index }}">
                            <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }} fw-semibold"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#faq-{{ $index }}"
                                    aria-expanded="{{ $index === 0 ? 'true' : 'false' }}">
                                <i class="fas fa-question-circle text-primary me-3"></i>
                                {{ $faq['pregunta'] }}
                            </button>
                        </h2>
                        <div id="faq-{{ $index }}"
                             class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                             data-bs-parent="#faqsAccordion">
                            <div class="accordion-body bg-light">
                                <p class="mb-0 text-muted">{{ $faq['respuesta'] }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="card bg-primary text-white mt-5 border-0">
                    <div class="card-body p-4 text-center">
                        <h5 class="fw-bold mb-3">¿Tienes más preguntas?</h5>
                        <p class="mb-3">Nuestro equipo de orientación está listo para ayudarte</p>
                        <div class="d-flex gap-2 justify-content-center flex-wrap">
                            <a href="#" class="btn btn-light">
                                <i class="fas fa-phone me-2"></i>(01) 619-7000
                            </a>
                            <a href="#" class="btn btn-outline-light">
                                <i class="fas fa-envelope me-2"></i>admision@unmsm.edu.pe
                            </a>
                            <a href="#" class="btn btn-outline-light">
                                <i class="fab fa-whatsapp me-2"></i>WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Final -->
<section class="py-5 bg-dark text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <h2 class="display-5 fw-bold mb-3">¡Tu Futuro Comienza Aquí!</h2>
                <p class="lead mb-0">No esperes más, inicia tu proceso de admisión hoy mismo</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="#proceso" class="btn btn-warning btn-lg px-5 py-3 mb-2 w-100 w-lg-auto">
                    <i class="fas fa-rocket me-2"></i>Postular Ahora
                </a>
                <p class="small mb-0 mt-2 text-white-50">Proceso 100% en línea</p>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<style>
    .proceso-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .proceso-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.2) !important;
    }

    .nav-pills .nav-link {
        border-radius: 50px;
        padding: 12px 25px;
        font-weight: 600;
        transition: all 0.3s ease;
        margin: 0 5px;
    }

    .nav-pills .nav-link:not(.active) {
        background-color: #fff;
        color: #6c757d;
        border: 2px solid #e9ecef;
    }

    .nav-pills .nav-link:not(.active):hover {
        background-color: #f8f9fa;
        border-color: #dee2e6;
    }

    .nav-pills .nav-link.active {
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }

    .accordion-button:not(.collapsed) {
        background-color: #f8f9fa;
        color: #0d6efd;
    }

    .accordion-button:focus {
        box-shadow: none;
        border-color: #dee2e6;
    }

    @media (max-width: 768px) {
        .nav-pills .nav-link {
            margin: 5px 0;
        }
    }
</style>
@endpush
