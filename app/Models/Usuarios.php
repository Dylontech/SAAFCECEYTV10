<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuarios extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'name',
        'User_name',
        'User_pass',
        'User_tipo',
    ];

    protected $hidden = [
        'User_pass',
    ];
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function getIsAdminAttribute()
    {
        return $this->role()->where('id', 1)->exists();
    }

    public function getIsControlEscolarAttribute()
    {
        return $this->role()->where('id', 2)->exists();
    }
    public function getIsDepartamentoFinancieroAttribute()
    {
        return $this->role()->where('id', 3)->exists();
    }
    public function getIsAlumnoViewAttribute()
    {
        return $this->role()->where('id', 4)->exists();
    }
    public function getAuthPassword()
    {
        return $this->User_pass;
    }
}