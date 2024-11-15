@extends('panel.layout.panel')
@section('title', $usuario->name)

@section('content')

<section>
    <h1 class="font-semibold text-cyan-950 text-4xl mb-4">Cursos adquiridos por: {{$usuario->name}}</h1>
    <a class="rounded bg-cyan-950 text-white py-2 px-2 mt-8" href="{{route('usuarios.index')}}">Volver al listado</a>

    <div class="overflow-x-auto mt-6">
    <table class="max-w-[70%] containerl bg-white border border-gray-200">
      <thead class="bg-gray-100">
        <tr>
          <th scope="col" class="py-3 px-4 text-left text-gray-600 font-medium">Id</th>
          <th scope="col" class="py-3 px-4 text-left text-gray-600 font-medium">Nombre</th>
          <th scope="col" class="py-3 px-4 text-left text-gray-600 font-medium">Categoria</th>
          <th scope="col" class="py-3 px-4 text-left text-gray-600 font-medium">Descripción</th>
          <th scope="col" class="py-3 px-4 text-left text-gray-600 font-medium">Clases</th>
          <th scope="col" class="py-3 px-4 text-left text-gray-600 font-medium">Estudiantes</th>
          <th scope="col" class="py-3 px-4 text-left text-gray-600 font-medium">Img</th>
          <th scope="col" class="py-3 px-4 text-left text-gray-600 font-medium">Precio</th>
        </tr>
      </thead>
      <tbody>
        @if($compras)
            @foreach($compras as $servicio)
          <tr class="border-b hover:bg-gray-50">
            <td class="py-2 px-4 text-gray-700">{{$servicio->id}}</td>
            <td class="py-2 px-4 text-gray-700">{{$servicio->nombre}}</td>
            <td class="py-2 px-4 text-gray-700">{{$servicio->categoria}}</td>
            <td class="py-2 px-4 text-gray-700">{{$servicio->descripcion}}</td>
            <td class="py-2 px-4 text-gray-700">{{$servicio->clases}}</td>
            <td class="py-2 px-4 text-gray-700">{{$servicio->estudiantes}}</td>
            <td class="py-2 px-4 text-gray-700"> <img src="{{ asset('uploads/' . $servicio->img) }}" alt="{{ $servicio->nombre }}"></td>
            <td class="py-2 px-4 text-gray-700">${{number_format($servicio->precio, 2)}}</td>
          </tr>
        @endforeach
        @endif
        
      </tbody>
    </table>
  </div>
</section>

@endsection