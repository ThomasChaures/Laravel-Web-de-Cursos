@extends('panel.layout.panel')
@section('title', 'Inicio')


@section('content')

<section>
    <h1 class="font-semibold text-cyan-950 text-4xl mb-8">Inicio</h1>

    <div class="w-[60%] max-lg:flex-col flex items-start justify-between gap-10">
    <div class="flex flex-col items-center justify-center text-center">
           <div class="space-y-4 p-6 bg-cyan-950 shadow-lg rounded-lg">
           <p class="text-xl font-medium text-white">Usuarios</p>
            <p class="border-white rounded-full border-4 h-[200px] w-[200px] flex items-center justify-center text-6xl text-white">
                {{$usuarios}}
            </p>
           </div>
            <a class="py-3 w-[200px] mt-4 px-5 bg-cyan-950 text-white rounded" href="{{route('usuarios.index')}}">Ver listado</a>
        </div>
        <div class="flex flex-col items-center justify-center text-center">
           <div class="space-y-4 p-6  bg-cyan-950 shadow-lg rounded-lg">
           <p class="text-xl font-medium text-white">Cursos</p>
            <p class="border-white rounded-full border-4 h-[200px] w-[200px] flex items-center justify-center text-6xl text-white">
                {{$cursos}}
            </p>
           </div>
            <a class="py-3 w-[200px] mt-4 px-5 bg-cyan-950 text-white rounded" href="{{route('servicios.index')}}">Ver listado</a>
        </div>
        <div class="flex flex-col items-center justify-center text-center">
           <div class="space-y-4 p-6 bg-cyan-950 shadow-lg rounded-lg">
           <p class="text-xl font-medium text-white">Novedades</p>
            <p class="border-white rounded-full border-4 h-[200px] w-[200px] flex items-center justify-center text-6xl text-white">
                {{$novedades}}
            </p>
           </div>
            <a class="py-3 w-[200px] mt-4 px-5 bg-cyan-950 text-white rounded" href="{{ route('novedades.index') }}">Ver listado</a>
        </div>
    </div>
</section>


@endsection