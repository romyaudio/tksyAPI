<?php

namespace App\Http\Controllers;

use App\Business;
use App\Http\Requests\NewBuss;
use App\Http\Requests\UserLogin;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Login extends Controller
{
    public function getToken(UserLogin $data)
    {
        if ($data->isJson()) {
            $user = User::where('email', $data['email'])->first();
            if ($user && Hash::check($data['password'], $user->password)) {
                $verify = $user->email_verified_at;
                if (is_null($verify)) {
                    return response()->json(['errors' => 'This email is not verified.'], 422);
                } else {
                    $token  = $user->createToken($user->name)->plainTextToken;
                    $buss   = $user->business;
                    $iduser = $user->id;

                    if (is_null($buss)) {
                        return response()->json(['token' => $token, 'iduser' => $iduser], 222);
                    } else {

                        return response()->json(['token' => $token, 'user' => $user], 201);
                    }

                }
            } else {
                return response()->json(['errors' => 'These credentials do not match our records.'], 422);
            }

        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

    }

    public function getstates(Request $request)
    {
        $states = DB::table('states')->get();
        return response()->json($states, 200);
    }

    public function createbusiness(NewBuss $data)
    {
        $data->all();

        $business = Business::create([
            'name'    => $data['name'],
            'email'   => $data['email'],
            'phone'   => $data['phone'],
            'address' => $data['address'],
            'city'    => $data['city'],
            'state'   => $data['state'],
            'zipcode' => $data['zip'],
            'website' => $data['website'],
            'iduser'  => $data['iduser'],
        ]);
        $user           = User::where('id', $data['iduser'])->first();
        $user->business = $business->name;
        $user->save();
        return response()->json($business, 201);
    }
}
