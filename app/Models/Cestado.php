<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cestado extends Model
{
    use HasFactory;

    protected $table= 'cestados';

    protected $fillable=[
        'nombre', 'estado'
    ];

    public function funcionarios(){
        return $this->hasMany(Funcionario::class, 'idEstCivil');
    }

    public function admin(){
        return $this->belongsTo(User::class,'idAdmin');
    }
}
