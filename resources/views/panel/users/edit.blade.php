@extends('panel.layout.panel')
@section('title', 'Actualizar usuario')

@section('content')
<section class="p-6 bg-gray-50">
    <h1 class="font-semibold text-cyan-950 text-4xl mb-4">Editar usuario</h1>
    <a class="h-[40px] flex justify-center items-center w-[200px] mt-4 px-5 bg-cyan-950 text-white rounded" href="{{route('usuarios.index')}}">Voler al listado</a>
    <div class="mt-10"> 
    <form  class="flex flex-col w-[600px] item-start justify-start" action="{{ route('usuarios.update', $usuario->id) }}" method="POST">

            @csrf 
            @method('PUT')
            <div class="flex items-start flex-col w-full mt-4">
                <label class="mb-3" for="name">Nombre</label>
                <input class="w-full block py-2 px-2 border rounded border-cyan-950" value="{{$usuario->name}}"  type="text" id="name" name="name" />
                
                @error('name')
                    <span class="flex w-full bg-red-500 text-white p-5">{{ $message }}</span>
                @enderror
                
            </div>
            <div class="flex items-start flex-col w-full mt-4">
                <label class="mb-3" for="email">Email</label>
                <input class="w-full block py-2 px-2 border rounded border-cyan-950" value="{{$usuario->email}}" type="email" id="email" name="email" />
                
                @error('email')
                    <span class="flex w-full bg-red-500 text-white p-5">{{ $message }}</span>
                @enderror
            
            </div>


            <div class="flex items-start flex-col w-full mt-4">
            <label for="password" class="mb-3">Contraseña nueva</label>
            <input id="password" name="password" type="password" 
                   class="w-full block py-2 px-2 border rounded border-cyan-950">
            @error('password')
            <span class="flex w-full bg-red-500 text-white p-5">{{ $message }}</span>
            @enderror
             </div>

                
            <div class="flex items-start flex-col w-full mt-4">
            <label for="password_confirmation"  class="mb-3">Repite la Contraseña nueva</label>
            <input id="password_confirmation" name="password_confirmation" type="password" 
            class="w-full block py-2 px-2 border rounded border-cyan-950">
            </div>

            <div class="flex items-start flex-col w-full mt-4">
            <label class="mb-3" for="role_id">Rol</label>
            <select class="w-full block py-2 px-2 border rounded border-cyan-950" id="role_id" name="role_id">
            <option value="1" >Admin</option>
            <option value="2" >Usuario</option>

            </select>

            </div>


            <button class="bg-cyan-950 rounded py-2 mt-4 px-5 text-white" type="submit">Enviar</button>
        </form>
    </div>
</section>


@endsection