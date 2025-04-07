@extends('admin.dashboard')

@section('contents')
    <h1 class="ml-3" style="font-family: Brittany Signature; font-size: 30px;">Detalles del Aprendiz</h1>

    <div class="mt-4">
        <div class="mb-4">
            <strong>Nombre:</strong> {{ $user->name }}
        </div>
        <div class="mb-4">
            <strong>Correo:</strong> {{ $user->email }}
        </div>
    </div>

    <a href="{{ route('instructor.index') }}" class="text-blue-600 hover:underline">Volver a la lista de aprendices</a>
@endsection
