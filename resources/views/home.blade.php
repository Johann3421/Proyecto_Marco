@extends('layouts.app')

@section('title', $university_name . ' - ' . $slogan)

@section('content')

<!-- Hero Section -->
<section class="hero-section position-relative" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); min-height: 600px;">
    <div class="container h-100">
        <div class="row align-items-center h-100 py-5">
            <div class="col-lg-6 text-white">
                <h1 class="display-4 fw-bold mb-4">{{ $university_name }}</h1>
                <p class="lead mb-4">{{ $slogan }}</p>
                <p class="mb-4">Formando profesionales de excelencia desde {{ $founded_year }}. Somos la primera universidad del Perú y una de las más antiguas de América.</p>
                <div class="d-flex gap-3">
                    <a href="#admision" class="btn btn-warning btn-lg px-4">
                        <i class="fas fa-graduation-cap me-2"></i>Admisión 2025
                    </a>
                    <a href="#facultades" class="btn btn-outline-light btn-lg px-4">
                        Conoce más
                    </a>
                </div>
            </div>
            <div class="col-lg-6 mt-5 mt-lg-0">
                <div class="hero-image-placeholder bg-white bg-opacity-10 rounded-3 p-3" style="height: 400px; border: 3px dashed rgba(255,255,255,0.3); display: flex; align-items: center; justify-content: center;">
                    <div class="text-center text-white">
                        <i class="fas fa-image fa-4x mb-3 opacity-50"></i>
                        <p class="mb-0">Imagen Hero Principal</p>
                        <small class="text-white-50">1200 x 800 px</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section py-5 bg-light">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 mb-4 mb-md-0">
                <div class="stat-card p-4">
                    <i class="fas fa-university fa-3x text-primary mb-3"></i>
                    <h3 class="fw-bold">20</h3>
                    <p class="text-muted mb-0">Facultades</p>
                </div>
            </div>
            <div class="col-md-3 mb-4 mb-md-0">
                <div class="stat-card p-4">
                    <i class="fas fa-users fa-3x text-success mb-3"></i>
                    <h3 class="fw-bold">40,000+</h3>
                    <p class="text-muted mb-0">Estudiantes</p>
                </div>
            </div>
            <div class="col-md-3 mb-4 mb-md-0">
                <div class="stat-card p-4">
                    <i class="fas fa-book fa-3x text-info mb-3"></i>
                    <h3 class="fw-bold">67</h3>
                    <p class="text-muted mb-0">Programas de Estudio</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card p-4">
                    <i class="fas fa-award fa-3x text-warning mb-3"></i>
                    <h3 class="fw-bold">473</h3>
                    <p class="text-muted mb-0">Años de Historia</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Facultades Section -->
<section id="facultades" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold mb-3">Nuestras Facultades</h2>
            <p class="text-muted">Excelencia académica en diversas áreas del conocimiento</p>
        </div>

        <div class="row g-4">
            @php
            $facultades = [
                ['nombre' => 'Medicina Humana', 'icono' => 'fa-heartbeat', 'color' => 'danger'],
                ['nombre' => 'Ingeniería Industrial', 'icono' => 'fa-cogs', 'color' => 'primary'],
                ['nombre' => 'Derecho y Ciencia Política', 'icono' => 'fa-balance-scale', 'color' => 'dark'],
                ['nombre' => 'Ciencias Sociales', 'icono' => 'fa-users', 'color' => 'info'],
                ['nombre' => 'Ingeniería de Sistemas', 'icono' => 'fa-laptop-code', 'color' => 'success'],
                ['nombre' => 'Ciencias Económicas', 'icono' => 'fa-chart-line', 'color' => 'warning'],
            ];
            @endphp

            @foreach($facultades as $facultad)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 shadow-sm hover-card">
                    <div class="card-body text-center">
                        <div class="facultad-image-placeholder bg-light rounded mb-3" style="height: 200px; border: 2px dashed #dee2e6; display: flex; align-items: center; justify-content: center;">
                            <div class="text-muted">
                                <i class="fas fa-image fa-3x mb-2"></i>
                                <p class="mb-0 small">Imagen Facultad</p>
                                <small class="text-muted">800 x 600 px</small>
                            </div>
                        </div>
                        <div class="mb-3">
                            <i class="fas {{ $facultad['icono'] }} fa-3x text-{{ $facultad['color'] }}"></i>
                        </div>
                        <h5 class="card-title fw-bold">{{ $facultad['nombre'] }}</h5>
                        <p class="card-text text-muted">Formando profesionales de excelencia con visión global y compromiso social.</p>
                        <a href="#" class="btn btn-outline-{{ $facultad['color'] }} btn-sm">Más información</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Admision Section -->
