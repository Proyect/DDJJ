<?php

namespace App\Models;

use App\Models\Ddjj;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Obien extends Model
{
    use HasFactory;

    protected $table='obiens';
    protected $fillable=[
        'descripcion', 'estado'
    ];

    
    public function ddjj(){
        return $this->belongsTo(Ddjj::class,'idDDJJ'); 
    }

   /*  public function agente(){
        return $this->belongsTo(User::class,'idAgente'); //ok
    } */
}
