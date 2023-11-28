<?php

namespace Database\Seeders;

use App\Models\Dtipo;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DtipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //traemos los datos del agente
        $agente= User::where('id',1)->first();

        Dtipo::create([
            'nombre'=>'DNI',
            'idAdmin'=>$agente->id, //FK del agente extraído anteriormente            
            'estado'=>'Habilitado',
        ]);

        Dtipo::create([
            'nombre'=>'LE',
            'idAdmin'=>$agente->id, //FK del agente extraído anteriormente         
            'estado'=>'Habilitado',
        ]);

        Dtipo::create([
            'nombre'=>'LC',
            'idAdmin'=>$agente->id, //FK del agente extraído anteriormente         
            'estado'=>'Habilitado',
        ]);

        Dtipo::create([
            'nombre'=>'Pasaporte',
            'idAdmin'=>$agente->id, //FK del agente extraído anteriormente         
            'estado'=>'Habilitado',
        ]);
    }
}
