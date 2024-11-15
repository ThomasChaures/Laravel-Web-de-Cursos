<!-- Hero Section -->
<section class="bg-white pb-12">
    <div class="container mx-auto flex flex-col-reverse lg:flex-row items-center">
    
        <!-- Texto del Hero -->
        <div class="w-full lg:w-1/2 px-6 text-center lg:text-left">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-black leading-tight mb-4">
                Impulsa tu aprendizaje con cursos diseñados para el éxito
            </h1>
            <p class="text-gray-600 mb-8 text-sm sm:text-base lg:text-lg">
                Descubre un enfoque innovador en la formación online con nuestra plataforma. Accede a cursos personalizados y mejora tus habilidades con métodos prácticos y dinámicos.
            </p>
            @auth
            <a href="{{ route('cursos') }}" class="bg-green-500 text-white px-4 sm:px-6 py-2 sm:py-3 rounded-full hover:bg-green-600">
                Comenzar ahora
            </a>
            @else
            <a href="{{ route('auth.register') }}" class="bg-green-500 text-white px-4 sm:px-6 py-2 sm:py-3 rounded-full hover:bg-green-600">
                Comenzar ahora
            </a>
            @endauth
        </div>

        <!-- Imagen del Hero -->
        <div class="w-full lg:w-1/2 flex justify-center mt-8 lg:mt-0">
            <img src="{{ asset('img/home.png') }}" alt="Estudiante + Estadísticas de los cursos" class="max-w-[60%] sm:max-w-[70%] md:max-w-[80%] lg:max-w-[100%] h-auto object-contain mt-12">
        </div>
    </div>
</section>
