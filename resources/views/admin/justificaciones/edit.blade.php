@extends('admin.dashboard')

@section('contents')
<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-lg" style="background-color:rgb(232, 255, 238); font-family:Caviar Dreams;" >
    <h2 class="text-2xl font-bold text-center mb-6">Editar Justificación</h2>

    <form action="{{ route('justificaciones.update', $justificacion->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-1 font-semibold" >Motivo:</label>
            <textarea name="motivo" class="w-full border border-gray-300 rounded-md p-2" style="background-color:rgb(232, 255, 238)" rows="4" required> {{ $justificacion->motivo }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Documento (opcional):</label>
            <input type="file" name="documento" class="w-full border border-gray-300 rounded-md p-2">
            @if ($justificacion->documento)
                <p class="mt-2 text-sm">Documento actual: 
                    <a href="{{ asset('documentos/' . $justificacion->documento) }}" target="_blank" class="text-blue-600 underline">Ver archivo</a>
                </p>
            @endif
        </div>

        <div class="flex justify-between">
            <a href="{{ route('justificaciones.index') }}" class="text-gray-600 hover:underline">← Volver</a>
            <button type="submit" class="text-green-700 px-4 py-2 rounded hover:bg-green-700" style="background-color:rgb(167, 255, 152)">Actualizar</button>
        </div>
    </form>
</div>
@endsection
