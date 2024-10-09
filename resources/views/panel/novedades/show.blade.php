@extends('panel.layout.panel')
@section('title', 'Novedad')


@section('content')

<section>
    <div >
        <h1 class="font-semibold text-4xl mb-5">{{$novedad->titulo}}</h1>
        
        <div class="max-w-[400px] max-h-[300px] object-contain overflow-hidden"><img class="w-full h-full" src="{{ asset('uploads/' . $novedad->img) }}" alt="Novedad"></div>

        <div class="mt-5 w-[403px]">
            <p class="break-all"><span class="font-semibold">Contenido: </span>{{$novedad->contenido}}</p>
            <p><span class="font-semibold">Creador: </span>{{$creadorName}}</p>

            <a class="h-[40px] flex justify-center items-center w-[200px] mt-4 px-5 bg-cyan-950 text-white rounded" href="{{route('novedades.index')}}">Voler al listado</a>
        </div>
    </div>
</section>

@endsection