@extends('aprendiz.dashboard')

@section('title', 'Registro de Equipos')

@section('contents')
    <style>
        @import url('https://fonts.cdnfonts.com/css/caviar-dreams');

        * {
            font-family: 'Caviar Dreams', sans-serif;
        }
    </style>

     <div class="min-h-screen flex items-center justify-center bg-green-50"  style="background-color:rgb(232, 255, 238)">
        <div class="w-full max-w-2xl p-8 rounded-xl shadow-lg border border-green-300" style="background-color:rgb(223, 250, 230);">
            <h1 class="mb-6 text-center text-green-700" style=" font-size: 35px">Agregar Equipo</h1>
            <hr class="mb-6 border-green-300"/>

            <form action="{{ route('registro-equipo.store') }}" method="POST">

                @csrf

                <div>
                    <label class="block text-sm font-medium text-green-900">Tipo de Equipo</label>
                    <input id="tipo_equipo" name="tipo_equipo" type="text" 
                        class="mt-1 block w-full rounded-md border-green-300 shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-lg py-2 px-3" 
                        style="background-color:rgb(223, 250, 230); border-color:rgb(62, 113, 73);">
                </div>


                <div>
                    <label class="block text-sm font-medium text-green-900">Nombre Del Equipo</label>
                    <input id="nombre_equipo" name="nombre_equipo" type="text" 
                    class="mt-1 block w-full rounded-md border-green-300 shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-lg py-2 px-3"
                    style="background-color:rgb(223, 250, 230); border-color:rgb(62, 113, 73);">
                </div>

                <div>
                    <label class="block text-sm font-medium text-green-900">Marca</label>
                    <input id="marca" name="marca" type="text" 
                    class="mt-1 block w-full rounded-md border-green-300 shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-lg py-2 px-3"
                    style="background-color:rgb(223, 250, 230); border-color:rgb(62, 113, 73);">
                </div>

                <div>
                    <label class="block text-sm font-medium text-green-900">Serial del Equipo</label>
                    <input id="serial" name="serial" type="text" 
                    class="mt-1 block w-full rounded-md border-green-300 shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-lg py-2 px-3"
                    style="background-color:rgb(223, 250, 230); border-color:rgb(62, 113, 73);">
                </div>

                <div>
                    <label class="block text-sm font-medium text-green-900">Descripcion</label>
                    <input id="descripcion" name="descripcion" type="text" 
                    class="mt-1 block w-full rounded-md border-green-300 shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-lg py-2 px-3" 
                    style="background-color:rgb(223, 250, 230); border-color:rgb(62, 113, 73);">
                </div>

                <br>
                <button type="submit" class="w-full rounded-md px-4 py-3 text-lg font-semibold text-white shadow-sm hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2" style="background-color:rgb(62, 113, 73)">
                    Enviar
                </button>
            </form>
        </div>
    </div>
@endsection