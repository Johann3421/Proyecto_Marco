@extends('layouts.admin')

@section('title', 'Publicaciones Científicas')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Publicaciones Científicas</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Publicaciones</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-12">
                <a href="{{ route('admin.investigacion.publicaciones.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Nueva Publicación
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                @if(count($publicaciones) > 0)
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-file-alt mr-2"></i>
                                Lista de Publicaciones
                            </h3>
                        </div>
                        <div class="card-body">
                            @foreach($publicaciones as $index => $publicacion)
                            <div class="card mb-3 {{ $loop->last ? 'mb-0' : '' }}">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <h5 class="mb-2">
                                                <i class="fas fa-bookmark text-primary mr-2"></i>
                                                {{ $publicacion['titulo'] }}
                                            </h5>
                                            <p class="text-muted mb-2">
                                                <i class="fas fa-users mr-2"></i>
                                                <strong>Autores:</strong> {{ $publicacion['autores'] }}
                                            </p>
                                            <p class="text-muted mb-2">
                                                <i class="fas fa-book mr-2"></i>
                                                <strong>Revista:</strong> {{ $publicacion['revista'] }}
                                            </p>
                                            <div class="d-flex align-items-center flex-wrap">
                                                <span class="badge badge-info mr-2">
                                                    <i class="far fa-calendar"></i> {{ $publicacion['año'] }}
                                                </span>
                                                <span class="badge badge-secondary mr-2">
                                                    {{ $publicacion['tipo'] }}
                                                </span>
                                                @if(!empty($publicacion['doi']))
                                                <a href="https://doi.org/{{ $publicacion['doi'] }}"
                                                   target="_blank"
                                                   class="badge badge-success">
                                                    <i class="fas fa-external-link-alt"></i> DOI: {{ $publicacion['doi'] }}
                                                </a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-2 text-right">
                                            <div class="btn-group-vertical">
                                                <a href="{{ route('admin.investigacion.publicaciones.edit', $index) }}"
                                                   class="btn btn-sm btn-info mb-1">
                                                    <i class="fas fa-edit"></i> Editar
                                                </a>
                                                <form action="{{ route('admin.investigacion.publicaciones.destroy', $index) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('¿Está seguro de eliminar esta publicación?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash"></i> Eliminar
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="card-footer">
                            <div class="text-muted">
                                <i class="fas fa-info-circle"></i>
                                Total de publicaciones: <strong>{{ count($publicaciones) }}</strong>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="alert alert-info">
                        <h5><i class="icon fas fa-info"></i> No hay publicaciones registradas</h5>
                        Comience agregando publicaciones científicas.
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
