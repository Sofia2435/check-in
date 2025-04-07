<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Iniciar Sesion</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>
    <style>
        body {
            background: linear-gradient(to right, rgb(155, 254, 137),rgb(162, 237, 197));
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
        }
    </style>
</head>

<body>
    <section class="bg-transparent w-full flex items-center justify-center">
        <div class="flex flex-col items-center justify-center px-8 mx-auto w-full max-w-xl">
            <div class="flex items-center mb-8 text-4xl text-green-900" style="font-family: josephsophia; font-size: 60px;">
                Iniciar Sesión
            </div>
            <div class="w-full rounded-lg shadow-lg sm:max-w-sm xl:p-0 border border-green-200 p-8 mt-8 mb-8" style="background-color:rgb(220, 255, 208); font-family: Caviar Dreams; font-size: 16px;">
                <div class="p-6 space-y-6">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-green-900 md:text-2xl" style="font-family: Caviar Dreams; font-size: 22px;">
                        Accede a tu cuenta
                    </h1>

                    <form class="space-y-6" method="post" action="{{ route('login.action') }}">
                        @csrf
                        @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Error!</strong>
                            <ul class="mt-2 space-y-1">
                                @foreach ($errors->all() as $error)
                                <li><span class="block sm:inline">{{ $error }}</span></li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="space-y-2">
                            <label for="email" class="block text-sm font-medium text-green-900">Correo Electrónico</label>
                            <input type="email" name="email" id="email" class="border border-green-900 text-green-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-3" placeholder="nombre@empresa.com" required style="background-color:rgb(217, 255, 205);">
                        </div>

                        <div class="space-y-2">
                            <label for="password" class="block text-sm font-medium text-green-900">Contraseña</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="border border-green-900 text-green-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-3" required style="background-color:rgb(217, 255, 205);">
                        </div>

                        <div class="flex justify-between items-center mt-4">
                            <div class="flex items-center gap-2">
                                <input id="remember" type="checkbox" class="w-4 h-4 border border-green-300 rounded bg-green-100 focus:ring-3 focus:ring-green-300" style="background-color:rgb(217, 255, 205);">
                                <label for="remember" class="text-sm text-green-900">Recuérdame</label>
                            </div>
                            <a href="#" class="text-sm text-green-700 hover:underline">¿Olvidaste tu contraseña?</a>
                        </div>

                        <button type="submit" class="w-full rounded-md px-4 py-3 text-sm font-semibold leading-6 text-green-700 shadow-md hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600 transition-all" style="background-color:rgb(190, 254, 170);">Iniciar sesión</button>

                        <p class="text-sm font-light text-green-800 text-center">
                            ¿No tienes una cuenta? <a href="{{ route('register') }}" class="font-medium text-green-700 hover:underline">Regístrate aquí</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
