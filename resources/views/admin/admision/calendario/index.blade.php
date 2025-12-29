@extends('layouts.admin')

@section('title', 'Calendario de Admisión')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Calendario de Admisión</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Admisión</li>
                    <li class="breadcrumb-item active">Calendario</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <i class="icon fas fa-check"></i> {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-calendar-alt mr-2"></i>
                    Eventos del Calendario
                </h3>
                <div class="card-tools">
                    <a href="{{ route('admin.admision.calendario.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Nuevo Evento
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width: 50px">#</th>
                                <th style="width: 100px">Mes</th>
                                <th>Evento</th>
                                <th style="width: 150px">Fecha</th>
                                <th style="width: 80px">Icono</th>
                                <th style="width: 100px">Estado</th>
                                <th style="width: 150px">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($eventos as $evento)
                                <tr class="{{ $evento['destacado'] ? 'table-warning' : '' }}">
                                    <td>{{ $evento['id'] }}</td>
                                    <td>
                                        <span class="badge badge-secondary">{{ $evento['mes'] }}</span>
                                    </td>
                                    <td>
                                        <strong>{{ $evento['evento'] }}</strong>
                                    </td>
                                    <td>
                                        <i class="fas fa-calendar mr-1"></i>{{ $evento['fecha'] }}
                                    </td>
                                    <td class="text-center">
                                        <i class="fas {{ $evento['icono'] }} fa-lg text-primary"></i>
                                    </td>
                                    <td>
                                        @if($evento['destacado'])
                                            <span class="badge badge-warning">
                                                <i class="fas fa-star"></i> Destacado
                                            </span>
                                        @else
                                            <span class="badge badge-secondary">Normal</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('admin.admision.calendario.edit', $evento['id']) }}"
                                               class="btn btn-warning" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.admision.calendario.destroy', $evento['id']) }}"
                                                  method="POST"
                                                  style="display: inline;"
                                                  onsubmit="return confirm('¿Está seguro de eliminar este evento?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" title="Eliminar">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">
                                        <p class="text-muted my-3">No hay eventos registrados</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-6">
                        <i class="fas fa-info-circle"></i> Total de eventos: <strong>{{ count($eventos) }}</strong>
                    </div>
                    <div class="col-md-6 text-right">
                        <i class="fas fa-star text-warning"></i> Eventos destacados:
                        <strong>{{ collect($eventos)->where('destacado', true)->count() }}</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
