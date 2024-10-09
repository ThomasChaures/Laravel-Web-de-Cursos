@extends('layout.app')
@section('title', 'Cursos')

@section('content')

<!-- Sección de búsqueda -->
<section class="bg-gradient-to-r from-blue-500 to-green-400 text-white py-16">
    <div class="container mx-auto text-center">
        <h1 class="text-4xl font-bold mb-4">Encuentra el curso perfecto para ti</h1>
        <p class="text-lg mb-6">Aprende con los mejores expertos, en cualquier momento y desde cualquier lugar.</p>
        
        <form action="" method="GET" class="flex justify-center items-center">
            <input type="text" name="search" placeholder="Buscar cursos..." class="px-4 py-2 rounded-l-md border-none focus:ring-2 focus:ring-green-500 w-72">
            <button type="submit" class="ml-4 px-6 py-2 bg-white text-blue-500 font-semibold rounded-md hover:bg-gray-100 transition">Buscar</button>
        </form>
    </div>
</section>

<!-- Sección de categorías principales -->
<section class="py-10">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-semibold mb-6">Explora cursos por categorías</h2>
        <div class="flex justify-center space-x-4">
            <a href="#" class="flex flex-col items-center text-gray-700 hover:text-blue-500 transition">
                <div class="bg-blue-100 p-4 rounded-full">
                    <img src="path/to/photography-icon.png" alt="Fotografía" class="h-8 w-8">
                </div>
                <p class="mt-2">Fotografía</p>
            </a>
            <a href="#" class="flex flex-col items-center text-gray-700 hover:text-blue-500 transition">
                <div class="bg-blue-100 p-4 rounded-full">
                    <img src="path/to/development-icon.png" alt="Desarrollo" class="h-8 w-8">
                </div>
                <p class="mt-2">Desarrollo</p>
            </a>
            <a href="#" class="flex flex-col items-center text-gray-700 hover:text-blue-500 transition">
                <div class="bg-blue-100 p-4 rounded-full">
                    <img src="path/to/design-icon.png" alt="Diseño" class="h-8 w-8">
                </div>
                <p class="mt-2">Diseño</p>
            </a>
        </div>
    </div>
</section>

<!-- Sección de cursos populares -->
<section class="pt-5 pb-5">
    <div class="mx-auto container grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($servicios as $servicio)
        <a href="{{ $servicio->id }}" class="group">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform group-hover:scale-105">
                <img src="{{ $servicio->img }}" alt="Diseño Web" class="w-full h-40 object-cover">
                <div class="p-6">
                    <span class="inline-block text-white text-sm px-3 py-1 rounded-full bg-gradient-to-r from-blue-500 to-green-400">
                        {{$servicio->categoria}}
                    </span>
                    <h3 class="text-xl font-semibold mt-4 group-hover:text-blue-500">{{$servicio->nombre}}</h3>
                    <p class="text-gray-600 mt-2">{{$servicio->clases}} Clases | {{$servicio->estudiantes}} Estudiantes</p>
                    <p class="text-lg font-bold mt-4">${{$servicio->precio}}</p>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</section> 

@endsection
