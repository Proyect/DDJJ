<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;

use App\Models\Funcionario;
use App\Models\Cestado;
use App\Models\Dtipo;
use App\Models\Ddjj;

class PDFController extends Controller
{
    
    public function generatePDF(){
        
        //$funcionarios=Funcionario::get();
        $funcionarios= Funcionario::where('estado', 'habilitado')
                            ->latest() // Ordena de manera DESC por el campo "created_at"
                            ->get();
                            
        $data = [
            'title' => 'Listado de Funcionarios',
            'heading' => 'Datos Personales',          
                            

            'funcionarios'=>$funcionarios

        ];

        /* $funcionarios = Ddjj::where('idAgente', auth()->user()->id) 
        ->where('vencida', 'Si')                   
        ->with('funcionario')
       
                ->latest() // Ordena de manera DESC por el campo "created_at"
                ->get(); // Convierte los datos extraidos de la BD en un Array
                            
        $data = [
            'title' => 'Listado de Funcionarios Incumplientes',
            'date' => date('m/d/Y'),
            'heading' => 'Datos Personales',          
                            

           'funcionarios'=>$funcionarios
        ]; */

        $pdf = PDF::loadView('myPDF', $data);
     
        return $pdf->download('listaFuncionarios.pdf');
    }
}