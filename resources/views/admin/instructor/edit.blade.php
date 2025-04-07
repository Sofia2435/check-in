@extends('admin.dashboard')

@section('contents')
<div class="max-w-md mx-auto bg-white shadow-md rounded-lg p-6 mt-6" style="background-color:rgb(232, 255, 225); font-family: Caviar Dreams;">
    <h2 class="text-2xl font-bold mb-6 text-center">Actualizar Instructor</h2>

    <form action="{{ route('instructor.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 shadow-sm focus:outline-none focus:ring focus:border-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 shadow-sm focus:outline-none focus:ring focus:border-blue-500" required>
        </div>

        <div class="mb-6">
            <label for="password" class="block text-sm font-medium text-gray-700">Contraseña (opcional)</label>
            <input type="password" name="password" id="password" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 shadow-sm focus:outline-none focus:ring focus:border-blue-500">
        </div>

        <div class="text-center">
            <button type="submit" class="text-green-700 px-5 py-2 rounded-md hover:bg-blue-700 transition duration-200"  style="background-color:rgb(228, 255, 220);">
                Actualizar
            </button>
        </div>
    </form>
</div>
@endsection