@extends('admin.dashboard')

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
        <div class="max-w-5xl mx-auto bg-white shadow-md rounded-lg p-6 mt-6" style="background-color: rgb(232, 255, 238);">
            <h1 class="text-2xl font-bold mb-6 text-center" style="font-family:Caviar Dreams; font-size: 30px;">Lista de Justificaciones</h1>

        <hr class="my-4 border-gray-300"/>

        <div class="overflow-x-auto">

    <table class="w-full table-auto text-left border">
        <thead>
            <tr  style="background-color:rgb(199, 255, 183); font-family: Caviar Dreams;">
                <th class="p-2">Usuario</th>
                <th class="p-2">Rol</th>
                <th class="p-2">Motivo</th>
                <th class="p-2">Documento</th>
                <th class="p-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($justificaciones as $justificacion)
                <tr class="border-b">
                    <td class="p-2">{{ $justificacion->user->name }}</td>
                    <td class="p-2">{{ $justificacion->user->role }}</td>
                    <td class="p-2">{{ $justificacion->motivo }}</td>
                    <td class="p-2">
                        @if ($justificacion->documento)
                            <a href="{{ asset('documentos/' . $justificacion->documento) }}" target="_blank" class="text-blue-600 underline">Ver documento</a>
                        @else
                            No adjunto
                        @endif
                    </td>
                    <td class="p-2 flex gap-2">
                        <a href="{{ route('justificaciones.edit', $justificacion->id) }}" class="text-yellow-600 hover:underline">Editar</a>
                        <form action="{{ route('justificaciones.destroy', $justificacion->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('¿Estás seguro de eliminar esta justificación?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</>
@endsection
