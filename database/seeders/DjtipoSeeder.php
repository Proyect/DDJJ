<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
//use App\Models\Ddjj;
use App\Models\Djtipo;

class DjtipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agente= User::where('id',1)->first();

        Djtipo::create([
            'nombre'=>'Inicio',
            'idAdmin'=>$agente->id, //FK del agente extraído anteriormente            
            'estado'=>'Habilitado',
        ]);

        Djtipo::create([
            'nombre'=>'Cese',
            'idAdmin'=>$agente->id,           
            'estado'=>'Habilitado',
        ]);

        Djtipo::create([
            'nombre'=>'Cese e Inicio',
            'idAdmin'=>$agente->id,           
            'estado'=>'Habilitado',
        ]);

        Djtipo::create([
            'nombre'=>'Actualización',
            'idAdmin'=>$agente->id,           
            'estado'=>'Habilitado',
        ]);

    }
}
