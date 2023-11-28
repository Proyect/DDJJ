<?php

namespace App\Http\Controllers;

use App\Models\Ddjj;
use App\Models\Obien;
use Illuminate\Http\Request;

class ObienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obiens = Obien::where('idFunc', auth()->user()->id) 
                            ->latest() // Ordena de manera DESC por el campo "created_at"
                            ->get(); // Convierte los datos extraidos de la BD en un Array
                            with('ddjj');
        // Retornamos una vista y enviamos la variable "funcionarios"
        $obiens = Obien::where('estado', 'habilitado')
                            ->latest()
                            ->get();
        return $obiens;
        return view('panel.funcionario.carga_obienes.index', compact('obienes'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Obien $obien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Obien $obien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Obien $obien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Obien $obien)
    {
        $obien->update();
        return redirect()
            ->route('obien.index')
            ->with('alert', 'Bienes eliminados correctamente.');
    }
}
