<?php

namespace App\Http\Controllers;

//use App\Models\Domicilio;
use App\Models\Funcionario;
use App\Models\Cestado;
use App\Models\Dtipo;
use Illuminate\Http\Request;


class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $funcionarios = Funcionario::where('idAgente', auth()->user()->id) 
                                      ->where('estado', 'habilitado')
                            ->latest() // Ordena de manera DESC por el campo "created_at"
                            ->get(); // Convierte los datos extraidos de la BD en un Array
        
       

        // Retornamos una vista y enviamos la variable "funcionarios"
        /* $funcionarios= Funcionario::where('estado', 'habilitado')
                            ->latest() // Ordena de manera DESC por el campo "created_at"
                            ->get(); */

        
        /*
            $flights = Flight::where('active', 1)
               ->orderBy('name')
               ->take(10)
               ->get();

        */       
        
        return view('panel.agente.lista_funcionarios.index', compact('funcionarios'));
    }
    


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Creamos un Funcionario nuevo para cargarle datos
        $funcionario= new Funcionario();
        
        $cestados= Cestado::get(); 
        $dtipos= Dtipo::get(); 

        // Retornamos la vista de creacion de funcionarios, enviamos el funcionario 
        return view('panel.agente.lista_funcionarios.create', compact('funcionario', 'cestados', 'dtipos')); 
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // return $request;

        $funcionario = new Funcionario();
        $funcionario->nombre = $request->get('nombre');
        $funcionario->apellido = $request->get('apellido');
        $funcionario->idTipoDoc = $request->get('idTipoDoc');
        $funcionario->numDoc = $request->get('numDoc');
        $funcionario->genero = 'Femenino'; /* $request->get('genero'); */
        $funcionario->genero =  $request->get('genero');
        $funcionario->observacionesF = $request->get('observacionesF');
        $funcionario->idAgente = auth()->user()->id;
        $funcionario->estado = 'Habilitado';

        //Estos datos deben ser cargados por el funcionario
        /* 
        $funcionario->idEstCivil = $request->get('idEstCivil');
        $funcionario->conyuge = $request->get('conyuge');
        $funcionario->tel = $request->get('tel');
        $funcionario->cel = $request->get('cel');        
        $funcionario->idDom = $request->get('idDom');
        

        $funcionario->idEstCivil = '1';
        $funcionario->conyuge = 'Null';
        $funcionario->tel = '0';
        $funcionario->cel = '0';       */  
        //$funcionario->idDom = '1';

       //$funcionario->fchReg = $request->get('fchReg');
        
        
       // Funcionario::create($request->all());

        // Almacena la info del producto en la BD
        $funcionario->save();
        return redirect()
        ->route('funcionario.index')
        ->with('alert', 'Funcionario "' . $funcionario->nombre . '" Agregado Exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Funcionario $funcionario)
    {
       // $domicilio= Domicilio::get();         
        $estadoCiv= Cestado::get(); 
        $tipoDoc= Dtipo::get(); 

        return view('panel.agente.lista_funcionarios.show', compact('funcionario','estadoCiv', 'tipoDoc'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Funcionario $funcionario)
    {
       // $domicilio= Domicilio::get();         
        $cestados= Cestado::get(); 
        $dtipos= Dtipo::get(); 

        return view('panel.agente.lista_funcionarios.edit', compact('funcionario','cestados', 'dtipos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Funcionario $funcionario)
    {
        //$funcionario = new Funcionario();
        
        //$funcionario = new Funcionario();
        $funcionario->nombre = $request->get('nombre');
        $funcionario->apellido = $request->get('apellido');
        $funcionario->idTipoDoc = $request->get('idTipoDoc');
        $funcionario->numDoc = $request->get('numDoc');
        $funcionario->observacionesF = $request->get('observacionesF');
        $funcionario->idAgente = auth()->user()->id;
        $funcionario->estado = 'Habilitado';

        /*
        if ($request->hasFile('imagen')) {      
        // Subida de la imagen nueva al servidor
        $image_url = $request->file('imagen')->store('public/producto');
        $producto->imagen = asset(str_replace('public', 'storage', $image_url));
        }
        // Actualiza la info del producto en la BD
       */

        $funcionario->update();
        return redirect()
            ->route('funcionario.index')
            ->with('alert', 'Funcionario Actualizado Exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    

    /*
     public function destroy(Funcionario $funcionario)
    {        
        //$funcionario->delete();
        return redirect()
        ->route('funcionario.index')
        ->with('alert', 'Funcionario eliminado exitosamente.');
    }
    */
    public function destroy(Request $request, Funcionario $funcionario)
    {        
        $funcionario->estado = 'Inhabilitado';
                      
        // Actualiza la info del producto en la BD
       
        $funcionario->update();
        return redirect()
            ->route('funcionario.index')
            ->with('alert', 'Funcionario eliminado exitosamente.');
    }

    public function eliminados()
    {
        $funcionarios = Funcionario::where('idAgente', auth()->user()->id) 
                                      ->where('estado', 'inhabilitado')
                            ->latest() // Ordena de manera DESC por el campo "created_at"
                            ->get(); // Convierte los datos extraidos de la BD en un Array
               
        return view('panel.agente.lista_funcionarios.eliminados', compact('funcionarios'));
    }
    


    public function reestablecer(Request $request, Funcionario $funcionario)
    {        
        $funcionario->estado = 'Habilitado';
                      
        // Actualiza la info del producto en la BD
       
        $funcionario->update();
        return redirect()
            ->route('funcionario.index')
            ->with('alert', 'Funcionario reestablecido exitosamente.');
    }


}
