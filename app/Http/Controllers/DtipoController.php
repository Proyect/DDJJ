<?php

namespace App\Http\Controllers;

use App\Models\Dtipo;
use Illuminate\Http\Request;

class DtipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $dtipos = Dtipo::where('idAdmin', auth()->user()->id)
                      ->where('estado', 'habilitado')
                //->latest() // Ordena de manera DESC por el campo "created_at"                
                ->get(); // Convierte los datos extraidos de la BD en un Array                

        return view('panel.admin.lista_dtipos.index', compact('dtipos'));  
                   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dtipo= new Dtipo();       
        return view('panel.admin.lista_dtipos.create', compact('dtipo')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {  
        $dtipo = new Dtipo();
        $dtipo->nombre = $request->get('nombre');
        $dtipo->idAdmin = auth()->user()->id;
        $dtipo->estado = 'Habilitado';

        $dtipo->save();

       // Cestado::create($request->all());
        return redirect()
                ->route('dtipo.index')
                ->with('alert', 'Tipo de Documento "' . $dtipo->nombre . '" Agregado Exitosamente.');     
    }

    /**
     * Display the specified resource.
     */
    public function show(Dtipo $dtipo)    {
       
        return view('panel.admin.lista_dtipos.show', compact('dtipo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dtipo $dtipo) 
   {

        return view('panel.admin.lista_dtipos.edit', compact('dtipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dtipo $dtipo)
    {
        $dtipo->nombre = $request->get('nombre');

        $dtipo->update();
        return redirect()
            ->route('dtipo.index')
            ->with('alert', 'Tipo de Documento Actualizado Exitosamente.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dtipo $dtipo)
    {   
        $dtipo->estado = 'Inhabilitado';
                      
        // Actualiza la info del producto en la BD
       
        $dtipo->update();
        return redirect()
            ->route('dtipo.index')
            ->with('alert', 'Tipo de documento eliminado exitosamente.');
    }
}
