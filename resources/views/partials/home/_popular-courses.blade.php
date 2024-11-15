<!-- Cursos Populares Section -->
<section class="bg-blue-500 py-12 md:py-16">
    <div class="container mx-auto px-4 md:px-8">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4 text-center">Nuestros Cursos Populares</h2>
        <p class="text-white mb-8 md:mb-12 text-center">Descubre nuestros cursos más solicitados, cuidadosamente seleccionados para satisfacer las demandas de los estudiantes de hoy. Sumérgete en contenido atractivo diseñado para asegurar el éxito en cada paso de tu trayectoria educativa.</p>
        
        <!-- Cursos Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($servicios as $servicio)
            <a href="{{ route('detalles.curso', $servicio->id) }}">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105">
                    <!-- Imagen del curso -->
                    <img src="{{ asset('uploads/' . $servicio->img) }}" alt="Diseño Web" class="w-full h-40 md:h-48 object-cover">
                    <div class="p-4 md:p-6">
                        <span class="inline-block text-white text-sm px-3 py-1 rounded-full" style="background: linear-gradient(90deg, #3b82f6 0%, #22c55e 100%);">
                            {{$servicio->categoria}}
                        </span>
                        <h3 class="text-lg md:text-xl font-semibold mt-4">{{$servicio->nombre}}</h3>
                        <p class="text-gray-600 text-sm md:text-base mt-2">{{$servicio->clases}} Clases | {{$servicio->estudiantes}} Estudiantes</p>
                        <p class="text-lg font-bold mt-4">${{$servicio->precio}}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
