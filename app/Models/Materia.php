<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Materia
 *
 * @property $id
 * @property $Materia_Nombre
 * @property $Materia_profesor
 * @property $Materia_tipo
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Materia extends Model
{
    
    static $rules = [
		'Materia_Nombre' => 'required',
		'Materia_profesor' => 'required',
		'Materia_tipo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Materia_Nombre','Materia_profesor','Materia_tipo'];

    public function profesor()
    {
        return $this->belongsTo(Profesore::class, 'Materia_profesor');
    }
    

}
