@extends('admin.dashboard')

@section('contents')
<div class="max-w-5xl mx-auto bg-white shadow-md rounded-lg p-6 mt-6" style="background-color:rgb(232, 255, 238)">
    <h2 class="text-2xl font-bold mb-6 text-center" style="font-family: Caviar Dreams;">Programacion 2025</h2>

    <a href="{{ route('programaciones.create') }}" class="bg-green-600 text-green-700 px-4 py-2 rounded-md hover:bg-green-700 mb-4 inline-block" style="background-color:rgb(187, 253, 168); font-family:Caviar Dreams;">Crear Nueva Programación</a>

    <table class="w-full table-auto text-left border">
        <thead>
            <tr style="background-color:rgb(199, 255, 183); font-family: Caviar Dreams;">
                <th class="p-2">Nombre de Asignatura</th>
                <th class="p-2">Descripcion</th>
                <th class="p-2">Ficha</th>
                <th class="p-2">Fecha de Inicio</th>
                <th class="p-2">Fecha Fin</th>
                <th class="p-2">Hora de Inicio</th>
                <th class="p-2">Hora Final</th>
                <th class="p-2">Ambiente</th>
                <th class="p-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($programaciones as $programacion)
                <tr class="border-b"  style="background-color:rgb(241, 255, 237); font-family: Caviar Dreams;">
                    <td class="p-2">{{$programacion->nombre_asignatura }}</td>
                    <td class="p-2">{{ $programacion->descripcion }}</td>
                    <td class="p-2">{{ $programacion->ficha }}</td>
                    <td class="p-2">{{ $programacion->fecha_inicio }}</td>
                    <td class="p-2">{{ $programacion->fecha_fin }}</td>
                    <td class="p-2">{{ $programacion->hora_inicio }}</td>
                    <td class="p-2">{{ $programacion->hora_fin }}</td>
                    <td class="p-2">{{ $programacion->ambiente }}</td>
                    <td class="p-2 flex gap-2">
                        <a href="{{ route('programaciones.show', $programacion->id) }}" class="text-blue-600 hover:underline">Ver</a>
                        <a href="{{ route('programaciones.edit', $programacion->id) }}" class="text-yellow-600 hover:underline">Editar</a>
                        <form action="{{ route('programaciones.destroy', $programacion->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
