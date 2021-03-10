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
}
