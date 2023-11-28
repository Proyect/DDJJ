<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Cestado;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ddjj>
 */
class DdjjFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $agente= User::where('id',2)->first();

        $estCiv=Cestado::inRandomOrder()->first();

        return [ 
            'idFunc'=> $this->faker->numberBetween(1, 20), /* $func->id */
            'idAgente'=> $agente->id, 
            'idEstCivil' => $estCiv->id,
            'conyuge'=>$this->faker->firstName(),
            'numInstr'=>$this->faker->randomElement(['DA N° 124/23', 'DA N° 1874/22', 'Dto. N° 78/23', 'Dto. N° 188/22']),
            'fchInstr'=>$this->faker->date($format = 'Y-m-d',$max = 'now'), // '1979-06-09'
            'idTipoDDJJ'=> $this->faker->randomElement(['1', '2', '3','4']),
            //'tipoDDJJ'=> $this->faker->randomElement(['Inicio', 'Cese', 'Actualización','Cese e Inicio']),
            'cargo'=> $this->faker->randomElement(['Secretario', 'Jefe de Programa', 'Coordinador','Director']),
            'organismo'=> $this->faker->randomElement(['Ministerio de Seguridad y Justicia', 'Ministerio de Salud Pública', 'Ministerio de Ambiente','Ministerio de Gobierno']),
            'domPart'=>$this->faker->secondaryAddress(),
            'domLab'=>$this->faker->secondaryAddress(),
            'telLab'=>$this->faker->e164PhoneNumber() ,
            'cel'=>$this->faker->e164PhoneNumber() ,
            'estadoCarga'=> $this->faker->randomElement(['Nueva', 'En Proceso de Carga', 'Para ser Entregada','Entregada','Protocolizada']),
            'obligado'=> $this->faker->randomElement(['Si', 'No']),
            'observacionesDJ'=>''/* $this->faker->text($maxNbChars = 200) */, 
            'vencida'=>$this->faker->randomElement(['Si', 'No']),
            'estado'=> 'Habilitado',
            
           // 'estado' => $this->faker->randomElement(['Habilitado']),                   
           
        ]; 
    }
}
