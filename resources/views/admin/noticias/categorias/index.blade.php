@extends('layouts.admin')

@section('title', 'Categorías de Noticias')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">
                    <i class="fas fa-folder text-primary"></i>
                    Categorías de Noticias
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.noticias.noticias.index') }}">Noticias</a></li>
                    <li class="breadcrumb-item active">Categorías</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-12">
                <a href="{{ route('admin.noticias.categorias.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i> Nueva Categoría
                </a>
                <a href="{{ route('admin.noticias.noticias.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left"></i> Volver a Noticias
                </a>
            </div>
        </div>

        @if(count($categorias) > 0)
            <div class="row">
                @foreach($categorias as $index => $categoria)
                <div class="col-md-6 col-lg-4">
                    <div class="card card-outline card-{{ $categoria['color'] }}">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas {{ $categoria['icono'] }} mr-2"></i>
                                <strong>{{ $categoria['nombre'] }}</strong>
                            </h3>
                            <div class="card-tools">
                                <span class="badge badge-{{ $categoria['color'] }}">{{ $categoria['slug'] }}</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="mb-3">{{ $categoria['descripcion'] }}</p>

                            <div class="row">
                                <div class="col-6">
                                    <p class="mb-0">
                                        <small class="text-muted">Color:</small><br>
                                        <span class="badge badge-{{ $categoria['color'] }}">
                                            {{ ucfirst($categoria['color']) }}
                                        </span>
                                    </p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-0">
                                        <small class="text-muted">Icono:</small><br>
                                        <code>{{ $categoria['icono'] }}</code>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="btn-group btn-block">
                                <a href="{{ route('admin.noticias.categorias.edit', $index) }}"
                                   class="btn btn-warning">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <form action="{{ route('admin.noticias.categorias.destroy', $index) }}"
                                      method="POST"
                                      class="d-inline w-50"
                                      onsubmit="return confirm('¿Está seguro de eliminar esta categoría?');">
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
                                Total de categorías: <strong>{{ count($categorias) }}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-info">
                <h5><i class="icon fas fa-info"></i> No hay categorías registradas</h5>
                Comience creando categorías para organizar las noticias.
            </div>
        @endif
    </div>
</div>
@endsection
