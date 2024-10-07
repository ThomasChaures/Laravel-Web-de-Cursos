@extends('panel.layout.panel')
@section('title', 'Novedades')


@section('content')
<section class="p-6 bg-gray-50">
  <h1 class="font-semibold text-cyan-950 text-4xl mb-4">Novedades</h1>

  <a class="rounded bg-cyan-950 text-white py-2 px-2 mt-6" href="{{route('novedades.create')}}">Agregar nueva novedad</a>
  
  <div class="overflow-x-auto mt-6">
    <table class="min-w-full bg-white border border-gray-200">
      <thead class="bg-gray-100">
        <tr>
          <th scope="col" class="py-3 px-4 text-left text-gray-600 font-medium">Id</th>
          <th scope="col" class="py-3 px-4 text-left text-gray-600 font-medium">Usuario</th>
          <th scope="col" class="py-3 px-4 text-left text-gray-600 font-medium">Titulo</th>
          <th scope="col" class="py-3 px-4 text-left text-gray-600 font-medium">Contenido</th>
          <th scope="col" class="py-3 px-4 text-left text-gray-600 font-medium">Img</th>
          <th scope="col" class="py-3 px-4 text-left text-gray-600 font-medium">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($novedades as $novedad)
          <tr class="border-b hover:bg-gray-50">
            <td class="py-2 px-4 text-gray-700">{{$novedad->id}}</td>
            <td class="py-2 px-4 text-gray-700">{{$novedad->user_id}}</td>
            <td class="py-2 px-4 text-gray-700">{{$novedad->titulo}}</td>
            <td class="py-2 px-4 text-gray-700">{{$novedad->contenido}}</td>
            <td class="py-2 px-4 text-gray-700"> <img src="{{ asset('uploads/' . $novedad->img) }}" alt="{{ $novedad->nombre }}"></td>
            <td class="py-2 px-4 text-gray-700">${{number_format($novedad->precio, 2)}}</td>
            <td class="py-2 px-4">
            <a href="{{route('servicios.show', $novedad->id)}}" class="bg-green-500 hover:underline rounded h-[30px] w-[100px] flex items-center justify-center mt-3 text-white">Ver</a>
            <a href="{{route('servicios.edit', $novedad->id)}}" class="bg-blue-500 hover:underline rounded h-[30px] w-[100px] flex items-center justify-center mt-3 text-white">Editar</a>
            <form action="{{route('servicios.destroy', $novedad->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="bg-red-500 hover:underline rounded h-[30px] w-[100px] flex items-center justify-center mt-3 text-white" type="submit">Eliminar</button>
            </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</section>
@endsection
