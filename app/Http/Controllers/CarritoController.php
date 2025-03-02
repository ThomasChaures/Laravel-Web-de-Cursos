<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Orden;
use App\Models\Pago;
use App\Models\CursosEnOrden;
use App\Models\CursoEnCarrito;
use App\Models\Servicio;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\CursosEnOrdenController;
use Illuminate\Http\Request;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Preference\PreferenceClient;

class CarritoController extends Controller
{
    public function obtenerCarrito()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
    
        $carrito = Carrito::where('user_id', auth()->id())
            ->with('servicios')
            ->first();
    
        $total = $carrito ? $carrito->servicios->sum('precio') : 0;
        $cartCount = $carrito ? $carrito->servicios->count() : 0;
    
        MercadoPagoConfig::setAccessToken(env('MERCADO_PAGO_ACCESS_TOKEN'));
    
        $cliente = new PreferenceClient();
    
        // Convertir los servicios a formato MercadoPago
        $items = $carrito ? $carrito->servicios->map(function ($servicio) {
            return [
                "id" => $servicio->id,
                "title" => $servicio->nombre,
                "description" => $servicio->descripcion ?? 'Sin descripción',
                "quantity" => 1, // Puedes personalizar la cantidad si es necesario
                "unit_price" => $servicio->precio
            ];
        })->toArray() : [];
    
        $preferencia = $cliente->create([
            "items" => $items,
            "statement_descriptor" => "Felatho Cursos",
            "external_reference" => "NRC001"
        ]);
    
        return view('carrito.carrito', compact('carrito', 'total', 'cartCount', 'preferencia'));
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

            $carrito = Carrito::where('user_id', auth()->id())
                ->with('servicios')
                ->first();
    
           
            if ($carrito && $carrito->servicios->isNotEmpty()) {
        
                $orden = Orden::create([
                    'user_id' => auth()->id()
                ]);

                $total = 0;
    
              
                foreach ($carrito->servicios as $servicio) {
                    CursosEnOrden::create([
                        'ordenes_id' => $orden->id,
                        'servicios_id' => $servicio->id
                    ]);
    
                    
                    $total += $servicio->precio;
    
                    $this->comprarCurso($servicio);
                }
    
               
                Pago::create([
                    'ordenes_id' => $orden->id,
                    'total' => $total,
                    'user_id' => auth()->id(),
                ]);
    
                $carrito->servicios()->detach(); 
    
           
                return redirect()->route('carrito')->with('feedback', ['messages' => ['Compra realizada con éxito.']]);
            } else {
               
                return redirect()->route('carrito')->with('feedback', ['errors' => ['El carrito está vacío.']]);
            }
        } catch (Exception $e) {
            
            return redirect()->route('carrito')->with('feedback', ['errors' => ['No se pudo procesar el pago.']]);
        }
    }
    
    public function comprarCurso($servicio)
    {
        
        $user = auth()->user();
    
        if ($servicio && !$user->servicios->contains($servicio->id)) {
          
            $user->servicios()->attach($servicio->id);
 
            $servicio->update([
                'estudiantes' => $servicio->estudiantes + 1 
            ]);
    
            return true;
        } else {
            return false;
        }
    }
    
    
}


