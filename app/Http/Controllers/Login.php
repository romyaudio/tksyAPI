<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLogin;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Laravel\Airlock\HasApiTokens ;

class Login extends Controller
{
    public function getToken(UserLogin $data)
    {
    	if ($data->isJson()) {
    		$user = User::where('email',$data['email'])->first();
    		if ($user && Hash::check($data['password'],$user->password)) {
    			$verify = $user->email_verified_at;
    			if (is_null($verify)) {
    				return response()->json(['errors'=>'This email is not verified.'],422);
    			}else{
    				$id = $user['id'];
    				$token = $user->createToken('token-name')->plainTextToken;
    				$user = [
    					'email'  => $user->email,
    					'name'   => $user->name,
    				];
    				$response = [
    				  'user'=>$user,
    				   'token'=>$token,
    				];
                   return response()->json($response,201);

    			}
    		}else{
    			return response()->json(['errors'=>'These credentials do not match our records.'],422);
    		}

    	}else{
    		return response()->json(['error'=>'Unauthorized'],401);
    	}

    }
}
