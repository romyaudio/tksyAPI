<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'name', 'category', 'description', 'price', 'iduser',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
