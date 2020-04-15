<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Team extends Model
{
    use HasApiTokens;

    protected $fillable = [
        'name', 'email', 'password', 'phone', 'address', 'city', 'state', 'zipcode', 'commission', 'iduser', 'password_token',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
