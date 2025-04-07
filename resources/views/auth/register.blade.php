<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Registrarse</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>
    <style>
        body {
            background: linear-gradient(to right, rgb(155, 254, 137),rgb(186, 251, 216));
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px; /* Added padding for better spacing */
        }
    </style>
</head>
 
<body>
    <section class="bg-transparent w-full flex items-center justify-center">
        <div class="flex flex-col items-center justify-center px-6 mx-auto w-full max-w-xl">
            <div class="flex items-center mb-6 text-4xl text-green-900" style="font-family: josephsophia; font-size: 60px;">
                Registrarse
            </div>

            
            <div class="w-full rounded-lg shadow-lg sm:max-w-sm xl:p-0 border border-green-200 p-6 mt-6 mb-6" style=" background-color:rgb(220, 255, 208); font-family: Caviar Dreams; font-size: 16px;">
                <div class="p-4 space-y-4">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-green-900 md:text-2xl" style="font-family: Caviar Dreams; font-size: 20px;">
                        Crear Cuenta
                    </h1>
                    
                    <form action="{{ route('register.save') }} " method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-green-900">Nombre</label>
                            <input type="text" name="name" id="name" class="border border-green-900 text-green-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2" placeholder="Nombre" required, style=" background-color:rgb(217, 255, 205);">
                            @error('name')
                            <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-green-900">Correo Electrónico</label>
                            <input type="email" name="email" id="email" class="bg-green-100 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2" placeholder="nombre@empresa.com" required style=" background-color:rgb(217, 255, 205);">
                            @error('email')
                            <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-green-900">Contraseña</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-green-100 border border-green-300 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2" required style=" background-color:rgb(217, 255, 205);">
                            @error('password')
                            <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-green-900">Confirmar contraseña</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" class="bg-green-100 border border-green-300 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2" required style=" background-color:rgb(217, 255, 205);">
                            @error('password_confirmation')
                            <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="terms" aria-describedby="terms" type="checkbox" class="w-4 h-4 border border-green-300 rounded bg-green-100 focus:ring-3 focus:ring-green-300" required style=" background-color:rgb(217, 255, 205);">
                            </div>
                            <div class="ml-2 text-sm">
                                <label for="terms" class="font-light text-green-800">Acepto los <a class="font-medium text-green-600 hover:underline" href="#">Términos y Condiciones</a></label>
                            </div>
                        </div>
                        <button type="submit" class="flex w-full justify-center rounded-md  px-4 py-2 text-sm font-semibold leading-6 text-green-700 shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600" style=" background-color:rgb(190, 254, 170);">Crear una cuenta</button>
                        <p class="text-sm font-light text-green-800">
                            ¿Ya tienes una cuenta? <a href="{{ route('login') }} " class="font-medium text-green-600 hover:underline">Inicia sesión aquí</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>