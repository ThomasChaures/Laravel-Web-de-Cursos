<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use Illuminate\Http\Request;

class OrdenController extends Controller
{
    public function store(Request $request)
    {
  
        $orden = Orden::create([
            'user_id' => auth()->id(),
        ]);

       
        return redirect()->route('carrito')->with('feedback', ['messages' => ['Orden creada con éxito.']]);
    }
}
