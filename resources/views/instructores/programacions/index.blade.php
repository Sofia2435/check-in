@extends('instructores.dashboard')

@section('contents')
<div class="max-w-6xl mx-auto bg-white shadow-md rounded-lg p-6 mt-6" style="font-family: 'Caviar Dreams'; background-color:rgb(232, 255, 238)">
    <h2 class="text-2xl font-bold mb-6 text-center text-green-800">Programación 2025</h2>

    <!-- Filtros -->
    <form method="GET" action="{{ route('programacions.index') }}" class="mb-6 grid grid-cols-1 md:grid-cols-4 gap-4">
        <input 
            type="text" 
            name="nombre_asignatura" 
            placeholder="Nombre de Asignatura"
            value="{{ request('nombre_asignatura') }}"
            class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-green-400"
            style="background-color: rgb(241, 255, 237);"
        >
        
        <input 
            type="text" 
            name="ficha" 
            placeholder="Ficha"
            value="{{ request('ficha') }}"
            class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-green-400"
            style="background-color: rgb(241, 255, 237);"
        >

        <input 
            type="text" 
            name="ambiente" 
            placeholder="Ambiente"
            value="{{ request('ambiente') }}"
            class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-green-400"
            style="background-color: rgb(241, 255, 237);"
        >

        <div class="flex items-center gap-2">
            <button type="submit" class=" text-green-700 px-4 py-2 rounded hover:bg-green-600" style="background-color: rgb(195, 255, 179)">
                Filtrar
            </button>
            <a href="{{ route('programacions.index') }}" class="bg-gray-300 text-black px-4 py-2 rounded hover:bg-gray-400">
                Limpiar
            </a>
        </div>
    </form>

    <!-- Tabla -->
    <table class="w-full table-auto text-left border text-sm">
        <thead>
            <tr class="bg-green-100 text-green-900">
                <th class="p-2">Asignatura</th>
                <th class="p-2">Descripción</th>
                <th class="p-2">Ficha</th>
                <th class="p-2">Inicio</th>
                <th class="p-2">Fin</th>
                <th class="p-2">Hora Inicio</th>
                <th class="p-2">Hora Fin</th>
                <th class="p-2">Ambiente</th>
                <th class="p-2">Ver</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($programacion as $p)
                <tr class="border-b">
                    <td class="p-2">{{ $p->nombre_asignatura }}</td>
                    <td class="p-2">{{ $p->descripcion }}</td>
                    <td class="p-2">{{ $p->ficha }}</td>
                    <td class="p-2">{{ $p->fecha_inicio }}</td>
                    <td class="p-2">{{ $p->fecha_fin }}</td>
                    <td class="p-2">{{ $p->hora_inicio }}</td>
                    <td class="p-2">{{ $p->hora_fin }}</td>
                    <td class="p-2">{{ $p->ambiente }}</td>
                    
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center py-4">No hay registros que coincidan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

