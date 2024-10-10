<nav class="bg-gradient-to-r from-blue-100 to-green-100 py-4">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo -->
        <a class="font-bold text-2xl" href="{{ route('home') }}">
            <span class="text-black">Felatho</span><br>
            <span class="font-extrabold text-black">Course.</span>
        </a>

        <!-- Menú -->
        <div class="hidden md:flex space-x-8">
            <a href="{{ route('home')}}" class="{{ Route::is('home') ? 'text-blue-600 font-semibold' : 'text-black' }} text-lg font-semibold hover:text-blue-800">
                Inicio
            </a>
            <a href="{{ route('cursos')}}" class="{{ Route::is('cursos') ? 'text-blue-600 font-semibold' : 'text-black' }} text-lg font-semibold hover:text-blue-800">
                Cursos
            </a>
            <a href="{{ route('novedades')}}" class="{{ Route::is('novedades') ? 'text-blue-600 font-semibold' : 'text-black' }} text-lg font-semibold hover:text-blue-800">
                Novedades
            </a>
        </div>

        <!-- Botones de Login o Logout / Register -->
        <div class="flex gap-2">
            @auth
                @if(auth()->user()->role_id === 1)
                <a href="{{ route('admin-index') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Ir al panel
                </a>
                @endif
                <!-- Si el usuario está autenticado, muestra el botón de cerrar sesión -->
                <form action="{{ url('/cerrar-sesion') }}" method="post">
                    @csrf
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Cerrar sesión
                    </button>
                </form>
            @else
                <!-- Si el usuario no está autenticado, muestra los botones de Login y Register -->
                <a href="{{ route('auth.login') }}" class="{{ Route::is('auth.login') ? 'border-2 border-blue-600 bg-blue-600 text-white' : 'border-2 border-blue-600 text-blue-600' }} px-4 py-2 rounded-full hover:border-green-500 hover:text-green-500">
                    Login
                </a>
                <a href="{{ route('auth.register') }}" class="{{ Route::is('auth.register') ? 'border-2 border-blue-600 bg-blue-600 text-white' : 'border-2 border-blue-600 text-blue-600' }} ml-4 px-4 py-2 rounded-full hover:border-green-500 hover:text-green-500">
                    Registrarse
                </a>
            @endauth
        </div>
    </div>
</nav>