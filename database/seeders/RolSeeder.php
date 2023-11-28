<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $rol_admin = Role::create(['name' => 'admin']);
        $rol_agente = Role::create(['name' => 'agente']);
        $rol_funcionario = Role::create(['name' => 'funcionario']);

        // Permisos para cada Rol
        Permission::create(['name' => 'homeAdmin'])->assignRole($rol_admin);
        Permission::create(['name' => 'lista_cestados'])->assignRole($rol_admin);
        Permission::create(['name' => 'lista_dtipos'])->assignRole($rol_admin);
        Permission::create(['name' => 'lista_djtipos'])->assignRole($rol_admin);
        Permission::create(['name' => 'lista_usuarios'])->assignRole($rol_admin);
        Permission::create(['name' => 'lista_funcionarios'])->assignRole($rol_agente);
        Permission::create(['name' => 'lista_ddjj'])->assignRole($rol_agente);
        //Permission::create(['name' => 'lista_vencidas'])->assignRole($rol_agente);
        Permission::create(['name' => 'obienes'])->assignRole($rol_funcionario);
        //Permission::create(['name' => 'lista_pagos'])->syncRoles([$rol_vendedor,
        //$rol_cliente]);
        
    }
}