<section id="admision" class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="admision-image-placeholder bg-white bg-opacity-10 rounded-3" style="height: 350px; border: 3px dashed rgba(255,255,255,0.3); display: flex; align-items: center; justify-content: center;">
                    <div class="text-center">
                        <i class="fas fa-image fa-4x mb-3 opacity-50"></i>
                        <p class="mb-0">Imagen Admisión</p>
                        <small class="opacity-75">900 x 600 px</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h2 class="display-5 fw-bold mb-4">Proceso de Admisión 2025</h2>
                <p class="lead mb-4">¡Forma parte de la universidad más prestigiosa del Perú!</p>
                <ul class="list-unstyled mb-4">
                    <li class="mb-3"><i class="fas fa-check-circle me-2"></i> Inscripciones abiertas</li>
                    <li class="mb-3"><i class="fas fa-check-circle me-2"></i> Modalidades presencial y virtual</li>
                    <li class="mb-3"><i class="fas fa-check-circle me-2"></i> Preparación gratuita incluida</li>
                    <li class="mb-3"><i class="fas fa-check-circle me-2"></i> Becas disponibles</li>
                </ul>
                <a href="#" class="btn btn-warning btn-lg px-4">
                    <i class="fas fa-file-alt me-2"></i>Inscríbete Ahora
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Noticias Section -->
<section id="noticias" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold mb-3">Últimas Noticias</h2>
            <p class="text-muted">Mantente informado sobre las actividades de nuestra universidad</p>
        </div>

        <div class="row g-4">
            @php
            $noticias = [
                [
                    'titulo' => 'UNMSM lidera ranking de universidades peruanas 2025',
                    'fecha' => '15 Diciembre 2024',
                    'categoria' => 'Institucional'
                ],
                [
                    'titulo' => 'Investigadores sanmarquinos ganan premio internacional',
                    'fecha' => '10 Diciembre 2024',
                    'categoria' => 'Investigación'
                ],
                [
                    'titulo' => 'Convenio con universidades europeas para intercambio estudiantil',
                    'fecha' => '5 Diciembre 2024',
                    'categoria' => 'Internacional'
                ],
            ];
            @endphp

            @foreach($noticias as $noticia)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 shadow-sm hover-card">
                    <div class="noticia-image-placeholder bg-light" style="height: 250px; border-bottom: 2px dashed #dee2e6; display: flex; align-items: center; justify-content: center;">
                        <div class="text-center text-muted">
                            <i class="fas fa-image fa-3x mb-2"></i>
                            <p class="mb-0 small">Imagen Noticia</p>
                            <small class="text-muted">800 x 500 px</small>
                        </div>
                    </div>
                    <div class="card-body">
                        <span class="badge bg-primary mb-2">{{ $noticia['categoria'] }}</span>
                        <h5 class="card-title fw-bold">{{ $noticia['titulo'] }}</h5>
                        <p class="text-muted small mb-3">
                            <i class="fas fa-calendar me-2"></i>{{ $noticia['fecha'] }}
                        </p>
                        <a href="#" class="btn btn-outline-primary btn-sm">Leer más</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Investigacion Section -->
<section id="investigacion" class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 order-lg-2 mb-4 mb-lg-0">
                <div class="investigacion-image-placeholder bg-white rounded-3" style="height: 400px; border: 3px dashed #dee2e6; display: flex; align-items: center; justify-content: center;">
                    <div class="text-center text-muted">
                        <i class="fas fa-image fa-4x mb-3"></i>
                        <p class="mb-0">Imagen Investigación</p>
                        <small>900 x 600 px</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 order-lg-1">
                <h2 class="display-5 fw-bold mb-4">Investigación e Innovación</h2>
                <p class="lead text-muted mb-4">Generamos conocimiento que transforma la sociedad</p>
                <p class="mb-4">Nuestros investigadores trabajan en proyectos de vanguardia en diversas áreas del conocimiento, contribuyendo al desarrollo científico y tecnológico del país.</p>
                <div class="row mb-4">
                    <div class="col-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-flask fa-2x text-primary me-3"></i>
                            <div>
                                <h5 class="mb-0 fw-bold">150+</h5>
                                <small class="text-muted">Proyectos activos</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-microscope fa-2x text-success me-3"></i>
                            <div>
                                <h5 class="mb-0 fw-bold">30+</h5>
                                <small class="text-muted">Laboratorios</small>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="btn btn-primary btn-lg px-4">Conoce nuestras investigaciones</a>
            </div>
        </div>
    </div>
