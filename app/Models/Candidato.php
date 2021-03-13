<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    protected $table = 'candidatos';
    public $timestamps = false;
    protected $primaryKey = 'id_candidato';
    protected $fillable = ['id_candidato', 'nombre'];

    public function partido()
    {
         return $this->hasMany('App\Models\Partido', 'id_candidato'); 
    }
}
