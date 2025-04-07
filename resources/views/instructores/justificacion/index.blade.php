@extends('instructores.dashboard')

@section('contents')
<style>
    @import url('https://fonts.cdnfonts.com/css/caviar-dreams');

    * {
        font-family: 'Caviar Dreams', sans-serif;
    }
</style>

<div class="max-w-5xl mx-auto mt-8">
    <h2 class="text-2xl font-bold text-center mb-6">Justificaciones</h2>

    <!-- Formulario de Filtro -->
    <form method="GET" action="{{ route('instructores.justificacion.index') }}" class="mb-6">
    <div class="flex flex-wrap items-center gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Filtrar por Motivo:</label>
            <select name="motivo" class="border rounded px-3 py-1">
                <option value="">Todos</option>
                @foreach ($motivos as $motivo)
                    <option value="{{ $motivo }}" {{ request('motivo') == $motivo ? 'selected' : '' }}>
                        {{ $motivo }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <button type="submit" class="bg-green-500 text-white px-4 py-1 rounded hover:bg-green-600">Filtrar</button>
            <a href="{{ route('instructores.justificacion.index') }}" class="ml-2 text-gray-600 underline">Limpiar</a>
        </div>
    </div>
</form>


    <!-- Tabla de Justificaciones -->
    <table class="w-full table-auto text-left border">
        <thead>
            <tr class="bg-green-100">
                <th class="p-2">Nombre</th>
                <th class="p-2">Motivo</th>
                <th class="p-2">Documento</th>
                <th class="p-2">Fecha de Envío</th>
                <th class="p-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($justificacion as $justificacion)
                <tr class="border-b">
                    <td class="p-2">{{ $justificacion->user->name ?? 'N/A' }}</td>
                    <td class="p-2">{{ $justificacion->motivo }}</td>
                    <td class="p-2">
                        @if ($justificacion->documento)
                            <a href="{{ asset('documentos/' . $justificacion->documento) }}" target="_blank" class="text-blue-600 underline">Ver</a>
                        @else
                            No adjunto
                        @endif
                    </td>
                    <td class="p-2">{{ $justificacion->created_at->format('d/m/Y') }}</td>
                    <td class="p-2 flex gap-2">
                        <a href="{{ route('instructores.justificacion.show', $justificacion->id) }}" class="text-blue-600 hover:underline">Ver</a>
                        <a href="{{ route('instructores.justificacion.edit', $justificacion->id) }}" class="text-yellow-600 hover:underline">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
