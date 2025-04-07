@extends('admin.dashboard')

@section('contents')
    <div class="max-w-2xl mx-auto bg-white p-6 shadow-md rounded-2xl mt-10 text-center" style="background-color: rgb(229, 255, 222); font-family: Caviar Dreams;">
        <h2 class="text-3xl font-bold mb-6 text-green-800" style="font-family: Caviar Dreams;">Detalle de Programación</h2>

        <div class="mb-3 text-lg"><strong>Asignatura:</strong> {{ $programaciones->nombre_asignatura }}</div>
        <div class="mb-3 text-lg"><strong>Descripción:</strong> {{ $programaciones->descripcion }}</div>
        <div class="mb-3 text-lg"><strong>Ficha:</strong> {{ $programaciones->ficha }}</div>
        <div class="mb-3 text-lg"><strong>Fecha:</strong> {{ $programaciones->fecha_inicio }} a {{ $programaciones->fecha_fin }}</div>
        <div class="mb-3 text-lg"><strong>Horario:</strong> {{ $programaciones->hora_inicio }} - {{ $programaciones->hora_fin }}</div>
        <div class="mb-3 text-lg"><strong>Ambiente:</strong> {{ $programaciones->ambiente }}</div>

        <a href="{{ route('programaciones.index') }}" class="mt-6 inline-block  hover:bg-green-400 text-green-900 px-5 py-2 rounded-md transition-all duration-200" style="background-color: rgb(195, 255, 178);">
            Volver
        </a>
    </div>
@endsection

