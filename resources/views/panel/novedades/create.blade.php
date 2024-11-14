@extends('panel.layout.panel')
@section('title', 'Agregar novedad')

@section('content')

<section class="p-6 bg-gray-50">
    <h1 class="font-semibold text-cyan-950 text-4xl mb-4">Agregar novedad</h1>


    <a class="rounded bg-cyan-950 text-white py-2 px-2 mt-6" href="{{route('novedades.index')}}">Volver a novedades</a>
    <div class="mt-10"> 
    <form  class="flex flex-col w-[600px] item-start justify-start" action="{{ route('novedades.store') }}" method="POST" enctype="multipart/form-data">

            @csrf 
            <div class="flex items-start flex-col w-full mt-4">
                <label class="mb-3" for="titulo">Titulo</label>
                <input class="w-full block py-2 px-2 border rounded border-cyan-950" value="{{old('titulo')}}"  type="text" id="titulo" name="titulo" />
                @error('titulo')
                    <span class="flex w-full bg-red-500 text-white p-5">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex items-start flex-col w-full mt-4">
                <label class="mb-3" for="contenido">Contenido</label>
                <textarea class="w-full block py-2 px-2 border resize-none rounded border-cyan-950" cols="30" rows="5" name="contenido" id="contenido">{{old('contenido')}}</textarea>
                @error('contenido')
                    <span class="flex w-full bg-red-500 text-white p-5">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex items-start flex-col w-full mt-4">
                <label class="mb-3" for="img">Imagen</label>
                <input type="file" class="w-full block py-2 px-2 border rounded border-cyan-950" id="img" name="img" />
                @error('img')
                    <span class="flex w-full bg-red-500 text-white p-5">{{ $message }}</span>
                @enderror
            </div>
            <button class="bg-cyan-950 rounded py-2 mt-4 px-5 text-white" type="submit">Enviar</button>
        </form>
    </div>
</section>

@endsection
