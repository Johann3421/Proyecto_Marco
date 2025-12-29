@extends('layouts.admin')

@section('title', 'Editar Escuela Profesional')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Editar Escuela Profesional</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.academico.escuelas.index') }}">Escuelas</a></li>
                    <li class="breadcrumb-item active">Editar</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="card-title">
                    <i class="fas fa-edit mr-2"></i>
                    Editar: {{ $escuela['nombre'] }}
                </h3>
            </div>
            <form action="{{ route('admin.academico.escuelas.update', $escuela['id']) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre">Nombre de la Escuela Profesional <span class="text-danger">*</span></label>
                                <input type="text"
                                       class="form-control @error('nombre') is-invalid @enderror"
                                       id="nombre"
                                       name="nombre"
                                       value="{{ old('nombre', $escuela['nombre']) }}"
                                       placeholder="Ej: Medicina Humana"
                                       required>
                                @error('nombre')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="area">Área Académica <span class="text-danger">*</span></label>
                                <select class="form-control @error('area') is-invalid @enderror"
                                        id="area"
                                        name="area"
                                        required>
                                    <option value="">Seleccionar área...</option>
                                    @foreach($areas as $areaOption)
                                    <option value="{{ $areaOption }}" {{ old('area', $escuela['area']) == $areaOption ? 'selected' : '' }}>
                                        {{ $areaOption }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('area')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="facultad">Facultad <span class="text-danger">*</span></label>
                                <input type="text"
                                       class="form-control @error('facultad') is-invalid @enderror"
                                       id="facultad"
                                       name="facultad"
                                       value="{{ old('facultad', $escuela['facultad']) }}"
                                       placeholder="Ej: Facultad de Medicina"
                                       required>
                                @error('facultad')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="duracion">Duración <span class="text-danger">*</span></label>
                                <select class="form-control @error('duracion') is-invalid @enderror"
                                        id="duracion"
                                        name="duracion"
                                        required>
                                    <option value="">Seleccionar duración...</option>
                                    <option value="4 años" {{ old('duracion', $escuela['duracion']) == '4 años' ? 'selected' : '' }}>4 años</option>
                                    <option value="5 años" {{ old('duracion', $escuela['duracion']) == '5 años' ? 'selected' : '' }}>5 años</option>
                                    <option value="6 años" {{ old('duracion', $escuela['duracion']) == '6 años' ? 'selected' : '' }}>6 años</option>
                                    <option value="7 años" {{ old('duracion', $escuela['duracion']) == '7 años' ? 'selected' : '' }}>7 años</option>
                                </select>
                                @error('duracion')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="grado">Grado que Otorga <span class="text-danger">*</span></label>
                                <input type="text"
                                       class="form-control @error('grado') is-invalid @enderror"
                                       id="grado"
                                       name="grado"
                                       value="{{ old('grado', $escuela['grado']) }}"
                                       placeholder="Ej: Médico Cirujano"
                                       required>
                                @error('grado')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="estudiantes">Número de Estudiantes <span class="text-danger">*</span></label>
                                <input type="number"
                                       class="form-control @error('estudiantes') is-invalid @enderror"
                                       id="estudiantes"
                                       name="estudiantes"
                                       value="{{ old('estudiantes', $escuela['estudiantes']) }}"
                                       min="1"
                                       required>
                                @error('estudiantes')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-info">
                        <i class="fas fa-save mr-1"></i> Actualizar Escuela Profesional
                    </button>
                    <a href="{{ route('admin.academico.escuelas.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times mr-1"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
