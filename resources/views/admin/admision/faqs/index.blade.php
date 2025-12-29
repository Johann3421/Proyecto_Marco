@extends('layouts.admin')

@section('title', 'Preguntas Frecuentes')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Preguntas Frecuentes (FAQs)</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Admisión</li>
                    <li class="breadcrumb-item active">FAQs</li>
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
                    <i class="fas fa-question-circle mr-2"></i>
                    Lista de Preguntas Frecuentes
                </h3>
                <div class="card-tools">
                    <a href="{{ route('admin.admision.faqs.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Nueva Pregunta
                    </a>
                </div>
            </div>
            <div class="card-body">
                @forelse($faqs as $faq)
                    <div class="card card-outline card-info mb-3">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-question-circle text-primary mr-2"></i>
                                <strong>{{ $faq['pregunta'] }}</strong>
                            </h5>
                            <div class="card-tools">
                                <span class="badge badge-info">ID: {{ $faq['id'] }}</span>
                                <a href="{{ route('admin.admision.faqs.edit', $faq['id']) }}"
                                   class="btn btn-warning btn-sm ml-2" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.admision.faqs.destroy', $faq['id']) }}"
                                      method="POST"
                                      style="display: inline;"
                                      onsubmit="return confirm('¿Está seguro de eliminar esta pregunta?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Eliminar">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="mb-0">{{ $faq['respuesta'] }}</p>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i> No hay preguntas frecuentes registradas
                    </div>
                @endforelse
            </div>
            <div class="card-footer">
                <div class="text-muted">
                    <i class="fas fa-info-circle"></i> Total de preguntas: <strong>{{ count($faqs) }}</strong>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
