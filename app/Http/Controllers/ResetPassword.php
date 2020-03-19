<?php

namespace App\Http\Controllers;

use App\Http\Requests\forgotPassword;
use App\Mail\MailResetPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ResetPassword extends Controller
{
	public function reset(forgotPassword $data)
	{
         if ($data->isJson()) {
         	$user = User::where('email',$data['email'])->first();
            $user->password_token = Str::random(60);
            $user->save(); 
         	Mail::to($data['email'])->send(new MailResetPassword($user));
         	return response()->json([$user->email,$user->name],201);

         }else{
            return response()->json(['error'=>'Unauthorized'],401);
         }
	}

   public function newPassword(Request $request)
   {
      return "New Password";
   }
}
