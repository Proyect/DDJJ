<?php

namespace App\Http\Controllers;

use App\Models\Cestado;
use Illuminate\Http\Request;

class CestadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $cestados = Cestado::where('idAdmin', auth()->user()->id)
                //->latest() // Ordena de manera DESC por el campo "created_at"                
                ->get(); // Convierte los datos extraidos de la BD en un Array                
        
        $cestados= Cestado::where('estado', 'Habilitado')
                ->latest() // Ordena de manera DESC por el campo "created_at"
                ->get();
       
        $cestado=Cestado::get();
        return view('panel.admin.lista_cestados.index', compact('cestados'));  
                   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cestado= new Cestado();       
        return view('panel.admin.lista_cestados.create', compact('cestado')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {  
        $cestado = new Cestado();
        $cestado->nombre = $request->get('nombre');
        $cestado->idAdmin = auth()->user()->id;
        $cestado->estado = 'Habilitado';

        $cestado->save();

       // Cestado::create($request->all());
        return redirect()
                ->route('cestado.index')
                ->with('alert', 'Estado Civil "' . $cestado->nombre . '" Agregado Exitosamente.');     
    }

    /**
     * Display the specified resource.
     */
    public function show(Cestado $cestado)    {
       
        return view('panel.admin.lista_cestados.show', compact('cestado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cestado $cestado) 
   {

        return view('panel.admin.lista_cestados.edit', compact('cestado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cestado $cestado)
    {
        $cestado->nombre = $request->get('nombre');

        $cestado->update();
        return redirect()
            ->route('cestado.index')
            ->with('alert', 'Estado Civil Actualizado Exitosamente.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cestado $cestado)
    {
        /* $cestado->delete();
        return redirect()
                ->route('cestado.index')
                ->with('alert', 'Estado Civil eliminado exitosamente.'); */

        $cestado->estado = 'Inhabilitado';
                       
        $cestado->update();
        return redirect()
            ->route('cestado.index')
            ->with('alert', 'Estado civil eliminado exitosamente.');
    }
}
