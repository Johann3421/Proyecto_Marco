@extends('layouts.admin')

@section('title', 'Investigadores')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Investigadores</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Investigadores</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-12">
                <a href="{{ route('admin.investigacion.investigadores.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Nuevo Investigador
                </a>
            </div>
        </div>

        @if(count($investigadores) > 0)
            <div class="row">
                @foreach($investigadores as $index => $investigador)
                <div class="col-md-6 col-lg-4">
                    <div class="card card-widget widget-user">
                        <div class="widget-user-header bg-info">
                            <h3 class="widget-user-username">{{ $investigador['nombre'] }}</h3>
                            <h5 class="widget-user-desc">{{ $investigador['especialidad'] }}</h5>
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle elevation-2"
                                 src="{{ $investigador['imagen'] }}"
                                 alt="{{ $investigador['nombre'] }}">
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="description-block border-right">
                                        <h5 class="description-header">{{ $investigador['proyectos'] }}</h5>
                                        <span class="description-text">PROYECTOS</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="description-block">
                                        <h5 class="description-header">{{ $investigador['publicaciones'] }}</h5>
                                        <span class="description-text">PUBLICACIONES</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <p class="mb-2">
                                        <i class="fas fa-university mr-2 text-muted"></i>
                                        {{ $investigador['facultad'] }}
                                    </p>
                                    <p class="mb-0">
                                        <i class="fas fa-envelope mr-2 text-muted"></i>
                                        <a href="mailto:{{ $investigador['email'] }}">{{ $investigador['email'] }}</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer p-2">
                            <div class="btn-group btn-block">
                                <a href="{{ route('admin.investigacion.investigadores.edit', $index) }}"
                                   class="btn btn-sm btn-info">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <form action="{{ route('admin.investigacion.investigadores.destroy', $index) }}"
                                      method="POST"
                                      class="d-inline w-50"
                                      onsubmit="return confirm('¿Está seguro de eliminar este investigador?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger btn-block">
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
                                Total de investigadores: <strong>{{ count($investigadores) }}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-info">
                <h5><i class="icon fas fa-info"></i> No hay investigadores registrados</h5>
                Comience agregando perfiles de investigadores.
            </div>
        @endif
    </div>
</div>
@endsection
