@extends('panel.layout.panel')
@section('title', 'Curso: ' . $servicios->id)


@section('content')

<section>
    <div >
        <h1 class="font-semibold text-4xl mb-5">{{$servicios->nombre}}</h1>
        
        <div class="max-w-[400px] max-h-[300px] object-contain overflow-hidden"><img class="w-full h-full" src="{{ asset('uploads/' . $servicios->img) }}" alt="Curso"></div>

        <div class="mt-5 w-[403px]">
            <p class="break-all"><span class="font-semibold">Descripcion: </span>{{$servicios->descripcion}}</p>
            <p><span class="font-semibold">Precio: </span>${{$servicios->precio}}</p>
        </div>
    </div>
</section>

@endsection