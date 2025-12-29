@extends('layouts.admin')

@section('title', 'Autoridades Universitarias')

@section('page-title', 'Autoridades Universitarias')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item active">Autoridades</li>
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
                <i class="fas fa-id-card mr-2"></i>
                Gestión de Autoridades Universitarias
            </h3>
            <div class="card-tools">
                <a href="{{ route('admin.universidad.autoridades.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus mr-1"></i> Nueva Autoridad
                </a>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th style="width: 10%">Foto</th>
                        <th style="width: 20%">Cargo</th>
                        <th style="width: 20%">Nombre</th>
                        <th style="width: 15%">Periodo</th>
                        <th style="width: 20%">Email</th>
                        <th style="width: 15%" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($autoridades as $autoridad)
                    <tr>
                        <td>
                            <img src="{{ $autoridad['image'] }}" alt="{{ $autoridad['nombre'] }}"
                                 class="img-circle" style="width: 50px; height: 50px; object-fit: cover;">
                        </td>
                        <td><strong class="text-primary">{{ $autoridad['cargo'] }}</strong></td>
                        <td>{{ $autoridad['nombre'] }}</td>
                        <td>
                            <span class="badge badge-info">{{ $autoridad['periodo'] }}</span>
                        </td>
                        <td>
                            <small>{{ $autoridad['email'] }}</small>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{ route('admin.universidad.autoridades.edit', $autoridad['id']) }}"
                                   class="btn btn-sm btn-info" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.universidad.autoridades.destroy', $autoridad['id']) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('¿Está seguro de eliminar esta autoridad?')">
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
                        <td colspan="6" class="text-center text-muted py-4">
                            <i class="fas fa-inbox fa-3x mb-3"></i>
                            <p>No hay autoridades registradas</p>
                            <a href="{{ route('admin.universidad.autoridades.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus mr-1"></i> Crear primera autoridad
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
