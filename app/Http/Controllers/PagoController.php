<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Orden;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function store(Request $request, $ordenId)
    {
        // Buscar la orden que corresponde con el ID recibido
        $orden = Orden::findOrFail($ordenId);

        // Crear el pago y asociarlo a la orden
        $pago = Pago::create([
            'ordenes_id' => $orden->id,
            'total' => $orden->servicios->sum('precio'), // Suponiendo que los servicios tienen un campo 'precio'
            'status' => 'pagado',
        ]);

        // Realizar cualquier lógica adicional, como actualizar el carrito o notificar al usuario

        return redirect()->route('carrito')->with('feedback', ['messages' => ['Pago realizado con éxito.']]);
    }
}
