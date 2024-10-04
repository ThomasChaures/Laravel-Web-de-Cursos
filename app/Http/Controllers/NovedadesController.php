<?php

namespace App\Http\Controllers;

use App\Models\Novedad;

use Illuminate\Http\Request;

class NovedadesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $novedades = Novedad::all();
        return view('panel.novedades.index', compact('novedades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $novedades = Novedad::find($id);
        return view('panel.novedades.show', compact('novedades'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
