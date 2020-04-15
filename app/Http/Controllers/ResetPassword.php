<?php

namespace App\Http\Controllers;

use App\Http\Requests\forgotPassword;
use App\Mail\MailResetPassword;
use App\Team;
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
        $user = User::where('email', $data['email'])->first();
        $team = Team::where('email', $data['email'])->first();

        if ($data->isJson()) {

            if ($user) {

                $user->password_token = Str::random(60);
                $user->password       = null;
                $user->save();
                Mail::to($data['email'])->send(new MailResetPassword($user));
                return response()->json([$user->email], 201);

            } else if ($team) {

                $user                 = $team;
                $team->password_token = Str::random(60);
                $team->password       = null;
                $team->save();
                Mail::to($data['email'])->send(new MailResetPassword($user));
                return response()->json([$user->email], 201);

            } else {
                return response()->json(['errors' => ['email' => "We can't find a user with that email address."]], 422);
            }

        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function password(Request $request)
    {
        $data = $request->all();

        $user  = User::where('id', $data['id'])->first();
        $team  = Team::where('id', $data['id'])->first();
        $token = $data['val'];

        if ($user) {
            $userToken = $user->password_token;
            if ($token != $userToken) {

                $msg = "This action is unauthorized.";
                return view('password', compact('msg'));

            } else {
                $email = $user->email;
                return view('newPassword', compact('email'));
            }

        } else if ($team) {
            $teamToken = $team->password_token;
            if ($token != $teamToken) {

                $msg = "This action is unauthorized.";
                return view('password', compact('msg'));

            } else {
                $email = $team->email;
                return view('newPassword', compact('email'));
            }

        } else {
            $msg = "This action is unauthorized.";
            return view('password', compact('msg'));
        }

    }

    public function newpassword(Request $request)
    {
        $data      = $request->all();
        $validator = Validator::make($request->all(), [
            'password'              => 'required|confirmed|min:8',
            'password_confirmation' => 'required'])->validateWithBag('post');

        $user = User::where('email', $data['email'])->first();
        $team = Team::where('email', $data['email'])->first();

        if ($user) {

            $user->password       = Hash::make($data['password']);
            $user->password_token = null;
            $user->save();
            return view('login');

        } else if ($team) {

            $team->password       = Hash::make($data['password']);
            $team->password_token = null;
            $team->save();
            return view('login');

        } else {

        }

    }
}
