@extends('layout.app')
@section('title', 'Registro')

@section('content')

<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="flex bg-white rounded-lg shadow-lg w-full max-w-6xl">
        <!-- Columna izquierda: Formulario de registro -->
        <div class="w-full md:w-1/2 p-12">
            <h2 class="text-4xl font-bold text-gray-900 mb-10">Crea una nueva cuenta</h2>

            @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded mb-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('auth.newAccount') }}" method="post" class="space-y-6">
                @csrf

                <div>
                    <label for="name" class="block text-gray-700 text-lg font-semibold mb-2">Nombre</label>
                    <input type="text" name="name" id="name" placeholder="Nombre completo" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    @error('name')
                    <span class="flex w-full bg-red-500 text-white p-5">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-gray-700 text-lg font-semibold mb-2">Email</label>
                    <input type="email" name="email" id="email" placeholder="ejemplo@correo.com" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    @error('email')
                    <span class="flex w-full bg-red-500 text-white p-5">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-gray-700 text-lg font-semibold mb-2">Contraseña</label>
                    <input type="password" name="password" id="password" placeholder="Mínimo 8 caracteres" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    @error('password')
                    <span class="flex w-full bg-red-500 text-white p-5">{{ $message }}</span>
                   @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-gray-700 text-lg font-semibold mb-2">Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repite la contraseña" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    @error('password_confirmation')
                    <span class="flex w-full bg-red-500 text-white p-5">{{ $message }}</span>
                     @enderror
                </div>

                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded focus:outline-none focus:shadow-outline text-lg">Registrar</button>
            </form>

            <div class="mt-6 text-center">
                <p class="text-lg">¿Ya tienes una cuenta? <a href="{{ route('auth.login') }}" class="text-blue-500 hover:underline">Inicia sesión aquí</a></p>
            </div>
        </div>

        <!-- Columna derecha: Información adicional con fondo gradiente -->
        <div class="hidden md:block w-1/2 bg-gradient-to-r from-blue-500 to-green-500 text-white text-center p-12 rounded-r-lg">
            <h3 class="text-3xl font-semibold mb-6">Únete a nuestra comunidad de aprendizaje</h3>
            <p class="text-white text-lg mb-10">Al registrarte, tendrás acceso a una plataforma llena de oportunidades de aprendizaje, con cursos, recursos y mucho más para mejorar tus habilidades.</p>
            <div class="flex justify-center">
            <img src="{{ asset('img/login.png') }}" alt="Vector de Login" class="mt-12 h-auto">
            </div>
        </div>
    </div>
</div>

@endsection
