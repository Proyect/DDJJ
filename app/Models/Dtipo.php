<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dtipo extends Model
{
    use HasFactory;

    protected $table='dtipos';

    protected $fillable=[
        'nombre', 'estado'
    ];

    public function funcionarios(){
        return $this->hasMany(Funcionario::class, 'idTipoDoc');
       
    }

    public function admin(){
        return $this->belongsTo(User::class,'idAdmin');
    }
}
