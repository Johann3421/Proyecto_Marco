@extends('layouts.admin')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
    <!-- Info boxes -->
    <div class="row">
        <!-- Total Usuarios -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $stats['total_users'] }}</h3>
                    <p>Usuarios Registrados</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="#" class="small-box-footer">
                    Más información <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Total Noticias -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $stats['total_news'] }}</h3>
                    <p>Noticias Publicadas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-newspaper"></i>
                </div>
                <a href="#" class="small-box-footer">
                    Más información <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Total Eventos -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $stats['total_events'] }}</h3>
                    <p>Eventos Programados</p>
                </div>
                <div class="icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <a href="#" class="small-box-footer">
                    Más información <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Total Facultades -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $stats['total_faculties'] }}</h3>
                    <p>Facultades</p>
                </div>
                <div class="icon">
                    <i class="fas fa-university"></i>
                </div>
                <a href="#" class="small-box-footer">
                    Más información <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-7">
            <!-- Actividad Reciente -->
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">Actividad Reciente</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th>Acción</th>
                                    <th>Usuario</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><i class="fas fa-newspaper text-success mr-2"></i> Nueva noticia publicada</td>
                                    <td>Admin</td>
                                    <td>Hoy 10:30 AM</td>
                                    <td><span class="badge badge-success">Completado</span></td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-calendar-alt text-warning mr-2"></i> Evento creado</td>
                                    <td>Admin</td>
                                    <td>Hoy 09:15 AM</td>
                                    <td><span class="badge badge-success">Completado</span></td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-user-plus text-info mr-2"></i> Nuevo usuario registrado</td>
                                    <td>Sistema</td>
                                    <td>Ayer 04:20 PM</td>
                                    <td><span class="badge badge-info">Automático</span></td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-image text-primary mr-2"></i> Imagen subida a galería</td>
                                    <td>Admin</td>
                                    <td>Ayer 02:10 PM</td>
                                    <td><span class="badge badge-success">Completado</span></td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-edit text-secondary mr-2"></i> Contenido actualizado</td>
                                    <td>Editor</td>
                                    <td>Ayer 11:45 AM</td>
                                    <td><span class="badge badge-success">Completado</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer clearfix">
                    <a href="#" class="btn btn-sm btn-info float-left">Ver todas las actividades</a>
                </div>
            </div>

            <!-- Gráfico de Visitas -->
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">
                        <i class="fas fa-chart-line mr-1"></i>
                        Estadísticas de Visitas
                    </h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="position-relative mb-4">
                        <canvas id="visitors-chart" height="200"></canvas>
                    </div>
                    <div class="d-flex flex-row justify-content-end">
                        <span class="mr-2">
                            <i class="fas fa-square text-primary"></i> Esta semana
                        </span>
                        <span>
                            <i class="fas fa-square text-gray"></i> Semana anterior
                        </span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Right col -->
        <section class="col-lg-5">
            <!-- Calendario -->
            <div class="card bg-gradient-primary">
                <div class="card-header border-0">
                    <h3 class="card-title">
                        <i class="far fa-calendar-alt mr-1"></i>
                        Calendario
                    </h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div id="calendar" style="width: 100%"></div>
                </div>
            </div>

            <!-- Próximos Eventos -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-calendar-check mr-1"></i>
                        Próximos Eventos
                    </h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <ul class="products-list product-list-in-card pl-2 pr-2">
                        <li class="item">
                            <div class="product-img">
                                <i class="fas fa-graduation-cap fa-2x text-primary"></i>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-title">Congreso Internacional de Medicina
                                    <span class="badge badge-info float-right">15 Ene</span>
                                </a>
                                <span class="product-description">
                                    Auditorio Principal - 09:00 AM
                                </span>
                            </div>
                        </li>
                        <li class="item">
                            <div class="product-img">
                                <i class="fas fa-flask fa-2x text-success"></i>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-title">Feria de Ciencias y Tecnología
                                    <span class="badge badge-success float-right">20 Ene</span>
                                </a>
                                <span class="product-description">
                                    Campus Central - Todo el día
                                </span>
                            </div>
                        </li>
                        <li class="item">
                            <div class="product-img">
                                <i class="fas fa-users fa-2x text-warning"></i>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-title">Seminario de Emprendimiento
                                    <span class="badge badge-warning float-right">25 Ene</span>
                                </a>
                                <span class="product-description">
                                    Sala de Conferencias - 03:00 PM
                                </span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="card-footer text-center">
                    <a href="#" class="uppercase">Ver Todos los Eventos</a>
                </div>
            </div>

            <!-- Accesos Rápidos -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-bolt mr-1"></i>
                        Accesos Rápidos
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 text-center mb-3">
                            <a href="#" class="btn btn-app bg-success">
                                <i class="fas fa-plus"></i> Nueva Noticia
                            </a>
                        </div>
                        <div class="col-6 text-center mb-3">
                            <a href="#" class="btn btn-app bg-warning">
                                <i class="fas fa-calendar-plus"></i> Nuevo Evento
                            </a>
                        </div>
                        <div class="col-6 text-center mb-3">
                            <a href="#" class="btn btn-app bg-info">
                                <i class="fas fa-upload"></i> Subir Imagen
                            </a>
                        </div>
                        <div class="col-6 text-center mb-3">
                            <a href="#" class="btn btn-app bg-danger">
                                <i class="fas fa-user-plus"></i> Nuevo Usuario
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Gráfico de visitas
    var ctx = document.getElementById('visitors-chart').getContext('2d');
    var visitorsChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom'],
            datasets: [{
                label: 'Esta semana',
                data: [420, 380, 450, 500, 480, 350, 300],
                backgroundColor: 'rgba(60,141,188,0.1)',
                borderColor: 'rgba(60,141,188,0.8)',
                pointBackgroundColor: '#3b8bba',
                pointBorderColor: '#3b8bba',
                tension: 0.3
            }, {
                label: 'Semana anterior',
                data: [280, 320, 300, 350, 380, 280, 250],
                backgroundColor: 'rgba(210, 214, 222, 0.1)',
                borderColor: 'rgba(210, 214, 222, 0.8)',
                pointBackgroundColor: '#c1c7d1',
                pointBorderColor: '#c1c7d1',
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endpush
