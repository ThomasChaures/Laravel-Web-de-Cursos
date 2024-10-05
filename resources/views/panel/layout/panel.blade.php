<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <header class="w-full bg-cyan-950">
        <div class="flex items-center justify-between container mx-auto p-5">
            <div class="flex items-end text-white gap-20">
                <div class="title-head flex items-center">
                    <p class="font-semibold text-3xl" >Panel de Administrador</p>
                </div>
                <nav class="flex  items-center">
                    <ul class="flex items-center gap-5 list-none text-lg">
                        <li><a href="{{route('admin-index')}}">Inicio</a></li> 
                        <li><a href="{{route('usuarios.index')}}">Usuarios</a></li>
                        <li><a href="{{route('servicios.index')}}">Cursos</a></li>
                        <li><a href="{{route('novedades.index')}}">Novedades</a></li>
                    </ul>
                </nav>
            </div>

            @auth
                <!-- Si el usuario está autenticado, muestra el botón de cerrar sesión -->
                <form action="{{ url('/cerrar-sesion') }}" method="post">
                    @csrf
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Cerrar sesión
                    </button>
                </form>
            @else
                <!-- Si el usuario no está autenticado, muestra los botones de Login y Register -->
                <a href="{{ route('auth.login') }}" class="border-2 border-blue-600 text-blue-600 px-4 py-2 rounded-full hover:border-green-500 hover:text-green-500">
                    Login
                </a>
            @endauth
        </div>

    </header>
    <main class="container mx-auto p-5">
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