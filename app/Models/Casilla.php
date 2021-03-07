<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Casilla extends Model
{
    protected $table = 'casillas';
    public $timestamps = false;
    protected $primaryKey = 'id_casilla';
    protected $fillable = ['id_casilla', 'id_proceso'];
}
