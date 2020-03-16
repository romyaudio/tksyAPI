<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserLogin;
use App\User;

class Login extends Controller
{
    public function getToken(UserLogin $data)
    {
    	return "Login...";
    }
}
