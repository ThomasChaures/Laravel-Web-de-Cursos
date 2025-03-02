@extends('layout.app')

@section('title', 'Mi Perfil')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row gap-6">
        <!-- Perfil del Usuario -->
        <div class="w-full md:w-1/3">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="bg-indigo-600 px-6 py-4">
                    <h4 class="text-white font-medium text-xl">Perfil de Usuario</h4>
                </div>
                <div class="p-6">
                    <div class="flex justify-center mb-6">
                        <div class="bg-gray-100 rounded-full p-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div class="flex justify-between border-b pb-3">
                            <span class="font-medium text-gray-700">Nombre:</span>
                            <span class="text-gray-600">{{ $usuario->name }}</span>
                        </div>
                        <div class="flex justify-between border-b pb-3">
                            <span class="font-medium text-gray-700">Email:</span>
                            <span class="text-gray-600">{{ $usuario->email }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-medium text-gray-700">Miembro desde:</span>
                            <span class="text-gray-600">{{ $usuario->created_at->format('d-m-Y') }}</span>
                        </div>
                    </div>
                    <div class="mt-6">
                        <a href="{{route('perfil.edit.view')}}" class="w-full block text-center bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded transition duration-300">
                            Editar Perfil
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cursos del Usuario -->
        <div class="w-full md:w-2/3">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="bg-indigo-600 px-6 py-4 flex justify-between items-center">
                    <h4 class="text-white font-medium text-xl">Mis Cursos</h4>
                    <span class="bg-white text-indigo-600 px-3 py-1 rounded-full text-sm font-medium">{{ $cursos->count() }} cursos</span>
                </div>
                <div class="p-6">
                    @if($cursos->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @foreach($cursos as $curso)
                                <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                                    <img src="{{asset('uploads/' . $curso->img)}}" class="w-full h-48 object-cover" alt="{{ $curso->nombre }}">
                                    <div class="p-4">
                                        <h5 class="text-lg font-medium text-indigo-600 mb-2">{{ $curso->nombre }}</h5>
                                        <p class="text-gray-600 text-sm mb-4">{{ Str::limit($curso->descripcion, 80) }}</p>
                                        <div class="flex justify-between items-center mb-4">
                                            <span class="text-green-600 font-bold">${{ number_format($curso->precio, 2) }}</span>
                                            <div class="w-2/3 bg-gray-200 rounded-full h-2">
                                                <div class="bg-green-500 h-2 rounded-full" style="width: 100%"></div>
                                            </div>
                                        </div>
                                        <a href="{{ route('detalles.curso', $curso->id) }}" class="block w-full bg-indigo-600 hover:bg-indigo-700 text-white text-center font-medium py-2 px-4 rounded transition duration-300">
                                            Ver Curso
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-10">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            <p class="text-gray-600 mt-4">No te has inscrito en ningún curso aún.</p>
                            <a href="{{ route('cursos') }}" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-6 rounded mt-4 transition duration-300">
                                Explorar Cursos
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection