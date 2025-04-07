@extends('instructores.dashboard')

@section('contents')
    <style>
        @import url('https://fonts.cdnfonts.com/css/caviar-dreams');

        * {
            font-family: 'Caviar Dreams', sans-serif;
        }

        .form-container {
            background-color: rgb(232, 255, 238);
            padding: 2rem;
            border-radius: 1rem;
            max-width: 600px;
            margin: 0 auto;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
    </style>

    <div class="form-container mt-10">
        <h1 class="text-2xl font-semibold text-center text-green-900 mb-6">Editar Equipo</h1>

        <form action="{{ route('registro_equipo.update', $equipo->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="tipo_equipo" class="block text-sm font-medium text-green-900">Tipo de Equipo</label>
                <input id="tipo_equipo" name="tipo_equipo" type="text" value="{{ old('tipo_equipo', $equipo->tipo_equipo) }}" 
                    class="mt-1 block w-full rounded-md border-green-300 shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-lg py-2 px-3" 
                    style="background-color:rgb(223, 250, 230); border-color:rgb(62, 113, 73);">
            </div>

            <div class="mb-4">
                <label for="nombre_equipo" class="block text-sm font-medium text-green-900">Nombre del Equipo</label>
                <input id="nombre_equipo" name="nombre_equipo" type="text" value="{{ old('nombre_equipo', $equipo->nombre_equipo) }}" 
                    class="mt-1 block w-full rounded-md border-green-300 shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-lg py-2 px-3"
                    style="background-color:rgb(223, 250, 230); border-color:rgb(62, 113, 73);">
            </div>

            <div class="mb-4">
                <label for="marca" class="block text-sm font-medium text-green-900">Marca</label>
                <input id="marca" name="marca" type="text" value="{{ old('marca', $equipo->marca) }}" 
                    class="mt-1 block w-full rounded-md border-green-300 shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-lg py-2 px-3"
                    style="background-color:rgb(223, 250, 230); border-color:rgb(62, 113, 73);">
            </div>

            <div class="mb-4">
                <label for="serial" class="block text-sm font-medium text-green-900">Serial del Equipo</label>
                <input id="serial" name="serial" type="text" value="{{ old('serial', $equipo->serial) }}" 
                    class="mt-1 block w-full rounded-md border-green-300 shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-lg py-2 px-3"
                    style="background-color:rgb(223, 250, 230); border-color:rgb(62, 113, 73);">
            </div>

            <div class="mb-4">
                <label for="descripcion" class="block text-sm font-medium text-green-900">Descripción</label>
                <input id="descripcion" name="descripcion" type="text" value="{{ old('descripcion', $equipo->descripcion) }}" 
                    class="mt-1 block w-full rounded-md border-green-300 shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-lg py-2 px-3" 
                    style="background-color:rgb(223, 250, 230); border-color:rgb(62, 113, 73);">
            </div>

            <button type="submit" class="w-full rounded-md px-4 py-3 text-lg font-semibold text-white shadow-sm hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2" style="background-color:rgb(62, 113, 73)">
                Actualizar Equipo
            </button>
        </form>
    </div>
@endsection

