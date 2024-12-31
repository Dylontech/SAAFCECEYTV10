<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Profesore
 *
 * @property $id
 * @property $Nombre
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Profesore extends Model
{
    
    static $rules = [
		'Nombre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Nombre'];

    public function materias()
    {
        return $this->hasMany(Materia::class);
    }

}
