@extends('panel.layout.panel')
@section('title', 'Usuarios')


@section('content')
<section class="p-6 bg-gray-50">
  <h1 class="font-semibold text-cyan-950 text-4xl mb-4">Usuarios</h1>

  <a class="rounded bg-cyan-950 text-white py-2 px-2 mt-6" href="{{ route('usuarios.create') }}">Agregar nuevo usuario</a>
  
  <div class="overflow-x-auto mt-6">
    <table class="min-w-full bg-white border border-gray-200">
      <thead class="bg-gray-100">
        <tr>
          <th scope="col" class="py-3 px-4 text-left text-gray-600 font-medium">Id</th>
          <th scope="col" class="py-3 px-4 text-left text-gray-600 font-medium">Nombre</th>
          <th scope="col" class="py-3 px-4 text-left text-gray-600 font-medium">Email</th>
          <th scope="col" class="py-3 px-4 text-left text-gray-600 font-medium">Rol</th>
          <th scope="col" class="py-3 px-4 text-left text-gray-600 font-medium">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($usuarios as $usuario)
          <tr class="border-b hover:bg-gray-50">
            <td class="py-2 px-4 text-gray-700">{{$usuario->id}}</td>
            <td class="py-2 px-4 text-gray-700">{{$usuario->name}}</td>
            <td class="py-2 px-4 text-gray-700">{{$usuario->email}}</td>
            <td class="py-2 px-4 text-gray-700">{{$usuario->rol->nombre}}</td>
            <td class="py-2 px-4">
            <a href="{{route('usuarios.show', $usuario->id)}}" class="bg-green-500 hover:underline rounded h-[30px] w-[100px] flex items-center justify-center mt-3 text-white">Cursos</a>
            <a href="{{ route('admin.usuarios.ordenes.index', ['userId' => $usuario->id]) }}" class="bg-green-500 hover:underline rounded h-[30px] w-[100px] flex items-center justify-center mt-3 text-white">Compras</a>
            <a href="{{route('usuarios.edit', $usuario->id)}}"  class="bg-blue-500 hover:underline rounded h-[30px] w-[100px] flex items-center justify-center mt-3 text-white">Editar</a>
            <form action="{{route('usuarios.destroy', $usuario->id)}}" method="post">
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
