@extends('admin.dashboard')

@section('contents')
<div class="flex items-center justify-center min-h-screen px-4">
    <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-md text-sm" style="font-family: 'Caviar Dreams'; background-color:rgb(232, 255, 238);">
        <h1 class="text-2xl font-bold mb-5 text-center text-green-700" style="font-family: 'Caviar Dreams'">
            Editar Equipo
        </h1>

        <form action="{{ route('registros-equipo.update', $equipo->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nombre_equipo" class="block text-gray-700">Nombre del Equipo</label>
                <input type="text" name="nombre_equipo" id="nombre_equipo" value="{{ old('nombre_equipo', $equipo->nombre_equipo) }}" style="background-color: rgb(241, 255, 237);" class="mt-1 block w-full border border-green-300 rounded px-3 py-1 shadow-sm focus:outline-none focus:ring focus:border-green-500" required>
            </div>

            <div class="mb-3">
                <label for="tipo_equipo" class="block text-gray-700">Tipo de Equipo</label>
                <input type="text" name="tipo_equipo" id="tipo_equipo" value="{{ old('tipo_equipo', $equipo->tipo_equipo) }}" style="background-color: rgb(241, 255, 237);" class="mt-1 block w-full border border-green-300 rounded px-3 py-1 shadow-sm focus:outline-none focus:ring focus:border-green-500" required>
            </div>

            <div class="mb-3">
                <label for="marca" class="block text-gray-700">Marca</label>
                <input type="text" name="marca" id="marca" value="{{ old('marca', $equipo->marca) }}" style="background-color: rgb(241, 255, 237);" class="mt-1 block w-full border border-green-300 rounded px-3 py-1 shadow-sm focus:outline-none focus:ring focus:border-green-500" required>
            </div>

            <div class="mb-3">
                <label for="serial" class="block text-gray-700">Serial</label>
                <input type="text" name="serial" id="serial" value="{{ old('serial', $equipo->serial) }}" style="background-color: rgb(241, 255, 237);" class="mt-1 block w-full border border-green-300 rounded px-3 py-1 shadow-sm focus:outline-none focus:ring focus:border-green-500" required>
            </div>

            <div class="mb-4">
                <label for="descripcion" class="block text-gray-700">Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="3" style="background-color: rgb(241, 255, 237);" class="mt-1 block w-full border border-green-300 rounded px-3 py-1 shadow-sm focus:outline-none focus:ring focus:border-green-500">{{ old('descripcion', $equipo->descripcion) }}</textarea>
            </div>

            <div class="text-center">
                <button type="submit" class=" text-green-700 px-5 py-1 rounded hover:bg-green-700 transition duration-200" style="background-color: rgb(172, 255, 149);">
                    Actualizar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
