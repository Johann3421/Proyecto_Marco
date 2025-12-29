@extends('layouts.app')

@section('title', $title . ' - UNMSM')

@section('content')

<!-- Hero Section -->
<section class="hero-section position-relative" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); min-height: 300px;">
    <div class="container h-100">
        <div class="row align-items-center h-100 py-5">
            <div class="col-12 text-white text-center">
                <h1 class="display-4 fw-bold mb-3">Historia de la UNMSM</h1>
                <p class="lead">473 años formando profesionales de excelencia</p>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white">Inicio</a></li>
                        <li class="breadcrumb-item text-white-50 active">Historia</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Introduction Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h2 class="fw-bold mb-4">La Decana de América</h2>
                <p class="lead text-muted mb-4">
                    La Universidad Nacional Mayor de San Marcos es la institución educativa de nivel superior más antigua y más importante del Perú y de América.
                </p>
                <p class="mb-4">
                    Fundada el 12 de mayo de 1551 por Real Cédula expedida por Carlos V del Sacro Imperio Romano Germánico, es la primera universidad oficialmente constituida y la más antigua del continente americano.
                </p>
                <p class="mb-4">
                    A lo largo de su historia, San Marcos ha sido protagonista de los acontecimientos más importantes de la vida nacional, formando a los principales líderes, pensadores y profesionales que han contribuido al desarrollo del Perú.
                </p>
            </div>
            <div class="col-lg-6">
                <div class="rounded-3 overflow-hidden shadow-lg" style="height: 400px; background: linear-gradient(135deg, rgba(30, 60, 114, 0.7), rgba(42, 82, 152, 0.7)), url('https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=900&h=700&fit=crop&auto=format'); background-size: cover; background-position: center;">
                    <div class="d-flex align-items-center justify-content-center h-100 text-white text-center p-4">
                        <div>
                            <i class="fas fa-landmark fa-5x mb-3 opacity-75"></i>
                            <h3 class="fw-bold">Desde 1551</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Timeline Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold mb-3">Hitos Históricos</h2>
            <p class="text-muted">Los momentos más importantes de nuestra institución</p>
        </div>

        <div class="row">
            @foreach($eventos as $index => $evento)
            <div class="col-12 mb-5">
                <div class="row align-items-center {{ $index % 2 == 0 ? '' : 'flex-row-reverse' }}">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <div class="card border-0 shadow-sm hover-card h-100">
                            <div class="card-body p-4">
                                <span class="badge bg-primary mb-3" style="font-size: 1.2rem;">{{ $evento['year'] }}</span>
                                <h3 class="fw-bold mb-3">{{ $evento['title'] }}</h3>
                                <p class="text-muted mb-0">{{ $evento['description'] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="rounded-3 overflow-hidden shadow-lg" style="height: 300px; background: url('{{ $evento['image'] }}'); background-size: cover; background-position: center;">
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold mb-3">San Marcos en Números</h2>
            <p class="opacity-75">Un legado de excelencia académica</p>
        </div>
        <div class="row text-center">
            <div class="col-md-3 mb-4 mb-md-0">
                <div class="p-4">
                    <i class="fas fa-calendar-alt fa-3x mb-3 opacity-75"></i>
                    <h3 class="fw-bold display-4">473</h3>
                    <p class="mb-0 opacity-75">Años de Historia</p>
                </div>
            </div>
            <div class="col-md-3 mb-4 mb-md-0">
                <div class="p-4">
                    <i class="fas fa-graduation-cap fa-3x mb-3 opacity-75"></i>
                    <h3 class="fw-bold display-4">200k+</h3>
                    <p class="mb-0 opacity-75">Egresados</p>
                </div>
            </div>
            <div class="col-md-3 mb-4 mb-md-0">
                <div class="p-4">
                    <i class="fas fa-award fa-3x mb-3 opacity-75"></i>
                    <h3 class="fw-bold display-4">#1</h3>
                    <p class="mb-0 opacity-75">Universidad del Perú</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-4">
                    <i class="fas fa-globe-americas fa-3x mb-3 opacity-75"></i>
                    <h3 class="fw-bold display-4">1°</h3>
                    <p class="mb-0 opacity-75">De América</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Legacy Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="display-5 fw-bold mb-4">Nuestro Legado</h2>
                <p class="lead text-muted mb-4">
                    San Marcos ha sido cuna de destacados personajes que han marcado la historia del Perú y América.
                </p>
                <div class="row mt-5">
                    <div class="col-md-4 mb-4">
                        <div class="card border-0 shadow-sm hover-card h-100">
                            <div class="card-body text-center p-4">
                                <i class="fas fa-quotehistórico-left fa-2x text-primary mb-3"></i>
                                <h5 class="fw-bold mb-3">Pensadores</h5>
                                <p class="text-muted mb-0">José Carlos Mariátegui, Raúl Porras Barrenechea, Jorge Basadre</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card border-0 shadow-sm hover-card h-100">
                            <div class="card-body text-center p-4">
                                <i class="fas fa-landmark fa-2x text-success mb-3"></i>
                                <h5 class="fw-bold mb-3">Políticos</h5>
                                <p class="text-muted mb-0">Hipólito Unanue, Manuel Pardo, Víctor Raúl Haya de la Torre</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card border-0 shadow-sm hover-card h-100">
                            <div class="card-body text-center p-4">
                                <i class="fas fa-pen-fancy fa-2x text-warning mb-3"></i>
                                <h5 class="fw-bold mb-3">Escritores</h5>
                                <p class="text-muted mb-0">Abraham Valdelomar, César Vallejo, Mario Vargas Llosa</p>
                            </div>
                        </div>
                    </div>
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
