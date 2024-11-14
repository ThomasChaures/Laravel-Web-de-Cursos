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

        <!-- Icono de carrito y Botones de Login o Logout / Register -->
        <div class="flex items-center gap-4">
            <!-- Icono del carrito con modal -->
            <div class="relative group">
                <a href="{{ route('carrito') }}" class="text-black hover:text-blue-800 relative right-4">
                    <i class="fas fa-shopping-cart text-2xl"></i>
                    <!-- Indicador de cantidad de productos en el carrito (badge) -->
                    @if($cartCount > 0)
                        <span class="absolute -top-2 -right-2 bg-green-500 text-white text-xs rounded-full px-2">{{ $cartCount }}</span>
                    @endif
                </a>

                <!-- Modal desplegable del carrito -->
                <div class="absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-lg p-4 opacity-0 transform scale-95 transition-all duration-300 ease-in-out group-hover:opacity-100 group-hover:scale-100 z-10">
                    <h3 class="text-lg font-semibold mb-2">Carrito</h3>

                    @if($cartCount > 0)
                        <div class="max-h-60 overflow-y-auto">
                            @foreach($carrito->servicios as $curso)
                                <div class="flex items-center mb-4">
                                    <!-- Imagen del curso -->
                                    <img src="{{ asset('uploads/' . $curso->img) }}" alt="{{ $curso->nombre }}" class="w-12 h-12 rounded-lg mr-3">
                                    <!-- Detalles del curso -->
                                    <div class="flex-1">
                                        <p class="font-semibold">{{ $curso->nombre }}</p>
                                        <p class="text-sm text-gray-600">Precio: ${{ number_format($curso->precio, 2) }}</p>
                                    </div>
                                    <!-- Botón de eliminar -->
                                    <form action="{{ route('carrito.eliminar', $curso->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-600">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                        <a href="{{ route('carrito') }}" class="block mt-4 text-center bg-green-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-green-600">
                            Ir al carrito
                        </a>
                    @else
                        <p class="text-gray-600 text-center">Tu carrito está vacío.</p>
                    @endif
                </div>
            </div>

            <!-- Botones de Login o Logout / Register -->
            @auth
                <!-- Menú desplegable de perfil de usuario -->
                <div class="relative">
                    <button onclick="toggleDropdown()" class="flex items-center space-x-2 focus:outline-none">
                        <span class="text-black font-semibold">{{ auth()->user()->email }}</span>
                        <i class="fas fa-chevron-down text-gray-600"></i>
                    </button>
                    
                    <!-- Dropdown menú -->
                    <div id="dropdown" class="absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-lg hidden">
                        @if(auth()->user()->role_id === 1)
                            <a href="{{ route('admin-index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Ir al panel</a>
                        @endif
                        <form action="{{ url('/cerrar-sesion') }}" method="post" class="block">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Cerrar sesión</button>
                        </form>
                    </div>
                </div>
            @else
                <!-- Botones de Login y Register -->
                <a href="{{ route('auth.login') }}" class="{{ Route::is('auth.login') ? 'border-2 border-blue-600 bg-blue-600 text-white' : 'border-2 border-blue-600 text-blue-600' }} px-4 py-2 rounded-full hover:border-green-500 hover:text-green-500">
                    Iniciar Sesión
                </a>
                <a href="{{ route('auth.register') }}" 
   class="ml-2 px-4 py-2 rounded-full text-white bg-gradient-to-r border-2 border-blue-600 from-blue-600 to-green-500 hover:from-green-500 hover:to-blue-600 transition duration-500 ease-in-out">
   Registrarse
</a>
            @endauth
        </div>
    </div>
</nav>

<script>
    function toggleDropdown() {
        const dropdown = document.getElementById('dropdown');
        dropdown.classList.toggle('hidden');
    }

    // Cerrar el dropdown si se hace clic fuera
    window.onclick = function(event) {
        if (!event.target.matches('.flex.items-center')) {
            const dropdowns = document.getElementsByClassName("hidden");
            for (let i = 0; i < dropdowns.length; i++) {
                const openDropdown = dropdowns[i];
                if (!openDropdown.classList.contains('hidden')) {
                    openDropdown.classList.add('hidden');
                }
            }
        }
    }
</script>