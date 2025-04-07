@extends('admin.dashboard')

@section('contents')
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                {{ session('success') }}
            </div>
        @endif
    
        <div class="max-w-5xl mx-auto bg-white shadow-md rounded-lg p-6 mt-6" style="background-color: rgb(232, 255, 238);">
            <h1 class="text-2xl font-bold mb-6 text-center" style="font-family:Caviar Dreams; font-size: 30px;">Carnets Digitales</h1>

        <hr class="my-4 border-gray-300"/>

        <div class="overflow-x-auto">
            <table class="w-full table-auto text-left border">
                <thead>
                    <tr style="background-color:rgb(199, 255, 183); font-family: Caviar Dreams;">
                        <th class="px-4 py-2 border">Nombre</th>
                        <th class="px-4 py-2 border">Tipo</th>
                        <th class="px-4 py-2 border">Ficha</th>
                        <th class="px-4 py-2 border">Programa</th>
                        <th class="px-4 py-2 border">Jornada</th>
                        <th class="px-4 py-2 border">Imagen</th>
                        <th class="px-4 py-2 border">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($carnets as $carnet)
                        <tr class=" hover:bg-green-50" style="background-color: rgb(241, 255, 237);">
                            <td class="px-4 py-2 border" style="font-family: Caviar Dreams;">{{ $carnet->nombre_completo }}</td>
                            <td class="px-4 py-2 border" style="font-family: Caviar Dreams;">{{ $carnet->tipo_usuario }}</td>
                            <td class="px-4 py-2 border" style="font-family: Caviar Dreams;">{{ $carnet->ficha ?? '-' }}</td>
                            <td class="px-4 py-2 border" style="font-family: Caviar Dreams;">{{ $carnet->programa }}</td>
                            <td class="px-4 py-2 border" style="font-family: Caviar Dreams;">{{ $carnet->jornada }}</td>
                            <td class="px-4 py-2 border text-center">
                                @if($carnet->foto)
                                    <img src="{{ asset('storage/' . $carnet->foto) }}" width="60" class="rounded-md mx-auto">
                                @else
                                    <span class="text-gray-500 italic" style="font-family: Caviar Dreams;">Sin imagen</span>
                                @endif
                            </td>
                            <td class="px-4 py-2 border text-center">
                                <a href="{{ route('carnets_digital.edit', $carnet->id) }}" class="text-blue-600 hover:underline" style="font-family: Caviar Dreams;">Adjuntar Imagen</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
