@extends('layout.app')
@section('title', 'Iniciar sesión')

@section('content')

<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="flex bg-white rounded-lg shadow-lg w-full max-w-6xl">
        <!-- Columna izquierda: Formulario de login -->
        <div class="w-full md:w-1/2 p-12">
            <h2 class="text-4xl font-bold text-gray-900 mb-10">Inicia sesión en tu cuenta</h2>

            <div class="flex justify-between mb-8">
                <a href="#" class="flex items-center justify-center w-1/2 px-6 py-3 bg-gray-100 hover:bg-gray-200 rounded-md text-lg">
                    <i class="fab fa-google mr-2 text-2xl"></i>
                    Google
                </a>
                <a href="#" class="flex items-center justify-center w-1/2 ml-4 px-6 py-3 bg-gray-100 hover:bg-gray-200 rounded-md text-lg">
                    <i class="fab fa-facebook mr-2 text-2xl"></i>
                    Facebook
                </a>
            </div>

            <form action="{{ route('auth.authenticate') }}" method="post" class="space-y-6">
                @csrf 
                <div>
                    <label for="email" class="block text-gray-700 text-lg font-semibold mb-2">Email</label>
                    <input type="email" name="email" id="email" placeholder="ejemplo@correo.com" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>  
                <div>
                    <label for="password" class="block text-gray-700 text-lg font-semibold mb-2">Contraseña</label>
                    <input type="password" name="password" id="password" placeholder="Tu contraseña" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>  
                <div class="flex justify-between items-center">
                    <label class="inline-flex items-center">
                        <input type="checkbox" class="form-checkbox text-blue-500">
                        <span class="ml-2 text-gray-700">Recordarme</span>
                    </label>
                    <a href="#" class="text-md text-blue-500 hover:underline">¿Olvidaste tu contraseña?</a>
                </div>
                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded focus:outline-none focus:shadow-outline text-lg">Iniciar sesión</button>
            </form>

            <div class="mt-6 text-center">
                <p class="text-lg">¿No tienes una cuenta? <a href="{{ route('auth.register') }}" class="text-blue-500 hover:underline">Regístrate aquí</a></p>
            </div>
        </div>

        <!-- Columna derecha -->
        <div class="hidden md:block w-1/2 bg-gradient-to-r from-blue-500 to-green-500 text-white p-12 rounded-r-lg">
            <h3 class="text-3xl font-semibold mb-12 text-center">Gestiona tus cursos</h3>
            <div class="flex justify-center">
                <img src="{{ asset('img/login.png') }}" alt="Vector de Login" class="mt-12 h-auto">
            </div>
        </div>
    </div>
</div>

@endsection
