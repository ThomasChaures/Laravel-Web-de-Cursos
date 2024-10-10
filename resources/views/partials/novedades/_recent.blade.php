<!-- 
<section class="py-10">
    <div class="container mx-auto">
        <h2 class="text-3xl font-semibold text-center mb-8">Más Novedades</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($novedades as $novedad)
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <img src="{{ $novedad->img_url }}" alt="Novedad" class="w-full h-40 object-cover rounded-lg mb-4">
                <h3 class="text-xl font-semibold mb-2">{{ $novedad->titulo }}</h3>
                <p class="text-gray-700">{{ Str::limit($novedad->resumen, 100) }}</p>
                <a href="{{ route('detalles.novedad', $novedad->id) }}" class="text-blue-500 hover:underline mt-4 block">Leer más</a>
            </div>
            @endforeach
        </div>
    </div>
</section>
-->