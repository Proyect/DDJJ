<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Ddjj;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Obien>
 */
class ObienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //$func= User::where('id',3)->first();

       $ddjj=Ddjj::inRandomOrder()->first();

        return [ 
            //'idFunc'=>$func->id, 
            'idDDJJ' => $ddjj->id,
            'descripcion'=>$this->faker->text($maxNbChars = 200),
            'estado'=> 'Habilitado',            
           // 'estado' => $this->faker->randomElement(['Habilitado']),                
       
        ]; 
    }
}
