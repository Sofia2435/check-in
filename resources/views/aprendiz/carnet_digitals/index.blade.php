@extends('aprendiz.dashboard')

@section('contents')
@if (session('success'))
    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
        {{ session('success') }}
    </div>
@endif

<div class="max-w-5xl mx-auto shadow-md rounded-lg p-6 mt-6" style="background-color: rgb(232, 255, 238);">
    <h1 class="text-2xl font-bold mb-3 text-center" style="font-family:Caviar Dreams; font-size: 30px;">
        Carnets Digitales
    </h1>

    <!-- Botón alineado a la izquierda debajo del título -->
    <div class="mb-4 text-left">
        <a href="{{ route('carnet_digitals.create') }}" class="text-green-700 hover:bg-blue-800 px-4 py-2 rounded-md" style="background-color:rgb(157, 220, 137); font-family: Caviar Dreams;">
            Agregar Datos
        </a>
    </div>

    <hr class="my-4 border-gray-300"/>

    <div class="overflow-x-auto">
        <table class="w-full table-auto text-left border">
            <thead>
                <tr style="background-color:rgb(199, 255, 183); font-family: Caviar Dreams;">
                    <th class="px-6 py-3">#</th>
                    <th class="px-6 py-3">Tipo de Usuario</th>
                    <th class="px-6 py-3">Nombre Completo</th>
                    <th class="px-6 py-3">Ficha</th>
                    <th class="px-6 py-3">Programa</th>
                    <th class="px-6 py-3">Jornada</th>
                    <th class="px-6 py-3">Foto</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($carnets as $carnet)
                    <tr class="bg-white border-b">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">{{ $carnet->tipo_usuario }}</td>
                        <td class="px-6 py-4">{{ $carnet->nombre_completo }}</td>
                        <td class="px-6 py-4">{{ $carnet->ficha }}</td>
                        <td class="px-6 py-4">{{ $carnet->programa }}</td>
                        <td class="px-6 py-4">{{ $carnet->jornada }}</td>
                        <td class="px-6 py-4">
                            @if ($carnet->foto)
                                <a href="{{ asset('storage/' . $carnet->foto) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $carnet->foto) }}" alt="Carnet" width="60" class="rounded shadow">
                                </a>
                            @else
                                <span class="text-gray-500 italic">Sin imagen</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-6 py-4 text-center">No hay carnets registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
