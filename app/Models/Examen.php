<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Profesore;
use App\Models\Materia;
use App\Models\Alumno;

class Examen extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'profesor',
        'materia',
        'alumno',
        'CURP',
        'matricula',
        'examen_estatus',
        'examen_tipo',
    ];

    /**
     * Get the alumno that owns the examen.
     */
    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }
}