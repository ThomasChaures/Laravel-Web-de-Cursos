 <!-- Cursos Populares Section -->
 <section class="bg-blue-500 py-16">
        <div class="container mx-auto py-12">
            <h2 class="text-4xl font-bold text-white mb-4 text-center">Nuestros Cursos Populares</h2>
            <p class="text-white mb-12 px-2 text-center">Descubre nuestros cursos más solicitados, cuidadosamente seleccionados para satisfacer las demandas de los estudiantes de hoy. Sumérgete en contenido atractivo diseñado para asegurar el éxito en cada paso de tu trayectoria educativa.</p>
            
       
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
         
                @foreach($servicios as $servicio)
                <a href="{{ route('detalles.curso', $servicio->id) }}">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105">
                    <img src="{{ asset('uploads/' . $servicio->img) }}" alt="Diseño Web" class="w-full h-40 object-cover">
                    <div class="p-6">
                        <span class="inline-block text-white text-sm px-3 py-1 rounded-full" style="background: linear-gradient(90deg, #3b82f6 0%, #22c55e 100%);">{{$servicio->categoria}}</span>
                        <h3 class="text-xl font-semibold mt-4">{{$servicio->nombre}}</h3>
                        <p class="text-gray-600 mt-2">{{$servicio->clases}} Clases | {{$servicio->estudiantes}} Estudiantes</p>
                        <p class="text-lg font-bold mt-4">${{$servicio->precio}}</p>
                    </div>
                </div>
                </a>
            @endforeach
        </div>
    </section>