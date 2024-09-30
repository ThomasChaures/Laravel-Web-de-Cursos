@extends('layout.app')
   @section('title', 'Registro')


    @section('content')


    <h1>Registro</h1>

    <form action="{{ route('auth.newAccount')}}" method="post">
    @csrf

<!-- Mostrar los errores de validación -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
        <div class="mb-3" >
            <label for="name"> Nombre </label>
            <input type="text" name="name" id="name" class="form-control">
        </div> 
        <div class="mb-3" >
            <label for="email"> Email </label>
            <input type="email" name="email" id="email" class="form-control">
        </div>  
        <div class="mb-3">
            <label for="password"> Password </label>
            <input type="password" name="password" id="password" class="form-control">
        </div>  
        <div class="mb-3">
            <label for="password_confirmation"> Password </label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
        </div>  
        <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>

    @endsection
