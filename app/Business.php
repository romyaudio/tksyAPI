<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'address', 'city', 'state', 'zipcode', 'website',
    ];

}
