<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check-in | Centro de Formación</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, rgb(155, 254, 137),rgb(162, 237, 197));
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="flex flex-col items-center justify-center w-full max-w-md bg-white p-8 rounded-lg shadow-lg border border-green-200">
        <img src="{{ asset('images/logocheckin.png') }}" alt="Logo del Centro" class="w-32 h-32 mb-4">
        <h1 class="text-2xl text-green-900 mb-4" style="font-family: Brittany Signature; font-size: 40px;">Bienvenido a Check-in</h1>
        <p class="text-center text-green-700 mb-6">Accede al sistema para registrar tu ingreso de forma rápida y segura.</p>
        <a href="{{ route('login') }}" class="w-full text-center bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition">Iniciar Sesión</a>
        <a href="{{ route('register') }}" class="w-full text-center mt-2 bg-green-400 text-white py-2 rounded-lg hover:bg-green-500 transition">Registrarse</a>
    </div>
</body>
</html>
