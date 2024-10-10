@extends('layout.app')
@section('title', $novedades->titulo)

@section('content')

<section class="py-12">
    <div class="container mx-auto">
        <div class="bg-white p-8 rounded-lg shadow-lg mb-6">
            <!-- Imagen destacada -->
            @if($novedades->img)
                <img src="{{ asset('uploads/' . $novedades->img) }}" alt="Noticia Destacada" class="w-full h-80 object-cover rounded-lg mb-6">
            @endif

            <!-- Título de la novedad -->
            <h1 class="text-4xl font-bold mb-4">{{ $novedades->titulo }}</h1>

            <!-- Fecha y autor de la novedad -->
            <p class="text-gray-500 mb-6">
                <i class="fas fa-calendar-alt text-blue-500 mr-2"></i> Publicado el {{ $novedades->created_at->format('d M, Y') }}
                @if($novedades->user)
                    <span class="ml-4">
                        <i class="fas fa-user text-blue-500 mr-2"></i> Por {{ $novedades->user->name }}
                    </span>
                @endif
            </p>

            <!-- Contenido completo de la novedad -->
            <div class="text-gray-700 leading-relaxed mb-8">
                {!! nl2br(e($novedades->contenido)) !!}
            </div>

            <!-- Opciones para compartir en redes sociales -->
            <div class="border-t pt-6">
                <h3 class="text-2xl font-semibold mb-4">Compartir esta noticia:</h3>
                <div class="flex space-x-4">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                        <i class="fab fa-facebook-f mr-2"></i> Facebook
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}" target="_blank" class="bg-blue-400 text-white px-4 py-2 rounded-lg hover:bg-blue-500">
                        <i class="fab fa-twitter mr-2"></i> Twitter
                    </a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->fullUrl()) }}" target="_blank" class="bg-blue-700 text-white px-4 py-2 rounded-lg hover:bg-blue-800">
                        <i class="fab fa-linkedin-in mr-2"></i> LinkedIn
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
