@extends('layouts.admin')

@section('title', 'Editar Pregunta Frecuente')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Editar Pregunta Frecuente</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.admision.faqs.index') }}">FAQs</a></li>
                    <li class="breadcrumb-item active">Editar</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <form action="{{ route('admin.admision.faqs.update', $faq['id']) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-question-circle mr-2"></i>
                                Datos de la Pregunta
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="pregunta">Pregunta <span class="text-danger">*</span></label>
                                <input type="text"
                                       class="form-control @error('pregunta') is-invalid @enderror"
                                       id="pregunta"
                                       name="pregunta"
                                       value="{{ old('pregunta', $faq['pregunta']) }}"
                                       required>
                                @error('pregunta')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="respuesta">Respuesta <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('respuesta') is-invalid @enderror"
                                          id="respuesta"
                                          name="respuesta"
                                          rows="6"
                                          required>{{ old('respuesta', $faq['respuesta']) }}</textarea>
                                @error('respuesta')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Actualizar Pregunta
                            </button>
                            <a href="{{ route('admin.admision.faqs.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Cancelar
                            </a>
                        </div>
                    </div>
                </form>

                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-eye"></i> Vista Previa
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="accordion" id="previewAccordion">
                            <div class="card">
                                <div class="card-header" id="headingPreview">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapsePreview">
                                            <i class="fas fa-question-circle text-primary mr-2"></i>
                                            <strong>{{ $faq['pregunta'] }}</strong>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapsePreview" class="collapse show" data-parent="#previewAccordion">
                                    <div class="card-body">
                                        {{ $faq['respuesta'] }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
