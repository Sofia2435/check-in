@extends('instructores.dashboard')

@section('contents')
<!-- Importar fuente Caviar Dreams desde Google Fonts (alternativa visual similar) -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600&display=swap');

    body {
        font-family: 'Quicksand', sans-serif; /* Alternativa elegante si no tienes Caviar Dreams instalada */
    }

    .caviar {
        font-family: 'Caviar Dreams', sans-serif;
    }
</style>

<div class="flex justify-center items-center mt-10">
    <div class="max-w-3xl bg-white shadow-md rounded-lg p-8 text-center caviar">
        <h2 class="text-3xl font-bold mb-6">{{ $programacions->nombre_asignatura }}</h2>

        <div class="space-y-3 text-lg text-left">
            <p><strong>Descripción:</strong> {{ $programacions->descripcion }}</p>
            <p><strong>Ficha:</strong> {{ $programacions->ficha }}</p>
            <p><strong>Fecha de Inicio:</strong> {{ $programacions->fecha_inicio }}</p>
            <p><strong>Fecha Fin:</strong> {{ $programacions->fecha_fin }}</p>
            <p><strong>Hora de Inicio:</strong> {{ $programacions->hora_inicio }}</p>
            <p><strong>Hora Final:</strong> {{ $programacions->hora_fin }}</p>
            <p><strong>Ambiente:</strong> {{ $programacions->ambiente }}</p>
        </div>

        <div class="mt-6">
            <a href="{{ route('programacions.index') }}" class="text-green-600 hover:underline">← Volver a programación</a>
        </div>
    </div>
</div>
@endsection