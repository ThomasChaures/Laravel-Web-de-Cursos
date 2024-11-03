<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\CursoEnCarrito;
use App\Models\Servicio;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function obtenerCarrito()
    {
        $carrito = Carrito::where('user_id', auth()->id())
        ->with('servicios.servicio')
        ->first();

        return view('welcome', compact('carrito'));
    }

    
}
