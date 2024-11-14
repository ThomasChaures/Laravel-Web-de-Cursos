@extends('panel.layout.panel')
@section('title', 'Editar curso')

@section('content')
<section class="p-6 bg-gray-50">
    <h1 class="font-semibold text-cyan-950 text-4xl mb-4">Editar curso</h1>
    <a class="h-[40px] flex justify-center items-center w-[200px] mt-4 px-5 bg-cyan-950 text-white rounded" href="{{route('servicios.index')}}">Voler al listado</a>
    <div class="mt-10"> 
    <form  class="flex flex-col w-[600px] item-start justify-start" action="{{ route('servicios.update', $servicios->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
            <div class="flex items-start flex-col w-full mt-4">
                <label class="mb-3" for="nombre">Nombre</label>
                <input class="w-full block py-2 px-2 border rounded border-cyan-950" value="{{$servicios->nombre}}"  type="text" id="nombre" name="nombre" />
                @error('nombre')
                    <span class="flex w-full bg-red-500 text-white p-5">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex items-start flex-col w-full mt-4">
            <label class="mb-3" for="categoria">Categoría</label>
                <select class="w-full block py-2 px-2 border rounded border-cyan-950" id="categoria" name="categoria">
                    <option value="analisis_datos">Análisis de Datos</option>
                    <option value="diseno_web">Diseño Web</option>
                    <option value="ux_ui">UX/UI</option>
                    <option value="frontend">Front-end</option>
                    <option value="backend">Back-end</option>
                 </select>
            </div>
            <div class="flex items-start flex-col w-full mt-4">
                <label class="mb-3" for="descripcion">Descripción</label>
                <textarea class="w-full block py-2 px-2 border resize-none rounded border-cyan-950" cols="30" rows="5" name="descripcion" id="descripcion">{{$servicios->descripcion}}</textarea>
                @error('descripcion')
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
            <div class="flex items-start flex-col w-full mt-4">
                <label class="mb-3" for="clases">Clases</label>
                <input  class="w-full block py-2 px-2 border rounded border-cyan-950" value="{{$servicios->clases}}" type="number" id="clases" name="clases" />
                @error('clases')
                    <span class="flex w-full bg-red-500 text-white p-5">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex items-start flex-col w-full mt-4">
                <label class="mb-3" for="precio">Precio</label>
                <input value="{{$servicios->precio}}"  class="w-full block py-2 px-2 border rounded border-cyan-950" type="number" id="precio" name="precio" />
                @error('precio')
                    <span class="flex w-full bg-red-500 text-white p-5">{{ $message }}</span>
                @enderror
            </div>

            <button class="bg-cyan-950 rounded py-2 mt-4 px-5 text-white" type="submit">Enviar</button>
        </form>
    </div>
</section>

@endsection
