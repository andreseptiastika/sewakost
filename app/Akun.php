<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    protected $table='users';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'password', 'roles'];
}
