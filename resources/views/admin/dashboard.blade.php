<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
 
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body x-data="{ openMenu: false }" style="background-color:rgb(232, 255, 238)">

    <header class="px-4 py-2 shadow text-green-800" style="background-color:rgb(232, 255, 238)">
        <div class="flex justify-between items-center">
            <div class="flex items-center">
                <button @click="openMenu = !openMenu" class="p-4 focus:outline-none" type="button">
                    <svg class="fill-current w-6" viewBox="0 -21 384 384">
                        <path d="M362.668 0H21.332C9.578 0 0 9.578 0 21.332V64c0 11.754 9.578 21.332 21.332 21.332h341.336C374.422 85.332 384 75.754 384 64V21.332C384 9.578 374.422 0 362.668 0zM362.668 128H21.332C9.578 128 0 137.578 0 149.332V192c0 11.754 9.578 21.332 21.332 21.332h341.336c11.754 0 21.332-9.578 21.332-21.332v-42.668c0-11.754-9.578-21.332-21.332-21.332zM362.668 256H21.332C9.578 256 0 265.578 0 277.332V320c0 11.754 9.578 21.332 21.332 21.332h341.336c11.754 0 21.332-9.578 21.332-21.332v-42.668c0-11.754-9.578-21.332-21.332-21.332z"/>
                    </svg>
                </button>
            </div>

            <div class="flex items-center" x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center px-3 py-2 focus:outline-none hover:bg-green-400 rounded-md">
                    <img src="https://cdn-icons-gif.flaticon.com/8819/8819071.gif" alt="Profile" class="h-10 w-10 rounded-full">
                    <span class="ml-4 text-sm hidden md:inline-block" style="font-family: Caviar Dreams;">{{ Auth::check() ? Auth::user()->name : 'Invitado' }}</span>
                    <svg class="fill-current w-3 ml-4" viewBox="0 0 407.437 407.437">
                        <path d="M386.258 91.567l-182.54 181.945L21.179 91.567 0 112.815 203.718 315.87l203.719-203.055z"/>
                    </svg>
                </button>

                <div x-show="open" @click.away="open = false"
                    class="absolute right-0 mt-16 mr-4 rounded border border-gray-200 shadow text-sm text-left"
                    style="background-color:rgb(217, 255, 226);">
                    <ul>
                        <li class="px-4 py-3 border-b hover:bg-green-200" style="font-family: Caviar Dreams;"><a href="#">Mi Perfil</a></li>
                        <li class="px-4 py-3 hover:bg-green-200" style="font-family: Caviar Dreams;"><a href="{{ route('logout') }}">Cerrar Sesión</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <div class="flex">
        <!-- Sidebar -->
        <div x-show="openMenu" @click.away="openMenu = false"
            class="fixed inset-y-0 left-0 w-64 transform transition-transform duration-300 ease-in-out"
            :class="openMenu ? 'translate-x-0' : '-translate-x-full'" style="background-color:rgb(222, 255, 229);">
            <div class="sidebar text-center">
                <div class="p-1.5 mt-1 flex items-center">
                    <img src="{{ asset('images/logocheckin.png') }}" alt="Check-In" class="w-12 h-auto mx-auto">
                </div>
                <br>
                <a href="{{ route('aprendices.index') }}">
                    <div class="p-1.5 mt-3 flex items-center rounded-md px-4 hover:bg-green-300">
                        <i class="bi bi-people-fill"></i>
                        <span class="ml-4 font-bold" style="font-family: Caviar Dreams;">Aprendices</span>
                    </div>
                </a>
                <br>   
                <a href="{{ route('instructor.index') }}">
                    <div class="p-1.5 mt-3 flex items-center rounded-md px-4 hover:bg-green-300">
                        <i class="bi bi-person-badge-fill"></i>
                        <span class="ml-4 font-bold" style="font-family: Caviar Dreams;">Instructor</span>
                    </div>
                </a>
                <br>
                <a href="{{ route('carnet__digital.index') }}">
                    <div class="p-1.5 mt-3 flex items-center rounded-md px-4 hover:bg-green-300">
                        <i class="bi bi-card-image"></i>
                        <span class="ml-4 font-bold" style="font-family: Caviar Dreams;">Carnet Digital</span>
                    </div>
                </a>
                <br>
                <a href="{{ route('programaciones.index') }}">
                    <div class="p-1.5 mt-3 flex items-center rounded-md px-4 hover:bg-green-300">
                        <i class="bi bi-calendar2-week"></i>
                        <span class="ml-4 font-bold" style="font-family: Caviar Dreams;">Programación</span>
                    </div>
                </a>
                <br>
                <a href="{{ route('registros-equipo.index') }}">
                    <div class="p-1.5 mt-3 flex items-center rounded-md px-4 hover:bg-green-300">
                        <i class="bi bi-pc-display"></i>
                        <span class="ml-4 font-bold" style="font-family: Caviar Dreams;">Registro Equipos</span>
                    </div>
                </a>
                <br>
                <a href="{{ route('justificaciones.index') }}">
                    <div class="p-1.5 mt-3 flex items-center rounded-md px-4 hover:bg-green-300">
                        <i class="bi bi-chat-dots"></i>
                        <span class="ml-4 font-bold" style="font-family: Caviar Dreams;">Justificaciones</span>
                    </div>
                </a>
            </div>
        </div>

        <!-- Contenido Principal -->
        <div class="flex-1 p-6">
            <!-- Tarjetas en Dashboard -->
            @if(Request::is('admin/dashboard'))
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="shadow-lg rounded-lg p-6 text-center" style="background-color:rgb(193, 255, 181)">
                    <h2 class="text-gray-600 text-lg font-semibold" style="font-family: Caviar Dreams;">Aprendices Registrados</h2>
                    <p class="text-3xl font-bold text-purple-600 mt-2">{{ $totalAprendices }}</p>
                </div>

                <div class="shadow-lg rounded-lg p-6 text-center" style="background-color:rgb(193, 255, 181)">
                    <h2 class="text-gray-600 text-lg font-semibold" style="font-family: Caviar Dreams;">Instructores Activos</h2>
                    <p class="text-3xl font-bold text-blue-600 mt-2">{{ $totalInstructores }}</p>
                </div>

                <div class="shadow-lg rounded-lg p-6 text-center" style="background-color:rgb(193, 255, 181)">
                    <h2 class="text-gray-600 text-lg font-semibold" style="font-family: Caviar Dreams;">Registros de Equipos</h2>
                    <p class="text-3xl font-bold text-red-600 mt-2">{{ $totalRegistrosEquipos }}</p>
                </div>
            </div>
            @endif

            <!-- Sección de contenido dinámico -->
            <div>@yield('contents')</div>
        </div>
    </div>

</body>

</html>
