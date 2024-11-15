@extends('layout.app')
@section('title', 'Iniciar sesión')

@section('content')

<div class="min-h-screen flex items-center justify-center bg-gray-100 absolute top-0 left-0 w-full h-full">
    <div class="flex flex-col md:flex-row bg-white rounded-lg shadow-lg w-full max-w-lg md:max-w-4xl lg:max-w-6xl">
        <!-- Columna izquierda: Formulario de login -->
        <div class="w-full md:w-1/2 p-6 sm:p-8 lg:p-12">
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-6 lg:mb-10 text-center md:text-left">Inicia sesión en tu cuenta</h2>

            <form action="{{ route('auth.authenticate') }}" method="post" class="space-y-4 lg:space-y-6">
                @csrf 
                <div>
                    <label for="email" class="block text-gray-700 text-lg font-semibold mb-2">Email</label>
                    <input type="email" name="email" id="email" placeholder="ejemplo@correo.com" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('email')
                    <span class="flex w-full bg-red-500 text-white p-2 sm:p-3 lg:p-5 rounded mt-2">{{ $message }}</span>
                    @enderror
                </div>  
                <div>
                    <label for="password" class="block text-gray-700 text-lg font-semibold mb-2">Contraseña</label>
                    <input type="password" name="password" id="password" placeholder="Tu contraseña" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('titulo')
                    <span class="flex w-full bg-red-500 text-white p-2 sm:p-3 lg:p-5 rounded mt-2">{{ $message }}</span>
                    @enderror
                </div>  
                <div class="flex justify-between items-center">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="form-checkbox text-blue-500">
                        <span class="ml-2 text-gray-700">Recordarme</span>
                    </label>
                </div>
                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded focus:outline-none focus:shadow-outline text-lg">Iniciar sesión</button>
            </form>

            <div class="mt-4 sm:mt-6 text-center">
                <p class="text-md sm:text-lg">¿No tienes una cuenta? <a href="{{ route('auth.register') }}" class="text-blue-500 hover:underline">Regístrate aquí</a></p>
            </div>
        </div>

        <!-- Columna derecha -->
        <div class="hidden md:flex md:w-1/2 bg-gradient-to-r from-blue-500 to-green-500 text-white p-8 sm:p-10 lg:p-12 rounded-b-lg md:rounded-r-lg md:rounded-bl-none">
            <div class="flex flex-col justify-center items-center text-center w-full">
                <h3 class="text-2xl sm:text-3xl font-semibold mb-8 sm:mb-12">Gestiona tus cursos</h3>
                <img src="{{ asset('img/login.png') }}" alt="Vector de Login" class="w-1/2 md:w-3/4 lg:w-full h-auto">
            </div>
        </div>
    </div>
</div>

@endsection
