<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Constancia extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nombre',
        'CURP',
        'matricula',
        'constancia_tipo',
        'constancia_estatus',
        'constancia_archivo_foto',
        'constancia_archivo_resivo',
    ];
}
