@extends('layouts.app')

@section('title', $title . ' - UNMSM')

@section('content')

<!-- Hero Section -->
<section class="hero-section position-relative" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); min-height: 300px;">
    <div class="container h-100">
        <div class="row align-items-center h-100 py-5">
            <div class="col-12 text-white text-center">
                <h1 class="display-4 fw-bold mb-3">Misión y Visión</h1>
                <p class="lead">Nuestro compromiso con la excelencia y el desarrollo nacional</p>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white">Inicio</a></li>
                        <li class="breadcrumb-item text-white-50 active">Misión y Visión</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Mission Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="rounded-3 overflow-hidden shadow-lg" style="height: 400px; background: linear-gradient(135deg, rgba(30, 60, 114, 0.7), rgba(42, 82, 152, 0.7)), url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=900&h=700&fit=crop&auto=format'); background-size: cover; background-position: center;">
                    <div class="d-flex align-items-center justify-content-center h-100 text-white text-center p-4">
                        <div>
                            <i class="fas fa-bullseye fa-5x mb-3 opacity-75"></i>
                            <h3 class="fw-bold">Nuestra Misión</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <span class="badge bg-primary mb-3" style="font-size: 1rem;">MISIÓN</span>
                <h2 class="fw-bold mb-4">Nuestro Propósito</h2>
                <p class="lead text-muted mb-4">{{ $mision }}</p>
                <div class="d-flex align-items-start mb-3">
                    <i class="fas fa-check-circle text-success fa-lg me-3 mt-1"></i>
                    <div>
                        <h6 class="fw-bold mb-1">Formación Integral</h6>
                        <p class="text-muted mb-0">Educación humanista, científica y tecnológica de calidad</p>
                    </div>
                </div>
                <div class="d-flex align-items-start mb-3">
                    <i class="fas fa-check-circle text-success fa-lg me-3 mt-1"></i>
                    <div>
                        <h6 class="fw-bold mb-1">Investigación</h6>
                        <p class="text-muted mb-0">Generación y difusión de conocimiento científico</p>
                    </div>
                </div>
                <div class="d-flex align-items-start">
                    <i class="fas fa-check-circle text-success fa-lg me-3 mt-1"></i>
                    <div>
                        <h6 class="fw-bold mb-1">Compromiso Social</h6>
                        <p class="text-muted mb-0">Desarrollo sostenible y responsabilidad con el país</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vision Section -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 order-lg-2 mb-4 mb-lg-0">
                <div class="rounded-3 overflow-hidden shadow-lg" style="height: 400px; background: linear-gradient(135deg, rgba(30, 60, 114, 0.7), rgba(42, 82, 152, 0.7)), url('https://images.unsplash.com/photo-1517486808906-6ca8b3f04846?w=900&h=700&fit=crop&auto=format'); background-size: cover; background-position: center;">
                    <div class="d-flex align-items-center justify-content-center h-100 text-white text-center p-4">
                        <div>
                            <i class="fas fa-eye fa-5x mb-3 opacity-75"></i>
                            <h3 class="fw-bold">Nuestra Visión</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 order-lg-1">
                <span class="badge bg-success mb-3" style="font-size: 1rem;">VISIÓN</span>
                <h2 class="fw-bold mb-4">Hacia el Futuro</h2>
                <p class="lead text-muted mb-4">{{ $vision }}</p>
                <div class="row g-3">
                    <div class="col-6">
                        <div class="card border-0 bg-primary bg-opacity-10 h-100">
                            <div class="card-body text-center p-3">
                                <i class="fas fa-globe-americas fa-2x text-primary mb-2"></i>
                                <h6 class="fw-bold mb-0">Referente Internacional</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card border-0 bg-success bg-opacity-10 h-100">
                            <div class="card-body text-center p-3">
                                <i class="fas fa-star fa-2x text-success mb-2"></i>
                                <h6 class="fw-bold mb-0">Educación de Calidad</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card border-0 bg-warning bg-opacity-10 h-100">
                            <div class="card-body text-center p-3">
                                <i class="fas fa-microscope fa-2x text-warning mb-2"></i>
                                <h6 class="fw-bold mb-0">Investigación Avanzada</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card border-0 bg-info bg-opacity-10 h-100">
                            <div class="card-body text-center p-3">
                                <i class="fas fa-hands-helping fa-2x text-info mb-2"></i>
                                <h6 class="fw-bold mb-0">Impacto Social</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-warning mb-3" style="font-size: 1rem;">VALORES</span>
            <h2 class="display-5 fw-bold mb-3">Nuestros Valores Institucionales</h2>
            <p class="text-muted">Principios que guían nuestro quehacer universitario</p>
        </div>

        <div class="row g-4">
            @foreach($valores as $valor)
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm hover-card h-100">
                    <div class="card-body text-center p-4">
                        <div class="rounded-circle bg-primary bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas {{ $valor['icon'] }} fa-2x text-primary"></i>
                        </div>
                        <h5 class="fw-bold mb-3">{{ $valor['title'] }}</h5>
                        <p class="text-muted mb-0">{{ $valor['description'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Commitment Section -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <i class="fas fa-heart fa-3x mb-4 opacity-75"></i>
                <h2 class="display-5 fw-bold mb-4">Nuestro Compromiso</h2>
                <p class="lead mb-4">
                    San Marcos se compromete a formar profesionales íntegros, competentes y con responsabilidad social,
                    capaces de contribuir al desarrollo sostenible del Perú y de enfrentar los desafíos del mundo globalizado.
                </p>
                <div class="row mt-5">
                    <div class="col-md-4 mb-4 mb-md-0">
                        <div class="p-3">
                            <i class="fas fa-graduation-cap fa-3x mb-3"></i>
                            <h4 class="fw-bold">Excelencia Académica</h4>
                            <p class="opacity-75 mb-0">Educación de primer nivel con estándares internacionales</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4 mb-md-0">
                        <div class="p-3">
                            <i class="fas fa-flask fa-3x mb-3"></i>
                            <h4 class="fw-bold">Innovación</h4>
                            <p class="opacity-75 mb-0">Investigación que transforma y genera conocimiento</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3">
                            <i class="fas fa-users fa-3x mb-3"></i>
                            <h4 class="fw-bold">Inclusión</h4>
                            <p class="opacity-75 mb-0">Acceso equitativo a educación de calidad</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="fw-bold mb-4">Únete a la Decana de América</h2>
                <p class="lead text-muted mb-4">
                    Forma parte de la primera universidad del Perú y contribuye al desarrollo de nuestra sociedad.
                </p>
                <div class="d-flex gap-3 justify-content-center">
                    <a href="#admision" class="btn btn-primary btn-lg px-4">
                        <i class="fas fa-graduation-cap me-2"></i>Admisión
                    </a>
                    <a href="{{ route('universidad.historia') }}" class="btn btn-outline-primary btn-lg px-4">
                        <i class="fas fa-history me-2"></i>Nuestra Historia
                    </a>
                </div>
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
