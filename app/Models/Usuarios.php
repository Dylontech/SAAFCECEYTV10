<?php

namespace App\Models;

use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;
    protected $table = 'usuarios';
protected $fillable = [
    'User_name',
    'User_pass',
    'User_tipo',
];
protected $hidden = [
    'user_pass',
];
public function getAuthPassword()
{
    return $this->User_pass;
}
public $Timestamps = false;
} 