@extends('layout.app')
@section('title', 'Novedades')

@section('content')

<!-- Banner de presentación de la sección de Novedades -->
<section class="bg-gradient-to-r from-blue-500 to-green-400 text-white py-24">
    <div class="container mx-auto text-center">
        <h1 class="text-5xl font-bold mb-4">Últimas Novedades</h1>
        <p class="text-lg mb-12">Mantente al tanto de las últimas noticias, eventos y lanzamientos. Explora lo que hemos estado haciendo y las novedades que tenemos para ti.</p>
    </div>
</section>

<!-- Listado de novedades -->
<section id="novedades" class="py-10 bg-gray-100">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
            @foreach($novedades as $novedad)
            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transition">
                <img src="{{ asset('uploads/' . $novedad->img) }}" alt="Noticia Destacada" class="w-full h-64 object-cover rounded-lg mb-4">
                
                <!-- Título de la novedad -->
                <h2 class="text-2xl font-semibold mb-4">
                    <i class="fas fa-newspaper text-blue-500 mr-2"></i> <!-- Ícono de noticia -->
                    {{$novedad->titulo}}
                </h2> 
                
                <!-- Fecha de la novedad -->
                <p class="text-gray-700 mb-4">
                    <i class="fas fa-calendar-alt text-blue-500 mr-2"></i>
                    Fecha: {{$novedad->created_at->format('d M, Y')}} <!-- Formato de fecha -->
                </p>    
                
                <div>
                    <!-- Contenido con límite de caracteres -->
                    <p class="text-gray-700 overflow-hidden text-wrap">{{ \Illuminate\Support\Str::limit($novedad->contenido, 80, '...') }}</p>
                </div>
                
                <!-- Enlace para leer más -->
                <a href="{{route('detalles.novedad', $novedad->id)}}" class="text-blue-500 font-semibold hover:underline mt-4 inline-block">
                    <i class="fas fa-arrow-right mr-2"></i>
                    Leer más
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>


@endsection
