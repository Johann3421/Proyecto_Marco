<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Panel') | UNMSM</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    <!-- Custom CSS -->
    <style>
        .brand-link {
            border-bottom: 1px solid #4b545c;
        }
        .sidebar-dark-primary {
            background-color: #1e3c72;
        }
        .sidebar-dark-primary .nav-sidebar > .nav-item > .nav-link.active {
            background-color: #2a5298;
            color: #fff;
        }
        .main-header {
            border-bottom: 1px solid #dee2e6;
        }
        .content-wrapper {
            background-color: #f4f6f9;
        }
        .small-box {
            border-radius: 0.5rem;
        }
        .card {
            border-radius: 0.5rem;
            box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
        }
    </style>

    @stack('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('home') }}" class="nav-link" target="_blank">
                        <i class="fas fa-globe me-1"></i> Ver Sitio Web
                    </a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">3 Notificaciones</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 2 nuevos mensajes
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 1 nueva solicitud
                        </a>
                    </div>
                </li>

                <!-- User Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user"></i>
                        <span class="d-none d-md-inline ml-1">{{ Auth::user()->name }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-user mr-2"></i> Mi Perfil
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-cog mr-2"></i> Configuración
                        </a>
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="fas fa-sign-out-alt mr-2"></i> Cerrar Sesión
                            </button>
                        </form>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('admin.dashboard') }}" class="brand-link text-center">
                <span class="brand-text font-weight-bold">UNMSM Admin</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <i class="fas fa-user-circle fa-2x text-white"></i>
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <!-- Dashboard -->
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <li class="nav-header">GESTIÓN INSTITUCIONAL</li>

                        <!-- Universidad -->
                        <li class="nav-item {{ request()->routeIs('admin.universidad.*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->routeIs('admin.universidad.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-landmark"></i>
                                <p>
                                    Universidad
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.universidad.historia.index') }}" class="nav-link {{ request()->routeIs('admin.universidad.historia.*') ? 'active' : '' }}">
                                        <i class="far fa-clock nav-icon"></i>
                                        <p>Eventos Históricos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.universidad.autoridades.index') }}" class="nav-link {{ request()->routeIs('admin.universidad.autoridades.*') ? 'active' : '' }}">
                                        <i class="far fa-id-card nav-icon"></i>
                                        <p>Autoridades</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.universidad.mision-vision') }}" class="nav-link {{ request()->routeIs('admin.universidad.mision-vision') ? 'active' : '' }}">
                                        <i class="far fa-eye nav-icon"></i>
                                        <p>Misión y Visión</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Académico -->
                        <li class="nav-item {{ request()->routeIs('admin.academico.*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->routeIs('admin.academico.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-graduation-cap"></i>
                                <p>
                                    Académico
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.academico.facultades.index') }}" class="nav-link {{ request()->routeIs('admin.academico.facultades.*') ? 'active' : '' }}">
                                        <i class="fas fa-university nav-icon"></i>
                                        <p>Facultades</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.academico.escuelas.index') }}" class="nav-link {{ request()->routeIs('admin.academico.escuelas.*') ? 'active' : '' }}">
                                        <i class="fas fa-graduation-cap nav-icon"></i>
                                        <p>Escuelas Profesionales</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.academico.posgrado.index') }}" class="nav-link {{ request()->routeIs('admin.academico.posgrado.*') ? 'active' : '' }}">
                                        <i class="fas fa-user-graduate nav-icon"></i>
                                        <p>Posgrado</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Admisión -->
                        <li class="nav-item {{ request()->routeIs('admin.admision.*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->routeIs('admin.admision.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user-graduate"></i>
                                <p>
                                    Admisión
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.admision.modalidades.index') }}" class="nav-link {{ request()->routeIs('admin.admision.modalidades.*') ? 'active' : '' }}">
                                        <i class="fas fa-door-open nav-icon"></i>
                                        <p>Modalidades</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.admision.proceso.index') }}" class="nav-link {{ request()->routeIs('admin.admision.proceso.*') ? 'active' : '' }}">
                                        <i class="fas fa-list-ol nav-icon"></i>
                                        <p>Proceso de Admisión</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.admision.calendario.index') }}" class="nav-link {{ request()->routeIs('admin.admision.calendario.*') ? 'active' : '' }}">
                                        <i class="fas fa-calendar-alt nav-icon"></i>
                                        <p>Calendario</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.admision.faqs.index') }}" class="nav-link {{ request()->routeIs('admin.admision.faqs.*') ? 'active' : '' }}">
                                        <i class="fas fa-question-circle nav-icon"></i>
                                        <p>Preguntas Frecuentes</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-header">CONFIGURACIÓN</li>

                        <!-- Usuarios -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Usuarios</p>
                            </a>
                        </li>

                        <!-- Ajustes -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>Ajustes Generales</p>
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('page-title', 'Dashboard')</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                @yield('breadcrumb')
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
        </div>

        <!-- Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2025 <a href="#">UNMSM</a>.</strong>
            Todos los derechos reservados.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AdminLTE App -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

    @stack('scripts')
</body>
</html>
