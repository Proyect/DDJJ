<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Cestado;
use App\Models\User;

class CestadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //traemos los datos del agente
        $agente= User::where('id',1)->first();

        Cestado::create([
            'nombre'=>'Soltero',
            'idAdmin'=>$agente->id, //FK del agente extraído anteriormente   
            'estado'=>'Habilitado',              
        ]);

        Cestado::create([
            'nombre'=>'Casado',
            'idAdmin'=>$agente->id, //FK del agente extraído anteriormente 
            'estado'=>'Habilitado', 
        ]);

        Cestado::create([
            'nombre'=>'Viudo',
            'idAdmin'=>$agente->id, //FK del agente extraído anteriormente         
            'estado'=>'Habilitado',
        ]);

        Cestado::create([
            'nombre'=>'Divorciado',
            'idAdmin'=>$agente->id, //FK del agente extraído anteriormente         
            'estado'=>'Habilitado',
        ]);
    }
}
