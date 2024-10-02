<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <header class="w-full bg-cyan-950">
        <div class="flex items-center justify-between container p-5">
            <div class="flex items-end text-white gap-20">
                <div class="title-head flex items-center">
                    <p class="font-semibold text-3xl" >Panel de Administrador</p>
                </div>
                <nav class="flex  items-center">
                    <ul class="flex items-center gap-5 list-none text-lg">
                        <li class="flex items-center"><a href="">Inicio</a></li>
                        <li><a href="">Servicios</a></li>
                        <li><a href="">Usuarios</a></li>
                    </ul>
                </nav>
            </div>

            <div class="rounded py-2 px-5 bg-slate-300">
                <p class="text-black">Cerrar Sesion</p>
            </div>
        </div>

    </header>
    <main class="container p-5">
        @yield('content')
    </main>
</body>
</html>