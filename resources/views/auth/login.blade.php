@extends('layout.app')
@section('title', 'Iniciar-sesion')

@section('content')

<section class="container mx-auto">
<h1 class="text-2xl font-bold p-8 mb-4">Iniciar Sesion</h1>

<form action="{{ route('auth.authenticate') }}" method="post" class="bg-white rounded px-8 pt-6 pb-8 mb-4">
    @csrf 
    <div class="mb-4">
        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
        <input type="email" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
    </div>  
    <div class="mb-4">
        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
        <input type="password" name="password" id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
    </div>  
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Ingresar</button>
</form>
</section>

@endsection

