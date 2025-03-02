@extends('layout.app')

@section('title', 'Éxito')

@section('content')
<div class=" flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="text-center p-6 bg-green-500">
            <i class="fas fa-check-circle text-white text-6xl"></i>
        </div>
        
        <div class="p-6">
            <h2 class="mt-2 text-center text-3xl font-extrabold text-gray-900">
                ¡Operación Exitosa!
            </h2>
            
            <p class="mt-4 text-center text-lg text-gray-600">
                Tu transacción ha sido procesada correctamente.
            </p>
            
            <div class="mt-8 space-y-4">
                <a href="{{ route('home') }}" class="group w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <i class="fas fa-home mr-2"></i>
                    Volver al Inicio
                </a>
                
                <a href="{{ route('perfil') }}" class="group w-full flex justify-center py-3 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-indigo-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <i class="fas fa-user mr-2"></i>
                    Ir a mi Perfil
                </a>
            </div>
        </div>
        
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 text-center text-sm text-gray-600">
            <p>¿Necesitas ayuda? <a href="#" class="text-indigo-600 hover:text-indigo-500">Contacta con soporte</a></p>
        </div>
    </div>
</div>
@endsection