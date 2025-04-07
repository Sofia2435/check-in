@extends('aprendiz.dashboard')

@section('contents')
<style>
        @import url('https://fonts.cdnfonts.com/css/caviar-dreams');

        * {
            font-family: 'Caviar Dreams', sans-serif;
        }
    </style>

    <div class="flex justify-center items-center min-h-screen" style="background-color:rgb(232, 255, 238)">
        <div class="border border-green-400 shadow-md rounded-xl p-6 w-full max-w-md">
            <h1 class="text-3xl text-center text-green-700 mb-6" style=" font-size: 35px;">Ver Equipo Registrado</h1>
            <hr class="mb-6 border-green-300" />

        <div class="space-y-4">
            <div class="text-center">
                <label class="block text-sm font-medium text-green-900">Tipo de Equipo</label>
                <div class="mt-1 p-3 rounded-md" style="background-color:rgb(223, 250, 230)">{{ $equipo->tipo_equipo }}</div>
            </div>

            <div class="text-center">
                <label class="block text-sm font-medium text-green-900">Nombre del Equipo</label>
                <div class="mt-1 p-3 rounded-md" style="background-color:rgb(223, 250, 230)">{{ $equipo->nombre_equipo }}</div>
            </div>

            <div class="text-center">
                <label class="block text-sm font-medium text-green-900">Marca</label>
                <div class="mt-1 p-3 rounded-md" style="background-color:rgb(223, 250, 230)">{{ $equipo->marca }}</div>
            </div>

            <div class="text-center">
                <label class="block text-sm font-medium text-green-900">Serial</label>
                <div class="mt-1 p-3 rounded-md" style="background-color:rgb(223, 250, 230)">{{ $equipo->serial }}</div>
            </div>

            <div class="text-center">
                <label class="block text-sm font-medium text-green-900">Descripción</label>
                <div class="mt-1 p-3 rounded-md" style="background-color:rgb(223, 250, 230)">{{ $equipo->descripcion }}</div>
            </div>
        </div>

        <div class="mt-6 text-center">
            <a href="{{ route('registro-equipo.index') }}" class="text-white bg-green-600 hover:bg-green-700 px-4 py-2 rounded-md" style="background-color:rgb(62, 113, 73)">
                Volver a la lista
            </a>
        </div>
    </div>
</div>
@endsection

