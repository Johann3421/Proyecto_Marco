<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'UNMSM - Universidad del Perú, Decana de América')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    @vite(['resources/css/app.css'])

    @stack('styles')
</head>
<body>
    <!-- Top Bar -->
    <div class="top-bar bg-primary text-white py-2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <small>
                        <i class="fas fa-phone me-2"></i> (01) 619-7000
                        <span class="ms-4"><i class="fas fa-envelope me-2"></i> informes@unmsm.edu.pe</span>
                    </small>
                </div>
                <div class="col-md-4 text-end">
                    <small>
                        <a href="#" class="text-white text-decoration-none me-3"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-white text-decoration-none me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white text-decoration-none me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white text-decoration-none"><i class="fab fa-youtube"></i></a>
                    </small>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <div class="logo-container bg-gradient rounded-circle me-3 shadow-sm" style="width: 60px; height: 60px; background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-university text-white" style="font-size: 28px;"></i>
                </div>
                <div>
                    <h4 class="mb-0 fw-bold text-primary">UNMSM</h4>
                    <small class="text-muted">Decana de América</small>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active fw-semibold" href="{{ route('home') }}">Inicio</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-semibold" href="#" role="button" data-bs-toggle="dropdown">
                            Universidad
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('universidad.historia') }}">Historia</a></li>
                            <li><a class="dropdown-item" href="{{ route('universidad.autoridades') }}">Autoridades</a></li>
                            <li><a class="dropdown-item" href="{{ route('universidad.mision-vision') }}">Misión y Visión</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-semibold" href="#" role="button" data-bs-toggle="dropdown">
                            Académico
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Facultades</a></li>
                            <li><a class="dropdown-item" href="#">Escuelas Profesionales</a></li>
                            <li><a class="dropdown-item" href="#">Posgrado</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="#admision">Admisión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="#investigacion">Investigación</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="#noticias">Noticias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="#contacto">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white pt-5 pb-3">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5 class="fw-bold mb-3">Universidad Nacional Mayor de San Marcos</h5>
                    <p class="text-white-50">La universidad del Perú, Decana de América. Fundada en 1551.</p>
                    <div class="mt-3">
                        <a href="#" class="btn btn-outline-light btn-sm me-2"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="btn btn-outline-light btn-sm me-2"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="btn btn-outline-light btn-sm me-2"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="btn btn-outline-light btn-sm"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <div class="col-md-2 mb-4">
                    <h6 class="fw-bold mb-3">Enlaces Rápidos</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none hover-link">Inicio</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none hover-link">Nosotros</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none hover-link">Facultades</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none hover-link">Admisión</a></li>
                    </ul>
                </div>

                <div class="col-md-3 mb-4">
                    <h6 class="fw-bold mb-3">Servicios</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none hover-link">Biblioteca Central</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none hover-link">Campus Virtual</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none hover-link">Correo Institucional</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none hover-link">Transparencia</a></li>
                    </ul>
                </div>

                <div class="col-md-3 mb-4">
                    <h6 class="fw-bold mb-3">Contacto</h6>
                    <ul class="list-unstyled text-white-50">
                        <li class="mb-2"><i class="fas fa-map-marker-alt me-2"></i>Av. Universidad s/n, Lima</li>
                        <li class="mb-2"><i class="fas fa-phone me-2"></i>(01) 619-7000</li>
                        <li class="mb-2"><i class="fas fa-envelope me-2"></i>informes@unmsm.edu.pe</li>
                    </ul>
                </div>
            </div>

            <hr class="my-4 bg-secondary">

            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0 text-white-50">&copy; 2025 UNMSM. Todos los derechos reservados.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <a href="#" class="text-white-50 text-decoration-none me-3 hover-link">Términos y Condiciones</a>
                    <a href="#" class="text-white-50 text-decoration-none hover-link">Política de Privacidad</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS -->
    @vite(['resources/js/app.js'])

    @stack('scripts')
</body>
</html>
