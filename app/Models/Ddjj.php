<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ddjj extends Model
{
    use HasFactory;

    protected $table='ddjjs';
    protected $fillable=[
        'idEstCivil','vencida' ,'conyuge','numInstr','fchInstr','idTzipoDDJJ','cargo','organismo','domLab','domPart','telLab','cel','estadoCarga','obligado','observacionesDDJJ','estado'//,'fchReg'
    ];

    //INNER JOIN con la tabla Domicilios por medio de la FK idDom
    public function obien(){
        return $this->hasMany(Obien::class,'idDDJJ'); 
    }

    public function estadoCiv(){
        return $this->belongsTo(Cestado::class,'idEstCivil'); 
    }

    public function tipoDDJJ(){
        return $this->belongsTo(Djtipo::class,'idTipoDDJJ'); 
    }

    public function funcionario(){
        return $this->belongsTo(Funcionario::class,'idFunc'); //ok
    }

    public function agente(){
        return $this->belongsTo(User::class,'idAgente'); //ok
    }
}
