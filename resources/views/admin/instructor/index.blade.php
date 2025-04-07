@extends('admin.dashboard')

@section('contents')
    @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="max-w-5xl mx-auto bg-white shadow-md rounded-lg p-6 mt-6" style="background-color:rgb(232, 255, 238)">
        <h1 class="text-2xl font-bold mb-6 text-center" style="font-family:Caviar Dreams; font-size: 30px;">Instructores</h1>
            <a href="{{ route('instructor.create') }}" class="text-green-700  hover:bg-blue-800 px-4 py-2 rounded-md" style="background-color:rgb(199, 255, 183); font-family: Caviar Dreams;">
                Agregar un instructor nuevo
            </a>
        <hr class="my-4 border-gray-300"/>

    <div class="overflow-x-auto">
    <table class="w-full table-auto text-left border">
        <thead>
            <tr style="background-color:rgb(199, 255, 183); font-family: Caviar Dreams;">
                <th class="px-4 py-2 border"> #</th>
                <th class="px-4 py-2 border">Nombre</th>
                <th class="px-4 py-2 border">Correo</th>
                <th class="px-4 py-2 border">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="px-4 py-2 border">{{ $user->id }}</td>  
                    <td class="px-4 py-2 border">{{ $user->name }}</td>  
                    <td class="px-4 py-2 border">{{ $user->email }}</td>  
                    <td class="px-4 py-2 border">
                        <a href="{{ route('instructor.edit', $user->id) }}" class="text-blue-600">Editar</a> |
                        <form action="{{ route('instructor.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    </div>
@endsection