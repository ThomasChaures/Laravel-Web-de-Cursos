<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicios = Servicio::all();

        return view('panel.servicios.index', compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.servicios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validaciones
            $request->validate([
                'nombre' => 'required|max:45|min:10',
                'descripcion' => 'required|max:255|min:10',
                'img' => 'required|image|max:2048',
                'precio' => 'required|numeric'
            ]);
    
            // Verificar si se ha subido un archivo
            if ($request->hasFile('img')) {
                // Generar un nombre único para la imagen
                $imagenNombre = time() . '.' . $request->img->extension();
    
                // Mover la imagen a la carpeta uploads
                $request->img->move(public_path('uploads'), $imagenNombre);
    
                // Crear el servicio
                Servicio::create([
                    'nombre' => $request->nombre,
                    'descripcion' => $request->descripcion,
                    'img' => $imagenNombre,
                    'precio' => $request->precio
                ]);
            }
    
            return back()->with('feedback', ['messages' => ['Servicio agregado con éxito']]);
    
        } catch (\Exception $e) {
            // Manejo de error y envío del mensaje a la vista
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('panel.servicios.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $servicios = Servicio::find(id);
        return view('panel.servicios.edit', compact('servicios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $servicios = Servicio::find($id);

        $request->validate([
            'nombre' => 'max:45|min:10|required',
            'descripcion' => 'max:255|min:10|required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:45',
            'precio' => 'required|numeric'
    ]);

    $servicios->update($request->all());
    return redirect()->route('panel.servicios.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $servicios = Servicio::find($id);
        $servicios->delete();
        return redirect->route('panel.servicios.index');
    }
}
