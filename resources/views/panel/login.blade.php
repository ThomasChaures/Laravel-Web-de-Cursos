@extends('panel.layout.panel')
@section('title', 'Iniciar Sesion')

@section('content')
    <section class="container w-[30%]"> 
        <h1 class="font-semibold text-cyan-950 text-4xl mb-4">Iniciar sesion</h1>
            <form action="{{route('admin.auth')}}" method="post">
                @csrf
               
                <div class="flex items-start flex-col w-full mt-4">
                <label class="mb-3" for="email">Email</label>
                <input class="w-full block py-2 px-2 border rounded border-cyan-950" value="{{old('email')}}"  type="email" id="email" name="email" />
                
                @error('email')
                    <span class="flex w-full bg-red-500 text-white p-5">{{ $message }}</span>
                @enderror
                </div>

                <div class="flex items-start flex-col w-full mt-4">
                <label class="mb-3" for="password">Contraseña</label>
                <input class="w-full block py-2 px-2 border rounded border-cyan-950" value="{{old('password')}}"  type="text" id="password" name="password" />
                
                @error('password')
                    <span class="flex w-full bg-red-500 text-white p-5">{{ $message }}</span>
                @enderror
                </div>

                <button class="bg-cyan-950 rounded py-2 mt-4 px-5 text-white"  type="submit">Ingresar</button>
            </form>
    </section>
@endsection