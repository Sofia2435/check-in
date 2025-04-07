@extends('admin.dashboard')

@section('contents')
<div class="flex justify-center items-center min-h-screen px-4" >
    <div class="bg-white border border-green-300 shadow-md rounded-lg p-6 w-full max-w-md text-sm" style="font-family: 'Caviar Dreams'; background-color:rgb(232, 255, 238);">
        <h1 class="text-2xl text-center text-green-700 mb-5" style="font-family: 'Caviar Dreams'; font-size: 20px;">Ver Equipo Registrado</h1>
        <hr class="mb-5 border-green-200" />

        <div class="space-y-4">
            <div>
                <label class="block text-green-900 text-xs font-medium">Tipo de Equipo</label>
                <div class="mt-1 p-2 rounded-md bg-green-50 text-gray-800" style="background-color: rgb(241, 255, 237);">{{ $equipo->tipo_equipo }}</div>
            </div>

            <div>
                <label class="block text-green-900 text-xs font-medium">Nombre del Equipo</label>
                <div class="mt-1 p-2 rounded-md bg-green-50 text-gray-800" style="background-color: rgb(241, 255, 237);" >{{ $equipo->nombre_equipo }}</div>
            </div>

            <div>
                <label class="block text-green-900 text-xs font-medium">Marca</label>
                <div class="mt-1 p-2 rounded-md bg-green-50 text-gray-800" style="background-color: rgb(241, 255, 237);" >{{ $equipo->marca }}</div>
            </div>

            <div>
                <label class="block text-green-900 text-xs font-medium">Serial</label>
                <div class="mt-1 p-2 rounded-md bg-green-50 text-gray-800" style="background-color: rgb(241, 255, 237);" >{{ $equipo->serial }}</div>
            </div>

            <div>
                <label class="block text-green-900 text-xs font-medium">Descripción</label>
                <div class="mt-1 p-2 rounded-md bg-green-50 text-gray-800" style="background-color: rgb(241, 255, 237);" >{{ $equipo->descripcion }}</div>
            </div>
        </div>

        <div class="mt-6 text-center">
            <a href="{{ route('registros-equipo.index') }}" class="text-white bg-green-600 hover:bg-green-700 px-4 py-2 rounded-md transition duration-200">
                Volver a la lista
            </a>
        </div>
    </div>
</div>
@endsection

