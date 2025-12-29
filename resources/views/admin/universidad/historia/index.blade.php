@extends('layouts.admin')

@section('title', 'Eventos Históricos')

@section('page-title', 'Eventos Históricos')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item active">Eventos Históricos</li>
@endsection

@section('content')
<div class="container-fluid">

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <i class="icon fas fa-check"></i> {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <i class="icon fas fa-ban"></i> {{ session('error') }}
    </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-clock mr-2"></i>
                Gestión de Eventos Históricos
            </h3>
            <div class="card-tools">
                <a href="{{ route('admin.universidad.historia.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus mr-1"></i> Nuevo Evento
                </a>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th style="width: 10%">Año</th>
                        <th style="width: 25%">Título</th>
                        <th style="width: 40%">Descripción</th>
                        <th style="width: 10%">Imagen</th>
                        <th style="width: 15%" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($eventos as $evento)
                    <tr>
                        <td><strong class="text-primary">{{ $evento['year'] }}</strong></td>
                        <td>{{ $evento['title'] }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($evento['description'], 100) }}</td>
                        <td>
                            <img src="{{ $evento['image'] }}" alt="{{ $evento['title'] }}"
                                 class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{ route('admin.universidad.historia.edit', $evento['id']) }}"
                                   class="btn btn-sm btn-info" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.universidad.historia.destroy', $evento['id']) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('¿Está seguro de eliminar este evento?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Eliminar">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">
                            <i class="fas fa-inbox fa-3x mb-3"></i>
                            <p>No hay eventos históricos registrados</p>
                            <a href="{{ route('admin.universidad.historia.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus mr-1"></i> Crear primer evento
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
