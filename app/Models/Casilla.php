<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Casilla extends Model
{
    protected $table = 'casillas';
    public $timestamps = false;
    protected $primaryKey = 'id_casilla';
    protected $fillable = ['id_casilla', 'num_casilla', 'entidad', 'distrito', 'seccion', 'lugar', 'tipo', 'boletas', 'hora_apertura', 'fecha_apertura', 'hora_cierre', 'fecha_cierre', 'id_proceso'];

    public function voto()
    {
         return $this->hasMany('App\Models\Voto', 'id_casilla'); 
    }
}
