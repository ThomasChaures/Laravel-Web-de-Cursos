@extends('panel.layout.panel')
@section('title', 'Cursos')


@section('content')
<section class="p-6 bg-gray-50">
  <h1 class="font-semibold text-cyan-950 text-4xl mb-4">Cursos</h1>

  <a class="rounded bg-cyan-950 text-white py-2 px-2 mt-6" href="{{route('servicios.create')}}">Agregar nuevo curso</a>
  
  <div class="overflow-x-auto mt-6">
    <table class="max-w-[70%] container bg-white border border-gray-200">
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
          <th scope="col" class="py-3 px-4 text-left text-gray-600 font-medium">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($servicios as $servicio)
          <tr class="border-b hover:bg-gray-50">
            <td class="py-2 px-4 text-gray-700">{{$servicio->id}}</td>
            <td class="py-2 px-4 text-gray-700">{{$servicio->nombre}}</td>
            <td class="py-2 px-4 text-gray-700">{{$servicio->categoria}}</td>
            <td class="py-2 px-4 text-gray-700">{{$servicio->descripcion}}</td>
            <td class="py-2 px-4 text-gray-700">{{$servicio->clases}}</td>
            <td class="py-2 px-4 text-gray-700">{{$servicio->estudiantes}}</td>
            <td class="py-2 px-4 text-gray-700"> <img src="{{ asset('uploads/' . $servicio->img) }}" alt="{{ $servicio->nombre }}"></td>
            <td class="py-2 px-4 text-gray-700">${{number_format($servicio->precio, 2)}}</td>
            <td class="py-2 px-4">
            <a href="{{route('servicios.show', $servicio->id)}}" class="bg-green-500 hover:underline rounded h-[30px] w-[100px] flex items-center justify-center mt-3 text-white">Ver</a>
            <a href="{{route('servicios.edit', $servicio->id)}}" class="bg-blue-500 hover:underline rounded h-[30px] w-[100px] flex items-center justify-center mt-3 text-white">Editar</a>
            <form action="{{route('servicios.destroy', $servicio->id)}}" method="post">
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
