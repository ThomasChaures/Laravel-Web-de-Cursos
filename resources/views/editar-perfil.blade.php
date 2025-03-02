@extends('layout.app')

@section('title', 'Editar Perfil')

@section('content')
<div class="container mx-auto px-4 py-8 pb-20">
    <div class="flex items-center justify-center w-full md:flex-row gap-6">
        <!-- Perfil del Usuario -->
        <div class="w-full md:w-1/3">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="bg-indigo-600 px-6 py-4">
                    <h4 class="text-white font-medium text-xl">Editar Perfil</h4>
                </div>
                <div class="p-6">
                    <form action="{{ route('perfil.edit') }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PATCH')

        
                        <div>
                            <label for="name" class="block font-medium text-gray-700 mb-2">Nombre</label>
                            <input id="name" name="name" type="text" value="{{ $usuario->name }}" 
                                class="w-full px-4 py-2 border rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500" required>
                            @error('name')
                            <span class="flex w-full bg-red-500 text-white p-5">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block font-medium text-gray-700 mb-2">Email</label>
                            <input id="email" name="email" type="email" value="{{ $usuario->email }}" 
                                class="w-full px-4 py-2 border rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500" required>
                            @error('email')
                            <span class="flex w-full bg-red-500 text-white p-3">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="password" class="block font-medium text-gray-700 mb-2">Contraseña nueva</label>
                            <input id="password" name="password" type="password" 
                                class="w-full px-4 py-2 border rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500">
                            @error('password')
                            <span class="flex w-full bg-red-500 text-white p-3">{{ $message }}</span>
                            @enderror
                        </div>

                
                        <div>
                            <label for="password_confirmation" class="block font-medium text-gray-700 mb-2">Repite la Contraseña nueva</label>
                            <input id="password_confirmation" name="password_confirmation" type="password" 
                                class="w-full px-4 py-2 border rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500">
                        </div>

                        <!-- Botón de Enviar -->
                        <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg transition duration-300">
                            Guardar Cambios
                        </button>
                    </form>

                    <div class="mt-6">
                        <a href="{{ route('perfil') }}" class="block text-center bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium py-2 px-4 rounded-lg transition duration-300">
                            Volver al Perfil
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
