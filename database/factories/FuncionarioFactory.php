<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Cestado;
use App\Models\Dtipo;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Funcionario>
 */
class FuncionarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        //traemos los datos del agente
        $agente= User::where('id',2)->first();

        $tipoDoc=Dtipo::inRandomOrder()->first();

        return [ 
            'nombre'=>$this->faker->firstName(), //
            'apellido'=>$this->faker->lastName(), //
            'genero'=> $this->faker->randomElement(['Femenino', 'Masculino']), 
            'idTipoDoc' => $tipoDoc->id,
            'numDoc'=>$this->faker->numberBetween($min = 6000000, $max = 90000000), // 8567 
            'observacionesF'=>$this->faker->text($maxNbChars = 200), 
            'estado' => $this->faker->randomElement(['Habilitado']), 
            'idAgente'=>$agente->id, //FK del agente extraído anteriormente

            //'fchReg'=>$this->faker->date($format = 'Y-m-d',$max = 'now'), // '1979-06-09'
           
        ]; 
    }
} 