<?php

namespace App\Http\Controllers;

use App\Http\Requests\forgotPassword;
use App\Mail\MailResetPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
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
         	return response()->json([$user->email],201);

         }else{
            return response()->json(['error'=>'Unauthorized'],401);
         }
	}

   public function password(Request $request)
   {
         $data = $request->all();
         $user = User::where('id',$data['id'])->first();
         $token = $data['val'];
         if (!$user) {
           $msg = "This action is unauthorized.";
           return view('password',compact('msg'));
         }
         $password_token = $user->password_token;
         if ($token != $password_token) {
            $msg = "This action is unauthorized.";
           return view('password',compact('msg'));
         }
         $email = $user->email;
         return view('newPassword',compact('email'));

   }
   public function newpassword(Request $request)
   {
         $data = $request->all();
         $validator = Validator::make($request->all(),[
                  'password'=>'required|confirmed',
                  'password_confirmation' => 'required'])->validateWithBag('post');
         $user = User::where('email',$data['email'])->first();
         $user->password = Hash::make($data['password']);
         $user->password_token = null;
         $user->save();
         return view('login');

   }
}
