<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\CursosEnOrden;
use App\Models\Servicio;

class OrdenController extends Controller
{
    public function store(Request $request)
    {
  
        $orden = Orden::create([
            'user_id' => auth()->id(),
        ]);

       
        return redirect()->route('carrito')->with('feedback', ['messages' => ['Orden creada con éxito.']]);
    }

    public function index($userId)
    {
        $user = User::find($userId);
        $ordenes = Orden::with('pagos')->where('user_id', $user->id)->get();
    
        return view('panel.ordenes.index', compact('user', 'ordenes'));
    }
    
    public function show($userId, $ordenId)
    {
        $user = User::find($userId);
        $orden = Orden::with(['pagos', 'cursosEnOrden'])->where('user_id', $user->id)->where('id', $ordenId)->first();
    
        if (!$orden) {
            // Manejo de error si no se encuentra la orden
            return redirect()->route('panel.ordenes.index', $userId)->with('feedback', ['errors' => ['Orden no encontrada.']]);
        }
    
        return view('panel.ordenes.show', compact('user', 'orden'));
    }
    
    }


