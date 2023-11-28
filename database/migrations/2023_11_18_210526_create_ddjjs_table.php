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
        Schema::create('ddjjs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idFunc'); //FK
            $table->unsignedBigInteger('idAgente'); //FK
            $table->unsignedBigInteger('idEstCivil');  //FK 
            $table->unsignedBigInteger('idTipoDDJJ');  //FK 
            $table->string('conyuge')->nullable();
            $table->string('numInstr');
            $table->date('fchInstr');  
            //$table->string('tipoDDJJ');          
            $table->string('cargo');  
            $table->string('organismo');  
            $table->string('domPart')->nullable();                
            $table->string('domLab'); 
            $table->string('telLab')->nullable();
            $table->string('cel')->nullable();            
            $table->string('estadoCarga');
            $table->string('obligado');                    
            $table->string('observacionesDJ')->nullable();
            $table->tinyText('vencida');
            $table->tinyText('estado');
             
            $table->foreign('idEstCivil')-> references('id')->on('cestados');
            $table->foreign('idFunc')-> references('id')->on('funcionarios');            
            $table->foreign('idAgente')-> references('id')->on('funcionarios');         
            $table->foreign('idTipoDDJJ')-> references('id')->on('djtipos');     
            //$table->foreignId('category_id')->nullable()->constrained();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ddjjs');
    }
};
