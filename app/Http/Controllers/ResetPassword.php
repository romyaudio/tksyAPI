<?php

namespace App\Http\Controllers;

use App\Http\Requests\forgotPassword;
//use App\Mail\ResetPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ResetPassword extends Controller
{
	public function reset(forgotPassword $data)
	{
         if ($data->isJson()) {
         	//$user = User::where('email',$data['emial']);
         	//Mail::to($data['email'])->send(new ResetPassword($user));
         	//response()->json($user,200);


         }else{
            return response()->json(['error'=>'Unauthorized'],401);
         }
	}
}
