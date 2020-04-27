<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'iduser',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
