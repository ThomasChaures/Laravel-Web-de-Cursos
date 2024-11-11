<?php

namespace App\Http\Controllers;

use App\Models\CursosEnOrden;
use Illuminate\Http\Request;

class CursosEnOrdenController extends Controller
{
    public function store(Request $request, $ordenId, $cursoId)
    {
        // Asociar el curso a la orden
        CursosEnOrden::create([
            'ordenes_id' => $ordenId,
            'servicios_id' => $cursoId,
        ]);

        return response()->json(['message' => 'Curso añadido a la orden.']);
    }
}
