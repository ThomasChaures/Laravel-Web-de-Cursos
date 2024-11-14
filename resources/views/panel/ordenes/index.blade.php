@extends('panel.layout.panel')
@section('title', 'Ordenes ' . $user->name)


@section('content')
<section class="p-6 bg-gray-50">
    <h1 class="font-semibold text-cyan-950 text-4xl mb-4">Ordenes de {{$user->name}}</h1>

    <a class="rounded bg-cyan-950 text-white py-2 px-2 mt-8" href="{{route('usuarios.index')}}">Volver al listado</a>

    <div class="overflow-x-auto mt-6">
        <table class="max-w-[70%] container bg-white border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th scope="col" class="py-3 px-4 text-left text-gray-600 font-medium">Id</th>
                    <th scope="col" class="py-3 px-4 text-left text-gray-600 font-medium">Monto</th>
                    <th scope="col" class="py-3 px-4 text-left text-gray-600 font-medium">Fecha de compra</th>
                    <th scope="col" class="py-3 px-4 text-left text-gray-600 font-medium">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ordenes as $orden)
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="py-2 px-4 text-gray-700">{{$orden->id}}</td>
                                        <td class="py-2 px-4 text-gray-700">${{$orden->pagos->first()->total
                    }}</td>
                                        <td class="py-2 px-4 text-gray-700">{{$orden->created_at}}</td>
                                        <td class="py-2 px-4">
                                            <a href="{{ route('admin.usuarios.ordenes.show', ['userId' => $user->id, 'orderId' => $orden->id]) }}"
                                                class="bg-green-500 hover:underline rounded h-[30px] w-[100px] flex items-center justify-center mt-3 text-white">Recibo</a>
                                        </td>
                                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection