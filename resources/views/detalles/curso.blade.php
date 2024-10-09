@extends('layout.app')
@section('title', $servicio->nombre)

@section('content')

<section>
    <!-- Armar vista de detalles -->
    @if(!$comprado)
    <form action="{{route('comprar.curso', $servicio->id)}}" method="post">
        @csrf
        <input type="hidden" value="{{$servicio->id}}" name="curso_id" id="curso_id">
        <button type="submit">Comprar</button>
    </form>
    @else
    <p>Comprado</p>
    @endif
</section>

@endsection