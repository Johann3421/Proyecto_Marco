@extends('layouts.app')

@section('title', 'Contacto - UNMSM')

@push('styles')
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        --success-color: #10b981;
        --info-color: #3b82f6;
    }

    /* Hero Section */
    .contact-hero {
        background: var(--primary-gradient);
        padding: 100px 0 80px;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .contact-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        opacity: 0.3;
    }

    .contact-hero h1 {
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        position: relative;
    }

    .contact-hero .subtitle {
        font-size: 1.3rem;
        opacity: 0.95;
        max-width: 700px;
        margin: 0 auto;
    }

    /* Contact Cards */
    .contact-card {
        background: white;
        border-radius: 15px;
        padding: 40px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        height: 100%;
    }

    .contact-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 50px rgba(0,0,0,0.15);
    }

    .contact-card .icon-box {
        width: 80px;
        height: 80px;
        background: var(--primary-gradient);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 25px;
        box-shadow: 0 5px 20px rgba(102, 126, 234, 0.3);
    }

    .contact-card .icon-box i {
        font-size: 2rem;
        color: white;
    }

    .contact-card h4 {
        font-weight: 700;
        margin-bottom: 15px;
        color: #2c3e50;
    }

    .contact-card p {
        color: #7f8c8d;
        margin-bottom: 0;
    }

    .contact-card a {
        color: #667eea;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s ease;
    }

    .contact-card a:hover {
        color: #764ba2;
    }

    /* Form Section */
    .form-section {
        background: #f8f9fa;
        padding: 80px 0;
    }

    .contact-form {
        background: white;
        border-radius: 20px;
        padding: 50px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.08);
    }

    .contact-form .form-control,
    .contact-form .form-select {
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        padding: 15px 20px;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .contact-form .form-control:focus,
    .contact-form .form-select:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.15);
    }

    .contact-form textarea.form-control {
        min-height: 150px;
        resize: vertical;
    }

    .contact-form label {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 8px;
    }

    .contact-form .btn-submit {
        background: var(--primary-gradient);
        border: none;
        color: white;
        padding: 15px 50px;
        border-radius: 50px;
        font-size: 1.1rem;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 5px 20px rgba(102, 126, 234, 0.3);
    }

    .contact-form .btn-submit:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 30px rgba(102, 126, 234, 0.4);
    }

    /* Info Sidebar */
    .info-box {
        background: white;
        border-radius: 15px;
        padding: 30px;
        margin-bottom: 30px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    }

    .info-box h5 {
        font-weight: 700;
        margin-bottom: 20px;
        color: #2c3e50;
        padding-bottom: 15px;
        border-bottom: 3px solid #667eea;
    }

    .info-item {
        padding: 15px 0;
        border-bottom: 1px solid #e0e0e0;
        display: flex;
        align-items: start;
        gap: 15px;
    }

    .info-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .info-item i {
        color: #667eea;
        font-size: 1.3rem;
        margin-top: 3px;
    }

    .info-item .content h6 {
        font-weight: 600;
        margin-bottom: 5px;
        color: #2c3e50;
    }

    .info-item .content p {
        margin: 0;
        color: #7f8c8d;
        font-size: 0.95rem;
    }

    /* Map Section */
    .map-section {
        height: 450px;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    }

    .map-section iframe {
        width: 100%;
        height: 100%;
        border: none;
    }

    /* Social Media */
    .social-links {
        display: flex;
        gap: 15px;
        justify-content: center;
        margin-top: 20px;
    }

    .social-link {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }

    .social-link:hover {
        transform: translateY(-5px) scale(1.1);
        box-shadow: 0 8px 25px rgba(0,0,0,0.3);
    }

    /* Horarios */
    .schedule-item {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 15px;
        transition: all 0.3s ease;
    }

    .schedule-item:hover {
        transform: translateX(10px);
    }

    .schedule-item .day {
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 5px;
    }

    .schedule-item .time {
        color: #667eea;
        font-weight: 600;
        font-size: 1.1rem;
    }

    .schedule-item .type {
        color: #7f8c8d;
        font-size: 0.9rem;
    }

    /* Alert Success */
    .alert-custom-success {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        border: none;
        border-radius: 15px;
        color: white;
        padding: 20px;
        box-shadow: 0 5px 20px rgba(16, 185, 129, 0.3);
    }

    .alert-custom-success i {
        font-size: 1.5rem;
        margin-right: 10px;
    }

    /* Offices Grid */
    .office-card {
        background: white;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        height: 100%;
    }

    .office-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.12);
    }

    .office-card h5 {
        color: #667eea;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .office-detail {
        display: flex;
        align-items: start;
        gap: 10px;
        margin-bottom: 12px;
    }

    .office-detail i {
        color: #667eea;
        margin-top: 3px;
    }

    @media (max-width: 768px) {
        .contact-hero h1 {
            font-size: 2.5rem;
        }

        .contact-form {
            padding: 30px 20px;
        }
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="contact-hero">
    <div class="container text-center">
        <div data-aos="fade-down">
            <h1>¡Estamos Aquí para Ayudarte!</h1>
            <p class="subtitle">
                Contáctanos y resolveremos todas tus dudas. Nuestro equipo está listo para atenderte.
            </p>
        </div>
    </div>
</section>

<!-- Quick Contact Cards -->
<section class="py-5" style="margin-top: -50px; position: relative; z-index: 10;">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="0">
                <div class="contact-card text-center">
                    <div class="icon-box">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <h4>Llámanos</h4>
                    <p class="mb-2">Atención telefónica</p>
                    <a href="tel:{{ $informacion['telefono'] }}">{{ $informacion['telefono'] }}</a>
                    <p class="mt-2 mb-0">
                        <small>
                            <i class="fab fa-whatsapp text-success"></i>
                            <a href="https://wa.me/{{ str_replace(['+', ' '], '', $informacion['whatsapp']) }}" target="_blank">
                                WhatsApp
                            </a>
                        </small>
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="contact-card text-center">
                    <div class="icon-box">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h4>Escríbenos</h4>
                    <p class="mb-2">Correo electrónico</p>
                    <a href="mailto:{{ $informacion['email'] }}">{{ $informacion['email'] }}</a>
                    <p class="mt-2 mb-0">
                        <small>Te responderemos en 24-48 horas</small>
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="contact-card text-center">
                    <div class="icon-box">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h4>Visítanos</h4>
                    <p class="mb-2">Nuestra ubicación</p>
                    <p class="mb-0">{{ $informacion['direccion'] }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Form Section -->
<section class="form-section">
    <div class="container">
        <div class="row">
            <!-- Contact Form -->
            <div class="col-lg-8" data-aos="fade-right">
                @if(session('success'))
                <div class="alert alert-custom-success mb-4" role="alert">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                </div>
                @endif

                <div class="contact-form">
                    <h2 class="mb-4 fw-bold">Envíanos un Mensaje</h2>
                    <p class="text-muted mb-4">
                        Completa el formulario y nos pondremos en contacto contigo lo antes posible.
                    </p>

                    <form action="{{ route('contacto.enviar') }}" method="POST">
                        @csrf

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="nombre" class="form-label">Nombre Completo <span class="text-danger">*</span></label>
                                <input type="text"
                                       class="form-control @error('nombre') is-invalid @enderror"
                                       id="nombre"
                                       name="nombre"
                                       value="{{ old('nombre') }}"
                                       placeholder="Tu nombre completo"
                                       required>
                                @error('nombre')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label">Correo Electrónico <span class="text-danger">*</span></label>
                                <input type="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       id="email"
                                       name="email"
                                       value="{{ old('email') }}"
                                       placeholder="tu@email.com"
                                       required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="tel"
                                       class="form-control @error('telefono') is-invalid @enderror"
                                       id="telefono"
                                       name="telefono"
                                       value="{{ old('telefono') }}"
                                       placeholder="+51 999 999 999">
                                @error('telefono')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="tipo_consulta" class="form-label">Tipo de Consulta <span class="text-danger">*</span></label>
                                <select class="form-select @error('tipo_consulta') is-invalid @enderror"
                                        id="tipo_consulta"
                                        name="tipo_consulta"
                                        required>
                                    <option value="">Seleccione...</option>
                                    <option value="Admisión" {{ old('tipo_consulta') == 'Admisión' ? 'selected' : '' }}>Admisión</option>
                                    <option value="Académico" {{ old('tipo_consulta') == 'Académico' ? 'selected' : '' }}>Información Académica</option>
                                    <option value="Posgrado" {{ old('tipo_consulta') == 'Posgrado' ? 'selected' : '' }}>Posgrado</option>
                                    <option value="Investigación" {{ old('tipo_consulta') == 'Investigación' ? 'selected' : '' }}>Investigación</option>
                                    <option value="Biblioteca" {{ old('tipo_consulta') == 'Biblioteca' ? 'selected' : '' }}>Biblioteca</option>
                                    <option value="Otro" {{ old('tipo_consulta') == 'Otro' ? 'selected' : '' }}>Otro</option>
                                </select>
                                @error('tipo_consulta')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="asunto" class="form-label">Asunto <span class="text-danger">*</span></label>
                                <input type="text"
                                       class="form-control @error('asunto') is-invalid @enderror"
                                       id="asunto"
                                       name="asunto"
                                       value="{{ old('asunto') }}"
                                       placeholder="Breve descripción del tema"
                                       required>
                                @error('asunto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="mensaje" class="form-label">Mensaje <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('mensaje') is-invalid @enderror"
                                          id="mensaje"
                                          name="mensaje"
                                          placeholder="Escribe tu mensaje aquí..."
                                          required>{{ old('mensaje') }}</textarea>
                                @error('mensaje')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 text-center mt-4">
                                <button type="submit" class="btn btn-submit">
                                    <i class="fas fa-paper-plane me-2"></i>
                                    Enviar Mensaje
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Sidebar Info -->
            <div class="col-lg-4" data-aos="fade-left">
                <!-- Horarios -->
                <div class="info-box">
                    <h5>
                        <i class="far fa-clock me-2"></i>
                        Horarios de Atención
                    </h5>
                    @foreach($horarios as $horario)
                    <div class="schedule-item">
                        <div class="day">{{ $horario['dia'] }}</div>
                        <div class="time">{{ $horario['horario'] }}</div>
                        <div class="type">{{ $horario['tipo'] }}</div>
                    </div>
                    @endforeach
                </div>

                <!-- Correos Específicos -->
                <div class="info-box">
                    <h5>
                        <i class="fas fa-envelope me-2"></i>
                        Correos Específicos
                    </h5>
                    <div class="info-item">
                        <i class="fas fa-graduation-cap"></i>
                        <div class="content">
                            <h6>Admisión</h6>
                            <p><a href="mailto:{{ $informacion['email_admision'] }}">{{ $informacion['email_admision'] }}</a></p>
                        </div>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-user-graduate"></i>
                        <div class="content">
                            <h6>Posgrado</h6>
                            <p><a href="mailto:{{ $informacion['email_posgrado'] }}">{{ $informacion['email_posgrado'] }}</a></p>
                        </div>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-info-circle"></i>
                        <div class="content">
                            <h6>Información General</h6>
                            <p><a href="mailto:{{ $informacion['email'] }}">{{ $informacion['email'] }}</a></p>
                        </div>
                    </div>
                </div>

                <!-- Redes Sociales -->
                <div class="info-box text-center">
                    <h5>
                        <i class="fas fa-share-alt me-2"></i>
                        Síguenos
                    </h5>
                    <div class="social-links">
                        @foreach($redesSociales as $red)
                        <a href="{{ $red['url'] }}"
                           target="_blank"
                           class="social-link"
                           style="background-color: {{ $red['color'] }};"
                           title="{{ $red['nombre'] }}">
                            <i class="{{ $red['icono'] }}"></i>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="fw-bold">Encuéntranos</h2>
            <p class="text-muted">Estamos ubicados en el corazón de Lima</p>
        </div>

        <div class="map-section" data-aos="zoom-in">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.3940967745666!2d-77.08672968512839!3d-12.058375491450577!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c8c99d7c2a17%3A0x7c5a4d8c5e5c5e5c!2sUniversidad%20Nacional%20Mayor%20de%20San%20Marcos!5e0!3m2!1ses!2spe!4v1640000000000!5m2!1ses!2spe"
                    allowfullscreen=""
                    loading="lazy"></iframe>
        </div>
    </div>
</section>

<!-- Offices Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="fw-bold">Nuestras Oficinas</h2>
            <p class="text-muted">Contacta directamente con el área que necesites</p>
        </div>

        <div class="row g-4">
            @foreach($oficinas as $index => $oficina)
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="office-card">
                    <h5>{{ $oficina['nombre'] }}</h5>
                    <div class="office-detail">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>{{ $oficina['ubicacion'] }}</span>
                    </div>
                    <div class="office-detail">
                        <i class="fas fa-phone"></i>
                        <a href="tel:{{ $oficina['telefono'] }}">{{ $oficina['telefono'] }}</a>
                    </div>
                    <div class="office-detail">
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:{{ $oficina['email'] }}">{{ $oficina['email'] }}</a>
                    </div>
                </div>
            </div>
            @endforeach
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
