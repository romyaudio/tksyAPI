<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'address', 'city', 'state', 'zipcode', 'commission', 'iduser', 'password_token',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
