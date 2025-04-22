@extends('aprendiz.dashboard')

@section('contents')
    <style>
        @import url('https://fonts.cdnfonts.com/css/caviar-dreams');

        * {
            font-family: 'Caviar Dreams', sans-serif;
        }
    </style>
@if (session('success'))
    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
        {{ session('success') }}
    </div>
@endif

<div class="max-w-5xl mx-auto bg-white shadow-md rounded-lg p-6 mt-6" style="background-color:rgb(232, 255, 238)">
    <h1 class="text-2xl font-bold mb-6 text-center" style="font-family: Caviar Dreams; font-size: 30px;">Mis Equipos</h1>
    
    <div class="mb-4 flex justify-start">
        <a href="{{ route('registro-equipo.create') }}" 
           class="text-green-700 hover:bg-blue-800 px-4 py-2 rounded-md" 
           style="background-color:rgb(157, 220, 137); font-family: Caviar Dreams;">
            Agregar Equipo
        </a>
    </div>

    <hr class="my-4 border-gray-300"/>

    <table class="w-full table-auto text-left border">
        <thead >
            <tr stryle="background-color:rgb(199, 255, 183); font-family: Caviar Dreams;">
                <th class="px-6 py-3">#</th>
                <th class="px-6 py-3">Tipo de Equipo</th>
                <th class="px-6 py-3">Nombre Equipo</th>
                <th class="px-6 py-3">Marca</th>
                <th class="px-6 py-3">Serial</th>
                <th class="px-6 py-3">Descripción</th>
                <th class="px-6 py-3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($equipos as $equipo)
                <tr class="bg-white border-b" style="background-color:rgb(217, 255, 226);">
                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4">{{ $equipo->tipo_equipo }}</td>
                    <td class="px-6 py-4">{{ $equipo->nombre_equipo }}</td>
                    <td class="px-6 py-4">{{ $equipo->marca }}</td>
                    <td class="px-6 py-4">{{ $equipo->serial }}</td>
                    <td class="px-6 py-4">{{ $equipo->descripcion }}</td>
                    <td class="px-6 py-4 flex gap-2">
                    <a href="{{ route('registro-equipo.show', $equipo->id) }}" class="text-blue-600 hover:underline">Ver</a>
                        <a href="{{ route('registro-equipo.edit', $equipo->id) }}" class="text-blue-600 hover:underline">Editar</a>
                        <form action="{{ route('registro-equipo.destroy', $equipo->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este equipo?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="px-6 py-4 text-center">No hay equipos registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
