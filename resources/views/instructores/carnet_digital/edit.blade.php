@extends('instructores.dashboard')

@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
    <div class="card shadow-lg p-4 w-100" style="max-width: 600px; background-color: #f1fdf4;">
        <h2 class="text-center mb-4 text-success" style="font-family: josephsophia;">Editar Solicitud de Carnet</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('carnet_digital.update', $carnet->id) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" name="tipo_usuario" value="aprendiz">

            <div class="mb-3">
                <label class="form-label">Nombre completo</label>
                <input type="text" name="nombre_completo" class="form-control" value="{{ old('nombre_completo', $carnet->nombre_completo) }}" required>
                @error('nombre_completo') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Ficha</label>
                <input type="text" name="ficha" class="form-control" value="{{ old('ficha', $carnet->ficha) }}">
                @error('ficha') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Programa de formación</label>
                <input type="text" name="programa" class="form-control" value="{{ old('programa', $carnet->programa) }}" required>
                @error('programa') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-4">
                <label class="form-label">Jornada</label>
                <input type="text" name="jornada" class="form-control" value="{{ old('jornada', $carnet->jornada) }}" required>
                @error('jornada') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-success w-100">Actualizar</button>
        </form>
    </div>
</div>
@endsection

