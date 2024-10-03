@extends('layout.app')
   @section('title', 'Iniciar-sesion')


    @section('content')

    <h1>Iniciar Sesion</h1>

    <form action="{{ route('auth.authenticate')}}" method="post">
        @csrf 
        <div class="mb-3" >
            <label for="email"> Email </label>
            <input type="email" name="email" id="email" class="form-control">
        </div>  
        <div class="mb-3">
            <label for="password"> Password </label>
            <input type="password" name="password" id="password" class="form-control">
        </div>  
        <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>

    @endsection
