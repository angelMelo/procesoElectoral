<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
    protected $table = 'proceso_electoral';
    public $timestamps = false;
    protected $primaryKey = 'id_proceso';
    protected $fillable = ['id_proceso', 'nombre', 'hora_apertura'];
}
