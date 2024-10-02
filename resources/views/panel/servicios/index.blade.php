@extends('panel.layout.panel')
@section('title', 'Servicios')


@section('content')
<section class="p-6 bg-gray-50">
  <h1 class="font-semibold text-cyan-950 text-4xl mb-4">Cursos</h1>

  <div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-200">
      <thead class="bg-gray-100">
        <tr>
          <th scope="col" class="py-3 px-4 text-left text-gray-600 font-medium">Id</th>
          <th scope="col" class="py-3 px-4 text-left text-gray-600 font-medium">Nombre</th>
          <th scope="col" class="py-3 px-4 text-left text-gray-600 font-medium">Descripción</th>
          <th scope="col" class="py-3 px-4 text-left text-gray-600 font-medium">Img</th>
          <th scope="col" class="py-3 px-4 text-left text-gray-600 font-medium">Precio</th>
          <th scope="col" class="py-3 px-4 text-left text-gray-600 font-medium">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($servicios as $servicio)
          <tr class="border-b hover:bg-gray-50">
            <td class="py-2 px-4 text-gray-700">{{$servicio->id}}</td>
            <td class="py-2 px-4 text-gray-700">{{$servicio->nombre}}</td>
            <td class="py-2 px-4 text-gray-700">{{$servicio->descripcion}}</td>
            <td class="py-2 px-4 text-gray-700"><img src="{{$servicio->img}}" alt="{{$servicio->nombre}}"></td>
            <td class="py-2 px-4 text-gray-700">${{number_format($servicio->precio, 2)}}</td>
            <td class="py-2 px-4">
              <button class="text-blue-500 hover:underline">Editar</button>
              <button class="text-red-500 hover:underline">Eliminar</button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</section>
@endsection
