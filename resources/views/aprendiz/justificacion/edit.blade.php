@extends('aprendiz.dashboard')

@section('contents')
<style>
    @import url('https://fonts.cdnfonts.com/css/caviar-dreams');

    * {
        font-family: 'Caviar Dreams', sans-serif;
    }
</style>
<div class="max-w-3xl mx-auto bg-white shadow-md p-6 mt-8 rounded-lg" style="background-color:rgb(232, 255, 238)">
    <h2 class="text-2xl font-bold mb-4 text-center">Editar Justificación</h2>

    <form action="{{ route('aprendiz.justificacion.update', $justificacion->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold">Motivo:</label>
            <textarea name="motivo" class="w-full border rounded p-2" style="background-color:rgb(222, 255, 229);" required>{{ $justificacion->motivo }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Documento (opcional):</label>
            <input type="file" name="documento" class="w-full border p-2" style="background-color:rgb(222, 255, 229);">
            @if ($justificacion->documento)
                <p class="mt-2">
                    Documento actual: <a href="{{ asset('documentos/' . $justificacion->documento) }}" target="_blank" class="text-blue-600 underline">Ver</a>
                </p>
            @endif
        </div>

        <button type="submit" class="text-green-700 px-4 py-2 rounded hover:bg-yellow-700" style="background-color:rgb(190, 255, 204);">Actualizar</button>
    </form>
</div>
@endsection
