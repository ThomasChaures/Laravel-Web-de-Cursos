@extends('panel.layout.panel')
@section('title', 'Agregar curso')

@section('content')

<section class="p-6 bg-gray-50">
    <h1 class="font-semibold text-cyan-950 text-4xl mb-4">Agregar curso</h1>

    @if ($errors->any())
    <div class="flex w-full bg-red-500 text-white p-5">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <div class="mt-10"> 
    <form  class="flex flex-col w-[600px] item-start justify-start" action="{{ route('servicios.store') }}" method="POST" enctype="multipart/form-data">

            @csrf 
            <div class="flex items-start flex-col w-full mt-4">
                <label class="mb-3" for="nombre">Nombre</label>
                <input class="w-full block py-2 px-2 border rounded border-cyan-950"  required  type="text" id="nombre" name="nombre" />
            </div>
            <div class="flex items-start flex-col w-full mt-4">
                <label class="mb-3" for="descripcion">Descripción</label>
                <textarea   required class="w-full block py-2 px-2 border resize-none rounded border-cyan-950" cols="30" rows="5" name="descripcion" id="descripcion"></textarea>
            </div>
            <div class="flex items-start flex-col w-full mt-4">
                <label class="mb-3" for="img">Imagen</label>
                <input type="file" required  class="w-full block py-2 px-2 border rounded border-cyan-950" id="img" name="img" />
            </div>
            <div class="flex items-start flex-col w-full mt-4">
                <label class="mb-3" for="precio">Precio</label>
                <input  required  class="w-full block py-2 px-2 border rounded border-cyan-950" type="number" id="precio" name="precio" />
            </div>

            <button class="bg-cyan-950 rounded py-2 mt-4 px-5 text-white" type="submit">Enviar</button>
        </form>
    </div>
</section>

@endsection
