<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');   
            $table->string('genero');
            $table->unsignedBigInteger('idTipoDoc'); //FK          
            $table->string('numDoc');               
            $table->unsignedBigInteger('idAgente');  //FK
            $table->string('observacionesF')->nullable();
            $table->tinyText('estado');

            //$table->foreign('categoria_id')->references('id')->on('categorias');
            
            $table->foreign('idTipoDoc')-> references('id')->on('dtipos');            
            $table->foreign('idAgente')-> references('id')->on('users');
                       
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funcionarios');
    }
};