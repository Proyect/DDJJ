<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(1)->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin12345')
        ])->each(function(User $user) {
            $user->assignRole('admin');
        });

        User::factory(1)->create([
            'name'=>'Agente',
            'email'=>'agente@gmail.com',
            'password'=>Hash::make('agente12345')
        ])->each(function(User $user) {
                $user->assignRole('agente');
        });

        User::factory(1)->create([
            'name'=>'Funcionario',
            'email'=>'funcionario@gmail.com',
            'password'=>Hash::make('func12345')

        ])->each(function(User $user) {
                $user->assignRole('funcionario');
        });
    }
}
