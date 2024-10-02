@extends('panel.layout.panel')
@section('title', 'Agregar curso')

@section('content')

<section class="p-6 bg-gray-50">
    <h1 class="font-semibold text-cyan-950 text-4xl mb-4">Agregar curso</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('feedback'))
    <div class="alert alert-success">
        <ul>
            @foreach (session('feedback')['messages'] as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <div class="mt-10"> 
    <form  class="flex flex-col w-[300px] item-start justify-start" action="{{ route('servicios.store') }}" method="POST" enctype="multipart/form-data">

            @csrf 
            <div>
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" />
            </div>
            <div>
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion"></textarea>
            </div>
            <div>
                <label for="img">Imagen</label>
                <input type="file" id="img" name="img" />
            </div>
            <div>
                <label for="precio">Precio</label>
                <input type="number" id="precio" name="precio" />
            </div>

            <button type="submit">Enviar</button>
        </form>
    </div>
</section>

@endsection
