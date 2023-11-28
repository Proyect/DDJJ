<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Djtipo extends Model
{
    use HasFactory;

    protected $table='djtipos';

    protected $fillable=[
        'nombre', 'estado'
    ];

    public function ddjjs(){
        return $this->hasMany(DDJJ::class, 'idtipoDDJJ');
       
    }

    public function admin(){
        return $this->belongsTo(User::class,'idAdmin');
    }
}
