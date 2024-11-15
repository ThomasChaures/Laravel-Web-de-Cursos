<section class="pt-10 pb-10 sm:pt-8 sm:pb-12 md:pt-14 md:pb-16">
    <div class="mx-auto container px-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 sm:gap-6 md:gap-8">
        @foreach($servicios as $servicio)
        <a href="{{ route('detalles.curso', $servicio->id) }}" class="block">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105">
                <img src="{{ asset('uploads/' . $servicio->img) }}" alt="Diseño Web" class="w-full h-40 sm:h-48 md:h-56 object-cover">
                <div class="p-4 sm:p-5 md:p-6">
                    <span class="inline-block text-white text-xs sm:text-sm px-3 py-1 rounded-full" style="background: linear-gradient(90deg, #3b82f6 0%, #22c55e 100%);">
                        {{$servicio->categoria}}
                    </span>
                    <h3 class="text-lg sm:text-xl font-semibold mt-3 sm:mt-4">{{$servicio->nombre}}</h3>
                    <p class="text-gray-600 text-sm sm:text-base mt-1 sm:mt-2">{{$servicio->clases}} Clases | {{$servicio->estudiantes}} Estudiantes</p>
                    <p class="text-lg font-bold mt-3 sm:mt-4">${{$servicio->precio}}</p>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</section>

