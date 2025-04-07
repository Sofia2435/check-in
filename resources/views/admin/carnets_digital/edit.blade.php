@extends('admin.dashboard')

@section('contents')
<div class="flex justify-center items-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-xl border border-green-400" style="background-color:rgb(223, 250, 230); font-family: Caviar Dreams;">
        <h2 class="text-2xl font-semibold text-center text-green-900 mb-6" >Adjuntar Imagen del Carnet</h2>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('carnets_digital.update', $carnet->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-medium text-green-900">Nombre</label>
                <input type="text" value="{{ $carnet->nombre_completo }}" disabled 
                    class="mt-1 block w-full rounded-md border-green-300 shadow-sm py-2 px-3 bg-green-50 text-green-800">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-green-900">Tipo de Usuario</label>
                <input type="text" value="{{ $carnet->tipo_usuario }}" disabled 
                    class="mt-1 block w-full rounded-md border-green-300 shadow-sm py-2 px-3 bg-green-50 text-green-800">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-green-900">Adjuntar Imagen del Carnet</label>
                <input type="file" name="foto" 
                    class="mt-1 block w-full rounded-md border-green-300 shadow-sm py-2 px-3 bg-white text-green-800">
                @error('foto')
                    <small class="text-red-600">{{ $message }}</small>
                @enderror

                @if($carnet->foto)
                    <div class="mt-4">
                        <p class="text-sm text-green-900 mb-2">Imagen actual:</p>
                        <img src="{{ asset('storage/' . $carnet->foto) }}" alt="Carnet actual" class="rounded shadow-md w-48">
                    </div>
                @endif

            </div>

            <button type="submit" 
                class="w-full py-3 px-4  text-green-700 font-semibold rounded-md shadow-md hover:bg-green-800 transition duration-200" style="background-color: rgb(165, 255, 189);">
                Guardar Imagen
            </button>
        </form>
    </div>
</div>
@endsection
