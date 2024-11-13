@extends('panel.layout.panel')
@section('title', 'Orden - N ' . $orden->id)


@section('content')
<section class="p-6 bg-gray-50">
    <h1 class="font-semibold text-cyan-950 text-4xl mb-4">Numero de Orden: {{$orden->id}}</h1>
    <p class="text-3xl font-medium mb-6 text-cyan-950">Total pagado: ${{$orden->pagos->first()->total}}</p>

    
  <a class="rounded bg-cyan-950 text-white py-2 px-2 mt-6" href="{{ route('admin.usuarios.ordenes.index', ['userId' => $user->id]) }}">Volver a compras</a>


    <div class="overflow-x-auto mt-6">
        <table class="min-w-full bg-white border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th scope="col" class="py-3 px-4 text-left text-gray-600 font-medium">Id</th>
                    <th scope="col" class="py-3 px-4 text-left text-gray-600 font-medium">Nombre</th>
                    <th scope="col" class="py-3 px-4 text-left text-gray-600 font-medium">Categoria</th>
                    <th scope="col" class="py-3 px-4 text-left text-gray-600 font-medium">Descripcion</th>
                    <th scope="col" class="py-3 px-4 text-left text-gray-600 font-medium">Clases</th>
                    <th scope="col" class="py-3 px-4 text-left text-gray-600 font-medium">Estudiantes</th>
                    <th scope="col" class="py-3 px-4 text-left text-gray-600 font-medium">Precio</th>

                </tr>
            </thead>
            <tbody>
                @foreach($orden->cursosEnOrden as $cursoEnOrden)
                    <tr class="border-b hover:bg-gray-50">
                    <td class="py-2 px-4 text-gray-700">{{ $cursoEnOrden->servicio->id }}</td>
                    <td class="py-2 px-4 text-gray-700">{{ $cursoEnOrden->servicio->nombre }}</td>
                    <td class="py-2 px-4 text-gray-700">{{ $cursoEnOrden->servicio->categoria }}</td>
                    <td class="py-2 px-4 text-gray-700">{{ $cursoEnOrden->servicio->descripcion }}</td>
                    <td class="py-2 px-4 text-gray-700">{{ $cursoEnOrden->servicio->clases }}</td>
                    <td class="py-2 px-4 text-gray-700">{{ $cursoEnOrden->servicio->estudiantes }}</td>
                    <td class="py-2 px-4 text-gray-700">${{ $cursoEnOrden->servicio->precio }}</td>
                
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</section>
@endsection