</section>

<!-- Eventos Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold mb-3">Próximos Eventos</h2>
            <p class="text-muted">Participa en nuestras actividades académicas y culturales</p>
        </div>

        <div class="row g-4">
            @php
            $eventos = [
                [
                    'titulo' => 'Congreso Internacional de Medicina',
                    'fecha' => '15-17 Enero 2025',
                    'lugar' => 'Auditorio Principal',
                    'tipo' => 'Congreso'
                ],
                [
                    'titulo' => 'Feria de Ciencias y Tecnología',
                    'fecha' => '20 Enero 2025',
                    'lugar' => 'Campus Central',
                    'tipo' => 'Feria'
                ],
                [
                    'titulo' => 'Seminario de Emprendimiento',
                    'fecha' => '25 Enero 2025',
                    'lugar' => 'Sala de Conferencias',
                    'tipo' => 'Seminario'
                ],
            ];
            @endphp

            @foreach($eventos as $evento)
            <div class="col-lg-4 col-md-6">
                <div class="card shadow-sm hover-card">
                    <div class="card-body">
                        <span class="badge bg-success mb-3">{{ $evento['tipo'] }}</span>
                        <h5 class="card-title fw-bold mb-3">{{ $evento['titulo'] }}</h5>
                        <p class="mb-2">
                            <i class="fas fa-calendar-alt text-primary me-2"></i>
                            <small>{{ $evento['fecha'] }}</small>
                        </p>
                        <p class="mb-3">
                            <i class="fas fa-map-marker-alt text-danger me-2"></i>
                            <small>{{ $evento['lugar'] }}</small>
                        </p>
                        <a href="#" class="btn btn-outline-primary btn-sm w-100">Ver detalles</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Contacto Section -->
<section id="contacto" class="py-5 bg-dark text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h2 class="display-5 fw-bold mb-4">Contáctanos</h2>
                <p class="mb-4">¿Tienes alguna consulta? Estamos aquí para ayudarte.</p>

                <div class="mb-4">
                    <h5 class="fw-bold mb-3">Información de Contacto</h5>
                    <p class="mb-2"><i class="fas fa-map-marker-alt me-3"></i>Av. Venezuela Cdra. 34 s/n - Ciudad Universitaria, Lima</p>
                    <p class="mb-2"><i class="fas fa-phone me-3"></i>(01) 619-7000</p>
                    <p class="mb-2"><i class="fas fa-envelope me-3"></i>informes@unmsm.edu.pe</p>
                </div>

                <div>
                    <h5 class="fw-bold mb-3">Horario de Atención</h5>
                    <p class="mb-1">Lunes a Viernes: 8:00 AM - 5:00 PM</p>
                    <p>Sábados: 8:00 AM - 1:00 PM</p>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card bg-white text-dark">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-4">Envíanos un mensaje</h5>
                        <form>
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Nombre completo" required>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" placeholder="Correo electrónico" required>
                            </div>
                            <div class="mb-3">
                                <input type="tel" class="form-control" placeholder="Teléfono">
                            </div>
                            <div class="mb-3">
                                <select class="form-select" required>
                                    <option value="">Asunto</option>
                                    <option value="admision">Consulta sobre Admisión</option>
                                    <option value="academico">Información Académica</option>
                                    <option value="tramites">Trámites</option>
                                    <option value="otro">Otro</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" rows="4" placeholder="Mensaje" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-paper-plane me-2"></i>Enviar Mensaje
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
    .hover-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }

    .hero-section {
        position: relative;
        overflow: hidden;
    }

    .stat-card {
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        transform: scale(1.05);
    }
</style>
@endpush
