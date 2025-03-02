@extends('layout.app')

@section('title', 'Carrito')

@section('content')

<?php

dd($preferencia);
?>

<section class="py-12">
    <div class="container mx-auto px-4 lg:px-8 margin-section">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-16">Carrito de Compras</h1>

        @if(isset($carrito) && $carrito->servicios->isNotEmpty())
            <!-- Contenedor principal del carrito -->
            <div class="flex flex-col lg:flex-row gap-8 mb-16">
                <!-- Lista de productos en el carrito -->
                <div class=" p-6 rounded-lg shadow-lg flex-1">
                    <h2 class="text-2xl font-semibold text-gray-700 mb-6">Productos en tu carrito</h2>

                    @foreach($carrito->servicios as $curso)
                        <div class="flex items-center mb-6 border-b pb-6">
                            <!-- Imagen del curso -->
                            <div class="w-20 h-20 rounded overflow-hidden">
                                <img src="{{ asset('uploads/' . $curso->img) }}" alt="{{ $curso->nombre }}" class="w-full h-full object-cover">
                            </div>

                            <!-- Detalles del curso -->
                            <div class="flex-1 ml-4">
                                <h3 class="text-lg font-semibold text-gray-800">{{ $curso->nombre }}</h3>
                                @if(isset($curso->precio))
                                    <p class="text-green-600 font-medium">Precio: ${{ number_format($curso->precio, 2) }}</p>
                                @endif
                            </div>

                            <!-- Botón para eliminar el curso -->
                            <form action="{{ route('carrito.eliminar', $curso->id) }}" method="post" class="ml-4">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-600 font-bold">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>

                <!-- Resumen del carrito -->
                <div class="bg-white p-6 rounded-lg shadow-lg w-full lg:w-1/3">
                    <h2 class="text-2xl font-semibold text-gray-700 mb-6">Resumen del Carrito</h2>

                    <!-- Precio total -->
                    <div class="flex justify-between items-center text-lg font-semibold text-gray-800 border-b pb-6 mb-6">
                        <span>Total:</span>
                        <span>${{ number_format($total, 2) }}</span>
                    </div>

                    <!-- Botón para proceder a la compra -->
                    <form action="{{ route('carrito.comprar') }}" method="post" class="text-center">
                        @csrf
                        <button type="submit" class="w-full bg-green-500 text-white py-3 rounded-lg font-bold hover:bg-green-600">
                            Proceder a la compra
                        </button>
                    </form>
                </div>
            </div>
        @else
            <div class="border-2 border-gray-100 p-8 rounded-lg shadow-md text-center">
                <p class="text-gray-600 text-lg">Tu carrito está vacío.</p>
                <a href="{{ route('cursos') }}" class="mt-4 inline-block bg-blue-500 text-white py-2 px-6 rounded-lg hover:bg-blue-600">Explorar Cursos</a>
            </div>
        @endif
    </div>
</section>

@endsection
