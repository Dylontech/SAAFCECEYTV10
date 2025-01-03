<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reinscripcion extends Model
{
    use HasFactory;
  protected $fillable = [
        'nombre',
        'CURP',
        'matricula',
        'reinscripcion_semestre',
        'reinscripcion_estatus',
    ];   
}
