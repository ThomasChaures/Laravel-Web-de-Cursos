@extends('layout.app')

@section('title', 'Carrito')

@section('content')

<section>
    <h1 class="text-2xl font-bold mb-4">Carrito</h1>

    @if($carrito->servicios->isEmpty())
        <p class="text-gray-600">Tu carrito está vacío.</p>
    @else
        @foreach($carrito->servicios as $curso)
            <div class="mb-4 p-4 border rounded-lg shadow">
                <h2 class="text-xl font-semibold">{{ $curso->nombre }}</h2>
                
                @if(isset($curso->precio))
                    <p class="text-gray-700">Precio: ${{ number_format($curso->precio, 2) }}</p>
                @endif

                <form action="{{ route('carrito.eliminar', $curso->id) }}" method="post" class="mt-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-700 font-bold">
                        Eliminar del carrito
                    </button>
                </form>
            </div>
        @endforeach

        <p>{{$total}}</p>

        <div class="mt-6">
            <form action="{{ route('carrito.comprar') }}" method="post">
                @csrf
                <button tpye="submit" class="bg-green-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-green-600">
                Proceder a la compra
            </button>
            </form>
           
        </div>
    @endif
</section>

@endsection
