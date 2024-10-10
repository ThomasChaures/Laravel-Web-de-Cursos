

@foreach($novedades as $novedad)
<div class="bg-white p-6 rounded-lg shadow-lg mb-6">
    <img src="{{ asset('uploads/' . $novedad->img) }}" alt="Noticia Destacada" class="w-full h-64 object-cover rounded-lg mb-4">
    <h3 class="text-3xl font-semibold mb-2">{{$novedad->titulo}}</h3>
    <div>
    <p class="text-gray-700 overflow-hidden text-wrap">{{ \Illuminate\Support\Str::limit($novedad->contenido, 80, '...') }}</p>
    </div>
    <a href="#" class="text-blue-500 font-semibold hover:underline mt-4 inline-block">Leer más</a>
</div>
@endforeach