<nav id="navbar"
    class="bg-gradient-to-r from-blue-100 to-green-100 py-4 fixed top-0 w-full z-50 transition-transform duration-300">
    <div class="container mx-auto flex justify-between items-center px-4">
        <!-- Logo -->
        <a class="font-bold text-2xl mr-4" href="{{ route('home') }}">
            <span class="text-black">Felatho</span><br>
            <span class="font-extrabold text-black">Course.</span>
        </a>

        <!-- Menú de Navegación (oculto en móviles) -->
        <div class="hidden md:flex space-x-8">
            <a href="{{ route('home') }}"
                class="{{ Route::is('home') ? 'text-blue-600 font-semibold' : 'text-black' }} text-lg font-semibold hover:text-blue-800">Inicio</a>
            <a href="{{ route('cursos') }}"
                class="{{ Route::is('cursos') ? 'text-blue-600 font-semibold' : 'text-black' }} text-lg font-semibold hover:text-blue-800">Cursos</a>
            <a href="{{ route('novedades') }}"
                class="{{ Route::is('novedades') ? 'text-blue-600 font-semibold' : 'text-black' }} text-lg font-semibold hover:text-blue-800">Novedades</a>
        </div>

        <!-- Icono de carrito o acceso al panel de administrador -->
        <div class="flex items-center gap-4">
            @auth
                @if(auth()->user()->role_id === 1)
                    <a href="{{ route('admin-index') }}" class="text-black hover:text-blue-800">
                        <i class="fas fa-user-shield text-2xl"></i>
                        <span class="ml-2">Ir al Panel</span>
                    </a>
                @else
                <div class="relative group flex gap-x-5">
                    <a href="{{ route('carrito') }}" id="cart-icon" class="text-black hover:text-blue-800 relative right-4">
                        <i class="fas fa-shopping-cart text-2xl"></i>
                        @if($cartCount > 0)
                            <span
                                class="absolute -top-2 -right-2 bg-green-500 text-white text-xs rounded-full px-2">{{ $cartCount }}</span>
                        @endif
                    </a>
                    <a href="{{ route('perfil') }}" id="cart-icon" class="text-black hover:text-blue-800 relative right-4">
                        <i class="fas fa-user text-2xl"></i>
                    </a>
                </div>
                @endif
            @endauth

            <!-- Menú desplegable de usuario para Logout en escritorio -->
            <div class="hidden md:flex items-center gap-2">
                @auth
                    <div class="relative">
                        <form action="{{ url('/cerrar-sesion') }}" method="post" class="block">
                            @csrf
                            <button type="submit"
                                class="w-full text-center bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">Cerrar
                                sesión</button>
                        </form>
                    </div>
                @else
                    <a href="{{ route('auth.login') }}"
                        class="border-2 border-blue-600 text-blue-600 px-4 py-2 rounded-full hover:bg-blue-600 hover:text-white">Iniciar
                        Sesión</a>
                    <a href="{{ route('auth.register') }}"
                        class="ml-2 px-4 py-2 rounded-full text-white bg-gradient-to-r from-blue-600 to-green-500 hover:from-green-500 hover:to-blue-600 transition duration-500 ease-in-out">Registrarse</a>
                @endauth
            </div>

            <!-- Menú de Hamburguesa (visible solo en dispositivos móviles) -->
            <div class="md:hidden ml-4">
                <button id="menu-toggle" class="focus:outline-none">
                    <i class="fas fa-bars text-2xl text-black"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Menú desplegable para dispositivos móviles -->
    <div id="mobile-menu" class="hidden md:hidden transition-all duration-300 transform scale-y-0 origin-top">
        <div class="bg-white py-4 px-6 space-y-4">
            <a href="{{ route('home') }}"
                class="{{ Route::is('home') ? 'text-blue-600 font-semibold' : 'text-black' }} block text-lg font-semibold hover:text-blue-800">Inicio</a>
            <a href="{{ route('cursos') }}"
                class="{{ Route::is('cursos') ? 'text-blue-600 font-semibold' : 'text-black' }} block text-lg font-semibold hover:text-blue-800">Cursos</a>
            <a href="{{ route('novedades') }}"
                class="{{ Route::is('novedades') ? 'text-blue-600 font-semibold' : 'text-black' }} block text-lg font-semibold hover:text-blue-800">Novedades</a>

            @auth
                @if(auth()->user()->role_id === 1)
                    <a href="{{ route('admin-index') }}"
                        class="block text-center border-2 border-blue-600  text-blue-600 font-bold py-2 px-4 rounded-lg hover:bg-blue-600 hover:text-white mt-4">Ir
                        al Panel</a>
                @else
                    <a href="{{ route('carrito') }}"
                        class="block text-center bg-green-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-green-600 mt-4">Ir
                        al carrito</a>
                @endif
                <form action="{{ url('/cerrar-sesion') }}" method="post" class="block">
                    @csrf
                    <button type="submit"
                        class="w-full text-center bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-600">Cerrar
                        sesión</button>
                </form>
            @else
                <a href="{{ route('auth.login') }}"
                    class="block text-center border-2 border-blue-600 bg-blue-600 text-white py-2 rounded-lg hover:border-green-500 hover:text-green-500">Iniciar
                    Sesión</a>
                <a href="{{ route('auth.register') }}"
                    class="block text-center bg-gradient-to-r from-blue-600 to-green-500 text-white font-bold py-2 rounded-lg hover:bg-green-500 mt-4">Registrarse</a>
            @endauth
        </div>
    </div>
</nav>