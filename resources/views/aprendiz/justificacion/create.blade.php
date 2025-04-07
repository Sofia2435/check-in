@extends('aprendiz.dashboard')

@section('contents')
    <style>
        @import url('https://fonts.cdnfonts.com/css/caviar-dreams');

        * {
            font-family: 'Caviar Dreams', sans-serif;
        }
    </style>
<div class="max-w-3xl mx-auto bg-white shadow-md p-6 mt-8 rounded-lg" style="background-color:rgb(232, 255, 238)">
    <h2 class="text-2xl font-bold mb-4 text-center">Nueva Justificación</h2>

    <form action="{{ route('aprendiz.justificacion.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block font-semibold" >Motivo:</label>
            <textarea name="motivo" class="w-full border rounded p-2" style="background-color:rgb(217, 255, 226)" required >{{ old('motivo') }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Documento (opcional):</label>
            <input type="file" name="documento" class="w-full border p-2" style="background-color:rgb(217, 255, 226)" >
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Guardar</button>
    </form>
</div>
@endsection
