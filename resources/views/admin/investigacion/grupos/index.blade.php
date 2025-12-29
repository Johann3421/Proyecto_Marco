@extends('layouts.admin')

@section('title', 'Grupos de Investigación')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Grupos de Investigación</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Grupos</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-12">
                <a href="{{ route('admin.investigacion.grupos.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Nuevo Grupo
                </a>
            </div>
        </div>

        @if(count($grupos) > 0)
            <div class="row">
                @foreach($grupos as $index => $grupo)
                <div class="col-md-6">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-users-cog mr-2"></i>
                                <strong>{{ $grupo['nombre'] }}</strong>
                                @if(!empty($grupo['acronimo']))
                                    <span class="badge badge-primary ml-2">{{ $grupo['acronimo'] }}</span>
                                @endif
                            </h3>
                            <div class="card-tools">
                                @if(!empty($grupo['categoria']))
                                    <span class="badge badge-info">{{ $grupo['categoria'] }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="mb-3">{{ $grupo['descripcion'] }}</p>

                            <div class="row mb-3">
                                <div class="col-6">
                                    <p class="mb-1">
                                        <i class="fas fa-user-tie text-primary mr-2"></i>
                                        <strong>Líder:</strong>
                                    </p>
                                    <p class="ml-4">{{ $grupo['lider'] }}</p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-1">
                                        <i class="fas fa-users text-info mr-2"></i>
                                        <strong>Miembros:</strong>
                                    </p>
                                    <p class="ml-4">{{ $grupo['miembros'] }} personas</p>
                                </div>
                            </div>

                            @if(!empty($grupo['lineas']) && count($grupo['lineas']) > 0)
                            <div class="mb-0">
                                <p class="mb-2">
                                    <i class="fas fa-stream text-success mr-2"></i>
                                    <strong>Líneas de Investigación:</strong>
                                </p>
                                <div class="ml-4">
                                    @foreach($grupo['lineas'] as $linea)
                                        <span class="badge badge-success mr-1 mb-1">{{ $linea }}</span>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="card-footer">
                            <div class="btn-group btn-block">
                                <a href="{{ route('admin.investigacion.grupos.edit', $index) }}"
                                   class="btn btn-info">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <form action="{{ route('admin.investigacion.grupos.destroy', $index) }}"
                                      method="POST"
                                      class="d-inline w-50"
                                      onsubmit="return confirm('¿Está seguro de eliminar este grupo?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-block">
                                        <i class="fas fa-trash"></i> Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-footer">
                            <div class="text-muted">
                                <i class="fas fa-info-circle"></i>
                                Total de grupos: <strong>{{ count($grupos) }}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-info">
                <h5><i class="icon fas fa-info"></i> No hay grupos registrados</h5>
                Comience creando grupos de investigación.
            </div>
        @endif
    </div>
</div>
@endsection
