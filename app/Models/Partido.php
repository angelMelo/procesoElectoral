<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    protected $table = 'partidos';
    public $timestamps = false;
    protected $primaryKey = 'id_partido';
    protected $fillable = ['id_partido', 'nombre', 'id_candidato'];

    public function voto()
    {
         return $this->hasMany('App\Models\Voto', 'id_partido'); 
    }
}
