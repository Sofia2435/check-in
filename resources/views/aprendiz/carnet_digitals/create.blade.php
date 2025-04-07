@extends('aprendiz.dashboard')

@section('title', 'Registro de Datos')

@section('contents')
<div class="min-h-screen flex items-center justify-center bg-green-50">
    <div class="w-full max-w-2xl p-8 bg-white rounded-xl shadow-md border border-green-300" style="background-color: rgb(232, 255, 238); font-family: 'Caviar Dreams', sans-serif; font-size: 15px;">
        <h1 class="text-3xl text-center mb-6 text-green-800" style="font-family: 'Caviar Dreams'; font-size: 26px;">
            Solicitar Carnet Digital
        </h1>
        <hr class="mb-6 border-green-300" />

        <form action="{{ route('carnet_digitals.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="form-label font-semibold">Tipo de Usuario</label>
                <select name="tipo_usuario" class="form-select w-full rounded border-gray-300" required>
                    <option value="">Seleccione una opción</option>
                    <option value="aprendiz" {{ old('tipo_usuario', $carnet->tipo_usuario ?? '') == 'aprendiz' ? 'selected' : '' }}>Aprendiz</option>
                    <option value="instructor" {{ old('tipo_usuario', $carnet->tipo_usuario ?? '') == 'instructor' ? 'selected' : '' }}>Instructor</option>
                </select>
                @error('tipo_usuario') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-4">
                <label class="form-label font-semibold">Nombre completo</label>
                <input type="text" name="nombre_completo" class="form-control w-full rounded border-gray-300 py-2 px-3 text-base" style="background-color: rgb(241, 255, 237);" value="{{ old('nombre_completo', Auth::user()->name) }}" required>
                @error('nombre_completo') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-4">
                <label class="form-label font-semibold">Ficha</label>
                <input type="text" name="ficha" class="form-control w-full rounded border-gray-300 py-2 px-3 text-base" style="background-color: rgb(241, 255, 237);" value="{{ old('ficha') }}">
                @error('ficha') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-4">
                <label class="form-label font-semibold">Programa de formación</label>
                <input type="text" name="programa" class="form-control w-full rounded border-gray-300 py-2 px-3 text-base" style="background-color: rgb(241, 255, 237);" value="{{ old('programa') }}" required>
                @error('programa') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-6">
                <label class="form-label font-semibold">Jornada</label>
                <input type="text" name="jornada" class="form-control w-full rounded border-gray-300 py-2 px-3 text-base" style="background-color: rgb(241, 255, 237);" value="{{ old('jornada') }}" required>
                @error('jornada') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn w-full text-green-700 py-2 rounded-lg font-semibold" style="background-color:rgb(183, 255, 155); font-family: 'Caviar Dreams'; font-size: 15px;">
                Enviar Solicitud
            </button>
        </form>
    </div>
</div>
@endsection
