@extends('admin.dashboard')

@section('contents')
<style>
    @import url('https://fonts.cdnfonts.com/css/caviar-dreams');

    * {
        font-family: 'Caviar Dreams', sans-serif;
    }
</style>
@if (session('success'))
    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
        {{ session('success') }}
    </div>
@endif


<div class="max-w-5xl mx-auto bg-white shadow-md rounded-lg p-6 mt-6" style="background-color:rgb(232, 255, 238)">
    <h1 class="text-2xl font-bold mb-6 text-center" style="font-size: 30px;">Aprendices</h1>
    <a href="{{ route('aprendices.create') }}" class="text-green-700 hover:bg-blue-800 px-4 py-2 rounded-md" style="background-color:rgb(199, 255, 183);">
        Agregar Aprendiz
    </a>
    <hr class="my-4 border-gray-300"/>

        <div class="overflow-x-auto">
            <table class="w-full table-auto text-left border" >
                <thead >
                    <tr style="background-color:rgb(199, 255, 183); font-family: Caviar Dreams;">
                        <th class="px-4 py-2 border">#</th>
                        <th class="px-4 py-2 border">Nombre</th>
                        <th class="px-4 py-2 border">Correo</th>
                        <th class="px-4 py-2 border">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="hover:bg-green-50" style="background-color: rgb(241, 255, 237);">
                            <td class="px-4 py-2 border" style="font-family: Caviar Dreams; font-size:15px;">{{ $user->id }}</td>  
                            <td class="px-4 py-2 border" style="font-family: Caviar Dreams; font-size:15px;">{{ $user->name }}</td>  
                            <td class="px-4 py-2 border" style="font-family: Caviar Dreams; font-size:15px;">{{ $user->email }}</td>  
                            <td class="px-4 py-2 border">
                                <a href="{{ route('aprendices.edit', $user->id) }}" class="text-blue-600 hover:underline" style="font-family: Caviar Dreams; font-size: 15px;" >Editar</a> |
                                <form action="{{ route('aprendices.destroy', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline" style="font-family: Caviar Dreams; font-size: 15px;">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
