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
        return view('servicios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
                'nombre' => 'max:45|min:10|required',
                'descripcion' => 'max:255|min:10|required',
                'img' => 'required',
                'precio' => 'required|numeric'
        ]);

    //    if($request->hasFile('img')) {
            // $imagenNombre = time().'.'.$request->img->extension();

           // $request->img->move(public_path('uploads'), $imagenNombre);


            Servicio::create([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'img' => $request->img,
                'precio' => $request->precio
            ]);
    //    }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('servicios.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $servicios = Servicio::find(id);
        return view('servicios.edit', compact('servicios'));
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
    return redirect()->route('servicios.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $servicios = Servicio::find($id);
        $servicios->delete();
        return redirect->route('articulos.index');
    }
}
