<?php

namespace App\Http\Controllers;

use App\Models\Ddjj;
use App\Models\Funcionario;
use App\Models\Djtipo;
use App\Models\Cestado;

use Illuminate\Http\Request;

class DdjjController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {        
    
        $ddjjs = Ddjj::where('idAgente', auth()->user()->id) 
                    ->where('estado', 'habilitado')                   
                    ->with('funcionario')
                   
                            ->latest() // Ordena de manera DESC por el campo "created_at"
                            ->get(); // Convierte los datos extraidos de la BD en un Array
        
       
       

       /*  $ddjjs = Ddjj::where('idAgente', auth()->user()->id) 
                    ->where('vencida', 'Si')                   
                    ->with('funcionario')
                   
                            ->latest() // Ordena de manera DESC por el campo "created_at"
                            ->get(); // Convierte los datos extraidos de la BD en un Array */



         
        return view('panel.agente.lista_ddjj.index', compact('ddjjs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Creamos un Funcionario nuevo para cargarle datos
        $ddjj= new Ddjj();
        
       /* 
       
        // Retornamos la vista de creacion de funcionarios, enviamos el funcionario 
        return view('panel.agente.lista_funcionarios.create', compact('funcionario', 'cestados', 'dtipos')); 
       */

       $funcionarios=Funcionario::get();
       $djtipos=Djtipo::get();
        return view('panel.agente.lista_ddjj.create',  compact('ddjj','djtipos','funcionarios'))/* compact('ddjj', 'funcionario')) */; 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Funcionario $funcionario)
    {
        $ddjj = new Ddjj();
        
        /* $ddjj->idAgente = auth()->user()->id;
        $ddjj->idEstCivil = $request->get('idEstCivil');
        $ddjj->conyuge = $request->get('conyuge');
        $ddjj->numInstr = $request->get('numInstr');
        $ddjj->tipoDDJJ = $request->get('tipoDDJJ');
        $ddjj->cargo = $request->get('cargo');
        $ddjj->organismo = $request->get('organismo');
        $ddjj->domLab = $request->get('domLab');
        $ddjj->domPart = $request->get('domPart');
        $ddjj->telLab = $request->get('telLab');
        $ddjj->cel = $request->get('cel'); 
        $ddjj->estadoCarga = $request->get('estadoCarga'); 
        $ddjj->obligado = $request->get('obligado');
        $ddjj->observacionesDJ = $request->get('observacionesDJ');  
        $ddjj->estado = 'Habilitado'; */

        $ddjj->idAgente = auth()->user()->id;
        //$ddjj->idFunc = $funcionario->id;
        $ddjj->idFunc = $request->get('funcionario');
        $ddjj->idEstCivil = '1';
        $ddjj->conyuge = '';
        $ddjj->numInstr = $request->get('numInstr');
        $ddjj->fchInstr=$request->get('fchInstr');
        $ddjj->idTipoDDJJ = $request->get('tipoDDJJ');
        $ddjj->cargo = $request->get('cargo');
        $ddjj->organismo = $request->get('organismo');
        $ddjj->domLab = $request->get('domLab');
        $ddjj->domPart = '';
        $ddjj->telLab = '';
        $ddjj->cel = '';
        $ddjj->estadoCarga = 'Nueva'; 
        $ddjj->obligado = $request->get('obligado');
        $ddjj->observacionesDJ = $request->get('observacionesDJ');  
        $ddjj->estado = 'Habilitado';
        $ddjj->vencida = 'No';


        $ddjj->save();
        return redirect()
            ->route('ddjj.index')
            ->with('alert', 'DDJJ Agregada Exitosamente.');
                
    }

    /**
     * Display the specified resource.
     */
    public function show(Ddjj $ddjj)
    {
       
        //$ddjj= Ddjj::with('funcionario')->get(); 
        //return $ddjj;
        $cestados= Cestado::get(); 
        return view('panel.agente.lista_ddjj.show', compact('ddjj', 'cestados'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ddjj $ddjj)
    {
        $funcionario=Funcionario::get();
       $djtipos=Djtipo::get();

        return view('panel.agente.lista_ddjj.edit', compact('ddjj', 'funcionario','djtipos'));
/* } */
    }

    /**
     * Update the specified resource in storage.
     */

     //public function update(Request $request, Cestado $cestado)
    public function update(Request $request, Ddjj $ddjj)
    {   //return $request;
        $ddjj->idAgente = auth()->user()->id;
        //$ddjj->idFunc = $funcionario->id;
        $ddjj->idFunc = $request->get('idFunc');
        $ddjj->idEstCivil = '1';
        $ddjj->conyuge = '';
        $ddjj->numInstr = $request->get('numInstr');
        $ddjj->fchInstr=$request->get('fchInstr');
        $ddjj->idTipoDDJJ = $request->get('tipoDDJJ');
        $ddjj->cargo = $request->get('cargo');
        $ddjj->organismo = $request->get('organismo');
        $ddjj->domLab = $request->get('domLab');
        $ddjj->domPart = '';
        $ddjj->telLab = '';
        $ddjj->cel = '';
        $ddjj->estadoCarga = 'Nueva'; 
        $ddjj->obligado = $request->get('obligado');
        $ddjj->observacionesDJ = $request->get('observacionesDJ');  
        $ddjj->estado = 'Habilitado';
        $ddjj->vencida = 'No';   
     

        
        $ddjj->update();
        return redirect()
            ->route('ddjj.index')
            ->with('alert', 'DDJJ Actualizada Exitosamente.');        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ddjj $ddjj)
    {
        $ddjj->estado = 'Inhabilitado';
                      
        // Actualiza la info del producto en la BD
       
        $ddjj->update();
        return redirect()
            ->route('ddjj.index')
            ->with('alert', 'Declaración Jurada eliminada exitosamente.');
    }

    public function vencidas(){
        $vencidas = Ddjj::where('idAgente', auth()->user()->id) 
                    ->where('vencida', 'Si')                   
                    ->with('funcionario')
                   
                            ->latest() // Ordena de manera DESC por el campo "created_at"
                            ->get(); // Convierte los datos extraidos de la BD en un Array
        
       
        //return $ddjjs;              
        return view('panel.agente.lista_ddjj.vencidas', compact('vencidas'));
        //return $ddjjs;

        
    }
}
