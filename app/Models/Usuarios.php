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

    public function getAuthPassword()
    {
        return $this->User_pass;
    }
}