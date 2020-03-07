<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       if ($request->isJson()) {
            $data = $request->json()->all();

            $exitsEmail = User::where('email',$data['email'])->first();
            $password = $data['password'];
            $confiPassword = $data['confiPassword'];

            if (strlen(trim($data['name'])) < 1  || strlen(trim($data['email'])) < 1 || strlen(trim($data['password'])) < 1 || strlen(trim($data['confiPassword'])) < 1) {
                return response()->json(['response'=>'You must complete all fields!'],400,);
            }

            if ($password!=$confiPassword) {
                return response()->json(['response'=>'The password does not match!'],400,[]);
            }   

            if (!$exitsEmail) {
                
                $user = User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'api_token'=> Str::random(60),
                    'activate' => 0
                ]);
                return response()->json($user,201);
            }else{
                return response()->json(['response'=>'This email is associated with an account!'],400,[]);
            }

        }else{
            return response()->json(['error'=>'Unauthorized'],401,[]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
