<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Orden;
use App\Models\Pago;
use App\Models\CursosEnOrden;
use App\Models\CursoEnCarrito;
use App\Models\Servicio;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\CursosEnOrdenController;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function obtenerCarrito()
    {
        $carrito = Carrito::where('user_id', auth()->id())
        ->with('servicios')
        ->first();

        $total = $carrito->servicios->sum('precio');

        return view('carrito.carrito', compact('carrito', 'total'));
    }

    public function eliminarDelCarrito(string $id){
       try{
        $carrito = Carrito::where('user_id', auth()->id())
        ->with('servicios')
        ->first();

        $curso = $carrito->servicios()->find($id);
        
        if ($curso) {
            $carrito->servicios()->detach($id);
        }

        return redirect()->route('carrito')->with('feedback', ['messages' => ['Curso eliminado con exito.']]);
       }catch(Exception $e){
        return redirect()->route('carrito')->with('feedback', ['errors' => ['No se pudo eliminar el curso del carrito.']]);;
       }
    }
    public function pagarCarrito()
    {
        try {
            // Obtener el carrito del usuario autenticado
            $carrito = Carrito::where('user_id', auth()->id())
                ->with('servicios')
                ->first();
    
            // Verificar que el carrito no esté vacío
            if ($carrito && $carrito->servicios->isNotEmpty()) {
                // Crear una nueva orden para el usuario
                $orden = Orden::create([
                    'user_id' => auth()->id()
                ]);
    
                // Calcular el total de los servicios en el carrito
                $total = 0;
    
                // Asociar cada servicio del carrito a la orden y calcular el total
                foreach ($carrito->servicios as $servicio) {
                    CursosEnOrden::create([
                        'ordenes_id' => $orden->id,
                        'servicios_id' => $servicio->id
                    ]);
    
                    // Sumar el precio del servicio al total
                    $total += $servicio->precio;
    
                    // Opcional: actualizar la cantidad de estudiantes del curso
                    $servicio->increment('estudiantes');
                }
    
                // Crear un pago asociado a la orden
                Pago::create([
                    'ordenes_id' => $orden->id,
                    'total' => $total,
                    'user_id' => auth()->id(),
                ]);
    
                // Vaciar el carrito del usuario
                $carrito->servicios()->detach(); // Eliminar los servicios del carrito
    
                // Redirigir con un mensaje de éxito
                return redirect()->route('carrito')->with('feedback', ['messages' => ['Compra realizada con éxito.']]);
            } else {
                // Mensaje si el carrito está vacío
                return redirect()->route('carrito')->with('feedback', ['errors' => ['El carrito está vacío.']]);
            }
        } catch (Exception $e) {
            // Mensaje en caso de error
            return redirect()->route('carrito')->with('feedback', ['errors' => ['No se pudo procesar el pago.']]);
        }
    }
    
    
    
    

    
}


