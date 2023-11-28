<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $table='funcionarios';
    protected $fillable=[
        'nombre', 'apellido','genero','idTipoDoc','numDoc','observacionesF','estado'//,'fchReg'
    ];

    //INNER JOIN con la tabla Domicilios por medio de la FK idDom
    public function ddjjs(){
        return $this->hasMany(DDJJ::class,'idFunc'); 
    }

    public function tipoDoc(){
        return $this->belongsTo(Dtipo::class,'idTipoDoc'); 
    }

    public function estadoCiv(){
        return $this->belongsTo(Cestado::class,'idEstCivil'); 
    }

    public function agente(){
        return $this->belongsTo(User::class,'idAgente'); //ok
    }

    //public function ddjj() {
      //  return $this->hasMany(ddjj::class, 'idFunc'); //ok
    //} 
}