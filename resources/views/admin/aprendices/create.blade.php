@extends('admin.dashboard')

@section('title', 'Registro de Aprendices')

@section('contents')
<style>
    @import url('https://fonts.cdnfonts.com/css/caviar-dreams');

    * {
        font-family: 'Caviar Dreams', sans-serif;
    }
</style>
    <div class="min-h-screen flex items-center justify-center bg-green-50" style="background-color:rgb(232, 255, 238)">
        <div class="w-full max-w-md p-6 rounded-xl shadow-lg border border-green-300" style="background-color:rgb(232, 255, 238)">
            <h1 class="mb-4 text-center text-green-700" style="font-family: josephsophia; font-size: 32px;">Agregar Aprendiz</h1>
            <hr class="mb-4 border-green-300"/>

            {{-- Mostrar errores de validación --}}
            @if ($errors->any())
                <div class="mb-4 text-red-700 font-semibold text-sm">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>- {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('aprendices.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-green-900" style="font-family: Caviar Dreams; font-size: 18px;">Nombre</label>
                    <input id="name" name="name" type="text"
                        class="mt-1 block w-full rounded-md border-green-300 shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-base py-2 px-3"
                        style="background-color:rgb(223, 250, 230); border-color:rgb(189, 255, 167);">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-green-900" style="font-family: Caviar Dreams; font-size: 18px;">Correo Electrónico</label>
                    <input id="email" name="email" type="email"
                        class="mt-1 block w-full rounded-md border-green-300 shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-base py-2 px-3"
                        style="background-color:rgb(223, 250, 230); border-color:rgb(189, 255, 167);">
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-green-900" style="font-family: Caviar Dreams; font-size: 18px;">Contraseña</label>
                    <input id="password" name="password" type="password"
                        class="mt-1 block w-full rounded-md border-green-300 shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-base py-2 px-3"
                        style="background-color:rgb(223, 250, 230); border-color:rgb(189, 255, 167);">
                </div>

                <button type="submit"
                    class="w-full rounded-md px-4 py-3 text-lg font-semibold text-green-800 shadow-sm hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2"
                    style="background-color:rgb(175, 255, 157); font-family:Caviar Dreams;">
                    Enviar
                </button>
            </form>
        </div>
    </div>
@endsection
