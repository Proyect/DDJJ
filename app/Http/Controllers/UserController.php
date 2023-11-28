<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users =User::where('enabled', '1') 
                 /* User::where('idAgente', auth()->user()->id) 
                ->where('estado', 'habilitado')   */                 
                /* ->with('funcionario') */
       
                ->latest() // Ordena de manera DESC por el campo "created_at"
                ->get(); // Convierte los datos extraidos de la BD en un Array


                //return $user;
                
        return view('panel.admin.lista_usuarios.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user= new User();       
        return view('panel.admin.lista_usuarios.create', compact('user')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->get('nombre');
        $user->email = $request->get('email');
        $user->password='12345678';
        $user->enabled = '1';

        $user->save();

       // Cestado::create($request->all());
        return redirect()
                ->route('usuario.index')
                ->with('alert', 'Usuario "' . $user->nombre . '" Agregado Exitosamente.');  
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('panel.admin.lista_usuarios.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->get('nombre');

        $user->update();
        return redirect()
            ->route('usuario.index')
            ->with('alert', 'Usuario Actualizado Exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {   return $user;
        $user->enabled = '0';
                            
        $user->update();
        return redirect()
            ->route('usuario.index')
            ->with('alert', 'Usuario eliminado exitosamente.');
    }
}
