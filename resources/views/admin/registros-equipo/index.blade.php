@extends('admin.dashboard')

@section('contents')
@if (session('success'))
    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
        {{ session('success') }}
    </div>
@endif

<div class="max-w-6xl mx-auto bg-white shadow-md rounded-lg p-6 mt-6" style="background-color:rgb(232, 255, 238)">
    <h1 class="text-2xl font-bold mb-6 text-center" style="font-family: Caviar Dreams; font-size: 30px;">Equipos</h1>
    <hr class="my-4 border-gray-300"/>

    {{-- FILTROS --}}
    <form action="{{ route('registros-equipo.index') }}" method="GET" class="mb-6 grid grid-cols-1 md:grid-cols-3 gap-6">
        {{-- Tipo de Equipo --}}
        <div>
            <label for="tipo_equipo" class="block text-sm font-medium text-gray-700" style="font-family: Caviar Dreams;">Filtrar por Tipo de Equipo</label>
            <select name="tipo_equipo" id="tipo_equipo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500 py-2 px-3" style="font-family: Caviar Dreams;">
                <option value="">Todos</option>
                @php
                    $tipos = $equipos->pluck('tipo_equipo')->unique();
                @endphp
                @foreach ($tipos as $tipo)
                    <option value="{{ $tipo }}" {{ request('tipo_equipo') == $tipo ? 'selected' : '' }}>
                        {{ $tipo }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Marca --}}
        <div>
            <label for="marca" class="block text-sm font-medium text-gray-700" style="font-family: Caviar Dreams;">Filtrar por Marca</label>
            <select name="marca" id="marca" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500 py-2 px-3" style="font-family: Caviar Dreams;">
                <option value="">Todas</option>
                @php
                    $marcas = $equipos->pluck('marca')->unique();
                @endphp
                @foreach ($marcas as $marca)
                    <option value="{{ $marca }}" {{ request('marca') == $marca ? 'selected' : '' }}>
                        {{ $marca }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Nombre del Equipo --}}
        <div>
            <label for="nombre_equipo" class="block text-sm font-medium text-gray-700" style="font-family: Caviar Dreams;">Filtrar por Nombre del Equipo</label>
            <select name="nombre_equipo" id="nombre_equipo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500 py-2 px-3" style="font-family: Caviar Dreams;">
                <option value="">Todos</option>
                @php
                    $nombres = $equipos->pluck('nombre_equipo')->unique();
                @endphp
                @foreach ($nombres as $nombre)
                    <option value="{{ $nombre }}" {{ request('nombre_equipo') == $nombre ? 'selected' : '' }}>
                        {{ $nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Botones --}}
        <div class="md:col-span-3 flex flex-col sm:flex-row gap-4 justify-center mt-4">
            <button type="submit" class="px-6 py-2 text-green-700 rounded-md hover:bg-green-700" style="background-color:rgb(186, 255, 167); font-family: Caviar Dreams;">Filtrar</button>
            <a href="{{ route('registros-equipo.index') }}" class="px-6 py-2 bg-gray-400 text-white rounded-md hover:bg-gray-500" style="font-family: Caviar Dreams;">Limpiar</a>
        </div>
    </form>

    {{-- TABLA --}}
    <div class="overflow-x-auto">
        <table class="w-full table-auto text-left border">
            <thead>
                <tr style="background-color:rgb(199, 255, 183); font-family: Caviar Dreams;">
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
                @foreach($equipos as $equipo)
                    <tr class="bg-white border-b hover:bg-gray-50" style="background-color:rgb(241, 255, 237); font-family: Caviar Dreams;">
                        <td class="px-6 py-3">{{ $equipo->user ? $equipo->user->id : 'N/A' }}</td> 
                        <td class="px-6 py-3">{{ $equipo->tipo_equipo }}</td>
                        <td class="px-6 py-3">{{ $equipo->nombre_equipo }}</td>
                        <td class="px-6 py-3">{{ $equipo->marca }}</td>
                        <td class="px-6 py-3">{{ $equipo->serial }}</td>
                        <td class="px-6 py-3">{{ $equipo->descripcion }}</td>
                        <td class="px-6 py-3 space-x-2">
                            <a href="{{ route('registros-equipo.show', $equipo->id) }}" class="text-green-600 hover:text-green-800">Ver</a>
                            <a href="{{ route('registros-equipo.edit', $equipo->id) }}" class="text-blue-600 hover:text-blue-800">Editar</a>
                            <form action="{{ route('registros-equipo.destroy', $equipo->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection


