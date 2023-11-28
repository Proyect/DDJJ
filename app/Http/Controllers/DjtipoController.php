<?php

namespace App\Http\Controllers;

use App\Models\Djtipo;
use Illuminate\Http\Request;

class DjtipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $djtipos = Djtipo::where('idAdmin', auth()->user()->id)
                        ->where('estado', 'habilitado')
                //->latest() // Ordena de manera DESC por el campo "created_at"                
                ->get(); // Convierte los datos extraidos de la BD en un Array                

      
        $djtipos=Djtipo::get();
        return view('panel.admin.lista_djtipos.index', compact('djtipos'));  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $djtipo = new Djtipo();
        $djtipo->nombre = $request->get('nombre');
        $djtipo->idAdmin = auth()->user()->id;
        $djtipo->estado = 'Habilitado';

        $djtipo->save();

       // Cestado::create($request->all());
        return redirect()
                ->route('dtipo.index')
                ->with('alert', 'Tipo de DDJJ "' . $djtipo->nombre . '" Agregado Exitosamente.');     
    }

    /**
     * Display the specified resource.
     */
    public function show(Djtipo $djtipo)
    {
        return view('panel.admin.lista_djtipos.show', compact('djtipo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Djtipo $djtipo)
    {
        return view('panel.admin.lista_djtipos.edit', compact('djtipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Djtipo $djtipo)
    {
        $djtipo->nombre = $request->get('nombre');

        $djtipo->update();
        return redirect()
            ->route('djtipo.index')
            ->with('alert', 'Tipo de DDJJ Actualizado Exitosamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Djtipo $djtipo)
    {
        $djtipo->estado = 'Inhabilitado';
                      
        // Actualiza la info del producto en la BD
       
        $djtipo->update();
        return redirect()
            ->route('djtipo.index')
            ->with('alert', 'Tipo de documento eliminado exitosamente.');
    
    }
}
