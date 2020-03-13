<?php

namespace App\Http\Controllers;


use App\Http\Requests\RegisterAccount;
use App\Mail\VerifyEmail;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Eloquent\getKey;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
    public function create(RegisterAccount $request)
    {
         if ($request->isJson()) {
            $data = $request->json()->all();
                $user = User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'api_token'=> Str::random(60),
                    'activate' => 0
                ]);
                Mail::to($data['email'])->send(new VerifyEmail($user));

                return response()->json($user,201);


        }else{
            return response()->json(['error'=>'Unauthorized'],401,[]);
        }
    }


    protected function guard()
    {
        return Auth::guard();
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

    public function VerifyEmail(Request $request){
        $data = $request->all();
        $user = User::where('id',$data['id'])->first();
        $token = $data['val'];
        $api_token = $user->api_token;
        $verified = $user->email_verified_at;

        if (!$user) {
            $msg = ['msg'=>'This action is unauthorized.',
                    'disable'=>'true'
                    ];
        }
        else if ($token!= $api_token) {
            $msg = ['msg'=>'This action is unauthorized.',
                    'disable'=>'true'
                    ];
        }
        else if (!is_null($verified)) {
          $msg = ['msg'=>'This email is already verified.',
                    'disable'=>'false'
                    ];
      }else{
      $user->email_verified_at = date('Y-m-d H:m:s');
      $user->save();
      $msg = ['msg'=>'Email Successfully Verified.',
      'disable'=>'false'
  ];
}
return view('mails.CheckVerifyEmail',compact('msg'));
}
}
