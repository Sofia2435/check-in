@extends('admin.dashboard')

@section('contents')
<div class="max-w-2xl mx-auto bg-white p-6 shadow-md rounded mt-6" style="font-family: 'Caviar Dreams'; background-color: rgb(229, 255, 222);">
    <h2 class="text-2xl font-bold mb-6 text-center text-green-800" style="font-family: 'Caviar Dreams';">Editar Programación</h2>

    <form method="POST" action="{{ route('programaciones.update', $programaciones->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-4" >
            <label for="nombre_asignatura" class="block mb-1">Asignatura</label>
            <input type="text" name="nombre_asignatura" value="{{ $programaciones->nombre_asignatura }}"  style="background-color: rgb(241, 255, 237);" class="w-full border border-gray-300 p-2 rounded" required />
        </div>

        <div class="mb-4">
            <label for="descripcion" class="block mb-1">Descripción</label>
            <textarea name="descripcion" class="w-full border border-gray-300 p-2 rounded"  style="background-color: rgb(241, 255, 237);"> {{ $programaciones->descripcion }} </textarea>
        </div>

        <div class="mb-4">
            <label for="ficha" class="block mb-1">Ficha</label>
            <input type="text" name="ficha" value="{{ $programaciones->ficha }}"  style="background-color: rgb(241, 255, 237);"class="w-full border border-gray-300 p-2 rounded" required />
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label for="fecha_inicio" class="block mb-1">Fecha Inicio</label>
                <input type="date" name="fecha_inicio" value="{{ $programaciones->fecha_inicio }}" style="background-color: rgb(241, 255, 237);"  class="w-full border border-gray-300 p-2 rounded" required />
            </div>
            <div>
                <label for="fecha_fin" class="block mb-1">Fecha Fin</label>
                <input type="date" name="fecha_fin" value="{{ $programaciones->fecha_fin }}"  style="background-color: rgb(241, 255, 237);" class="w-full border border-gray-300 p-2 rounded" required />
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label for="hora_inicio" class="block mb-1">Hora Inicio</label>
                <input type="time" name="hora_inicio" value="{{ $programaciones->hora_inicio }}"  style="background-color: rgb(241, 255, 237);" class="w-full border border-gray-300 p-2 rounded" required />
            </div>
            <div >
                <label for="hora_fin" class="block mb-1">Hora Fin</label>
                <input type="time" name="hora_fin" value="{{ $programaciones->hora_fin }}"  style="background-color: rgb(241, 255, 237);" class="w-full border border-gray-300 p-2 rounded" required >
            </div>
        </div>

        <div class="mb-6">
            <label for="ambiente" class="block mb-1">Ambiente</label>
            <input type="text" name="ambiente" value="{{ $programaciones->ambiente }}"  style="background-color: rgb(241, 255, 237);" class="w-full border border-gray-300 p-2 rounded" />
        </div>

        <button type="submit" class=" text-green-700 px-4 py-2 rounded hover:bg-green-700 w-full font-semibold"  style="background-color:rgb(200, 255, 183);">
            Actualizar
        </button>
    </form>
</div>
@endsection
