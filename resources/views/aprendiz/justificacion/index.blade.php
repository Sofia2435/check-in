@extends('aprendiz.dashboard')

@section('contents')
    <style>
        @import url('https://fonts.cdnfonts.com/css/caviar-dreams');

        * {
            font-family: 'Caviar Dreams', sans-serif;
        }
    </style>
<div class="max-w-5xl mx-auto mt-8">
    <h2 class="text-2xl font-bold text-center mb-6">Mis Justificaciones</h2>

    <a href="{{ route('aprendiz.justificacion.create') }}" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 mb-4 inline-block">Crear Justificación</a>

    <table class="w-full table-auto text-left border">
        <thead>
            <tr class="bg-green-100">
                <th class="p-2">Motivo</th>
                <th class="p-2">Documento</th>
                <th class="p-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($justificacion as $justificacion)
                <tr class="border-b">
                    <td class="p-2">{{ $justificacion->motivo }}</td>
                    <td class="p-2">
                        @if ($justificacion->documento)
                            <a href="{{ asset('documentos/' . $justificacion->documento) }}" target="_blank" class="text-blue-600 underline">Ver</a>
                        @else
                            No adjunto
                        @endif
                    </td>
                    <td class="p-2 flex gap-2">
                        <a href="{{ route('aprendiz.justificacion.show', $justificacion->id) }}" class="text-blue-600 hover:underline">Ver</a>
                        <a href="{{ route('aprendiz.justificacion.edit', $justificacion->id) }}" class="text-yellow-600 hover:underline">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
