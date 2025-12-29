@extends('layouts.admin')

@section('title', 'Misión y Visión')

@section('page-title', 'Editar Misión y Visión')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item active">Misión y Visión</li>
@endsection

@section('content')
<div class="container-fluid">

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <i class="icon fas fa-check"></i> {{ session('success') }}
    </div>
    @endif

    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-eye mr-2"></i>
                        Gestión de Misión y Visión Institucional
                    </h3>
                </div>
                <form action="{{ route('admin.universidad.mision-vision.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">

                        <div class="callout callout-info">
                            <h5><i class="fas fa-info-circle"></i> Información</h5>
                            <p>La misión y visión son declaraciones fundamentales que definen el propósito y los objetivos de la universidad. Estos textos se mostrarán en la página pública de la institución.</p>
                        </div>

                        <div class="form-group">
                            <label for="mision">
                                <i class="fas fa-bullseye text-primary mr-1"></i>
                                Misión Institucional <span class="text-danger">*</span>
                            </label>
                            <textarea class="form-control @error('mision') is-invalid @enderror"
                                      id="mision" name="mision" rows="6"
                                      placeholder="Ingrese la misión de la universidad" required>{{ old('mision', $mision) }}</textarea>
                            <small class="form-text text-muted">
                                Describe el propósito fundamental de la universidad, su razón de ser y compromiso con la sociedad.
                            </small>
                            @error('mision')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <hr class="my-4">

                        <div class="form-group">
                            <label for="vision">
                                <i class="fas fa-eye text-success mr-1"></i>
                                Visión Institucional <span class="text-danger">*</span>
                            </label>
                            <textarea class="form-control @error('vision') is-invalid @enderror"
                                      id="vision" name="vision" rows="6"
                                      placeholder="Ingrese la visión de la universidad" required>{{ old('vision', $vision) }}</textarea>
                            <small class="form-text text-muted">
                                Define el futuro deseado de la universidad, hacia dónde se dirige y qué aspira a ser.
                            </small>
                            @error('vision')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="alert alert-warning mt-4">
                            <h5><i class="fas fa-exclamation-triangle"></i> Importante</h5>
                            <p class="mb-0">Los cambios realizados se reflejarán inmediatamente en la página pública de Misión y Visión.</p>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-save mr-1"></i> Guardar Cambios
                        </button>
                        <a href="{{ route('universidad.mision-vision') }}" target="_blank" class="btn btn-outline-info">
                            <i class="fas fa-external-link-alt mr-1"></i> Vista Previa
                        </a>
                    </div>
                </form>
            </div>

            <!-- Preview Card -->
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-desktop mr-2"></i>
                        Vista Previa
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="callout callout-primary">
                                <h4>MISIÓN</h4>
                                <p id="preview-mision">{{ $mision }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="callout callout-success">
                                <h4>VISIÓN</h4>
                                <p id="preview-vision">{{ $vision }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Live preview
document.getElementById('mision').addEventListener('input', function() {
    document.getElementById('preview-mision').textContent = this.value;
});

document.getElementById('vision').addEventListener('input', function() {
    document.getElementById('preview-vision').textContent = this.value;
});
</script>
@endpush
