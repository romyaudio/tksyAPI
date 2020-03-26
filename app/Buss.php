<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buss extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'address', 'city', 'state', 'zipcode', 'website', 'iduser',
    ];
}
