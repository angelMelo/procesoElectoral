<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voto extends Model
{
    // use HasFactory;
    protected $table = 'votos';
    public $timestamps = false;
    protected $primaryKey = 'id_voto';
    protected $fillable = ['id_voto', 'id_partido', 'con_letra', 'con_numero', 'id_casilla'];

    public function partido()
    {
         return $this->belongsTo('App\Models\Partido', 'id_partido'); 
    }

    public function casilla()
    {
         return $this->belongsTo('App\Models\Casilla', 'id_casilla'); 
    }
}
