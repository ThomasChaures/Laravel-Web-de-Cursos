<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Orden;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function store(Request $request, $ordenId)
    {
        
        $orden = Orden::findOrFail($ordenId);

        
        $pago = Pago::create([
            'ordenes_id' => $orden->id,
            'total' => $orden->servicios->sum('precio'),
        ]);

       

        return redirect()->route('carrito')->with('feedback', ['messages' => ['Pago realizado con éxito.']]);
    }
}
