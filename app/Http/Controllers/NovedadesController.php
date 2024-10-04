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
        return view('panel.novedades.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'titulo' => 'required|max:45|min:10',
                'contenido' => 'required|min:10',
                'img' => 'required|image|max:2048'
            ]); 

            if($request->hasFile('img')){
                $imgNombre = time() . '.' . $request->img->extension();
                $request->img->move(public_path('uploads'), $imgNombre);

                Novedad::create([
                    'titulo' => $request->titulo,
                    'contenido' => $request->contenido,
                    'img' => $imgNombre
                ]);

                return back()->with('feedback', ['messages' => ['Novedad agregada con éxito']]);
            }
        } catch (Exception $e){
            return back()->withErrors(['error' => $e->getMessage()]);
        }
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
       $novedad = Novedad::find($id);
       return view('panel.novedades.edit', compact('novedad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $novedad = Novedad::find($id);

            $request->validate([
                'titulo' => 'required|max:45|min:10',
                'contenido' => 'required|min:10',
                'img' => 'required|image|max:2048'
            ]); 

            if($request->hasFile('img')){
                $imgNombre = time() . '.' . $request->img->extension();
                $request->img->move(public_path('uploads'), $imgNombre);

                $novedad->update([
                    'titulo' => $request->titulo,
                    'contenido' => $request->contenido,
                    'img' => $imgNombre
                ]);

                return back()->with('feedback', ['messages' => ['Novedad editada con éxito']]);
            }else{
                $novedad->update([
                    'titulo' => $request->titulo,
                    'contenido' => $request->contenido,
                ]);
            }
        } catch (Exception $e){
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $novedad = Novedad::find($id);
      $novedad->delete();
      return redirect()->route('novedades.index');
    }
}
