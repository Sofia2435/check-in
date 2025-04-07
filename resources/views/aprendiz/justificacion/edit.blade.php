@extends('aprendiz.dashboard')

@section('contents')
<div class="max-w-3xl mx-auto bg-white shadow-md p-6 mt-8 rounded-lg">
    <h2 class="text-2xl font-bold mb-4 text-center">Editar Justificación</h2>

    <form action="{{ route('aprendiz.justificacion.update', $justificacion->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold">Motivo:</label>
            <textarea name="motivo" class="w-full border rounded p-2" required>{{ $justificacion->motivo }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Documento (opcional):</label>
            <input type="file" name="documento" class="w-full border p-2">
            @if ($justificacion->documento)
                <p class="mt-2">
                    Documento actual: <a href="{{ asset('documentos/' . $justificacion->documento) }}" target="_blank" class="text-blue-600 underline">Ver</a>
                </p>
            @endif
        </div>

        <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">Actualizar</button>
    </form>
</div>
@endsection
