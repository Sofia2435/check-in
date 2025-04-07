@extends('aprendiz.dashboard')

@section('contents')
<div class="max-w-2xl mx-auto bg-white shadow-md p-6 mt-8 rounded-lg" style="font-family: 'Caviar Dreams', sans-serif;">
    <h2 class="text-2xl font-bold text-center mb-4">Detalle de la Justificación</h2>

    <p><strong>Motivo:</strong> {{ $justificacion->motivo }}</p>

    @if($justificacion->documento)
        <p class="mt-2">
            <strong>Documento:</strong>
            <a href="{{ asset('documentos/' . $justificacion->documento) }}" class="text-blue-600 underline" target="_blank">Ver archivo</a>
        </p>
    @endif

    <div class="mt-4">
        <a href="{{ route('aprendiz.justificacion.index') }}" class="text-green-600 hover:underline">← Volver</a>
    </div>
</div>
@endsection
