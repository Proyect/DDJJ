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
        Schema::create('obiens', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');
            $table->string('estado');
           // $table->unsignedBigInteger('idFunc');  //FK
            $table->unsignedBigInteger('idDDJJ');  //FK

           // $table->foreign('idFunc')-> references('id')->on('users');
            $table->foreign('idDDJJ')-> references('id')->on('ddjjs');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obiens');
    }
};
