<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel - @yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <header class="w-[300px] fixed h-screen bg-cyan-950">
        <div class="flex flex-col h-full items-start justify-between container mx-auto ml-4 p-5">
            <div class="flex flex-col items-start justify-between text-white gap-10">
                <div class="title-head flex items-center">
                    <p class="font-semibold text-3xl">Admin</p>
                </div>

                @auth
                @if(auth()->user()->role_id === 1)
                <nav class="flex items-center">
                    <ul class="flex flex-col items-start gap-5 list-none text-lg">
                        <li><i class="fa-solid fa-house mr-2"></i><a href="{{ route('admin-index') }}" class="hover:underline">Inicio</a></li>
                        <li><i class="fa-solid fa-user mr-2"></i><a href="{{ route('usuarios.index') }}" class="hover:underline">Usuarios</a></li>
                        <li><i class="fa-solid fa-server mr-2"></i><a href="{{ route('servicios.index') }}" class="hover:underline">Cursos</a></li>
                        <li><i class="fa-solid fa-newspaper mr-2"></i><a href="{{ route('novedades.index') }}" class="hover:underline">Novedades</a></li>
                    </ul>
                </nav>
                @endif
                @endauth
            </div>

            @auth
                <form action="{{ url('/cerrar-sesion') }}" method="post">
                    @csrf
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Cerrar sesión
                    </button>
                </form>
            @else
                <a href="{{ route('auth.login') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Login
                </a>
            @endauth
        </div>
    </header>

    <main class="container ml-[330px] mx-auto p-5">
        @if (session('feedback.messages'))
            <div class="flex w-full bg-green-500 text-white p-5">
                @foreach (session('feedback.messages') as $message)
                    <p>{{ $message }}</p>
                @endforeach
            </div>
        @endif

        @if (session('feedback.errors'))
            <div class="flex w-full bg-red-500 text-white p-5">
                @foreach (session('feedback.errors') as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
