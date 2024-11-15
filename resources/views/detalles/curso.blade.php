@extends('layout.app')
@section('title', $servicio->nombre)

@section('content')

<section class="py-12">
    <div class="container mx-auto px-4 md:px-6 lg:px-0 grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Columna Izquierda: Imagen y Detalles del Curso -->
        <div class="lg:col-span-2">
            <!-- Imagen del curso -->
            <img src="{{ asset('uploads/' . $servicio->img) }}" alt="{{ $servicio->nombre }}" class="w-full h-64 object-cover rounded-lg mb-4">
            
            <!-- Información básica del curso -->
            <h1 class="text-4xl font-bold mb-4">{{ $servicio->nombre }}</h1>
            <p class="text-lg max-w-[670px] break-all text-gray-700 mb-6"><span class="font-bold">Estudiantes: </span>{{ $servicio->estudiantes }}</p>
            <p class="text-lg max-w-[670px] break-all text-gray-700 mb-6">{{ $servicio->descripcion }}</p>
        </div>

        <!-- Columna Derecha: Comprar curso -->
        <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
            <!-- Título del precio -->
            <div class="mb-6">
                <p class="text-2xl font-semibold text-gray-700">Precio del curso</p>
                <p class="text-3xl font-bold text-green-600">${{ number_format($servicio->precio, 0, ',', '.') }}</p>
            </div>

            <!-- Información adicional del curso -->
            <div class="my-8 bg-white p-4 rounded-lg shadow-inner">
                <p class="text-gray-600 flex items-center">
                    <i class="fas fa-calendar-alt text-blue-500 mr-2"></i>
                    Fecha de inicio: <span class="font-semibold ml-1">{{ $servicio->fecha_inicio ?? 'Autodidacta' }}</span>
                </p>
                <p class="text-gray-600 flex items-center mt-2">
                    <i class="fas fa-clock text-blue-500 mr-2"></i>
                    Duración: <span class="font-semibold ml-1">{{ $servicio->duracion ?? 'Flexible' }}</span>
                </p>
                <p class="text-gray-600 flex items-center mt-2">
                    <i class="fas fa-chalkboard-teacher text-blue-500 mr-2"></i>
                    Tipo: <span class="font-semibold ml-1">{{ $servicio->tipo ?? 'Online' }}</span>
                </p>
            </div>

            <!-- Verifica si el curso ha sido comprado -->
            @if(!$enCarrito)
                @if(!$comprado)  
                    <form action="{{ route('comprar.curso', $servicio->id) }}" method="post" class="mt-6">
                        @csrf
                        <input type="hidden" value="{{ $servicio->id }}" name="curso_id" id="curso_id">
                        <button type="submit" class="bg-green-500 text-white font-bold py-3 px-6 rounded-lg hover:bg-green-600 w-full transition-transform transform hover:scale-105">
                            Agregar al carrito
                        </button>
                    </form>
                @else
                    <p class="text-green-500 font-bold text-lg mt-6">¡Ya compraste este curso!</p>
                @endif
            @else
                <p class="text-gray-500 font-bold text-lg mt-6">El curso ya está en tu carrito.</p>
            @endif
        </div>
    </div>
</section>

@endsection
