<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewTeam;
use App\Mail\EmailNewTeam;
use App\Team;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        $team = DB::table('teams')->where('iduser', $request['iduser'])->get();
        return response()->json($team, 200);

    }

    public function store(NewTeam $request)
    {
        $user = User::where('email', $request['email'])->first();

        if ($user) {
            return response()->json(['errors' => ['email' => 'This email is associated with a user account, use another email.']], 422);
        }

        if ($request->isJson()) {
            $password = Str::random(8);
            $team     = Team::create([
                'name'           => $request['name'],
                'email'          => $request['email'],
                'password'       => Hash::make($password),
                'phone'          => $request['phone'],
                'address'        => $request['address'],
                'city'           => $request['city'],
                'state'          => $request['state'],
                'zipcode'        => $request['zip'],
                'commission'     => $request['commission'],
                'iduser'         => $request['iduser'],
                'password_token' => null,
            ]);
            $user     = User::where('id', $request['iduser'])->first();
            $business = $user->business;
            $resmail  = array('team' => $request['name'], 'password' => $password, 'business' => $business, 'email' => $request['email']);

            Mail::to($request['email'])->send(new EmailNewTeam($resmail));

            return response()->json($resmail, 201);

        } else {
            return response()->json(['errors' => 'Unauthorized', 401]);
        }
    }

    public function edit(Request $id)
    {
        $team = Team::find($id['id']);
        return response()->json($team, 200);
    }

    public function update(Request $data)
    {
        $team             = Team::find($data['idteam']);
        $team->name       = $data['name'];
        $team->email      = $data['email'];
        $team->phone      = $data['phone'];
        $team->address    = $data['address'];
        $team->city       = $data['city'];
        $team->state      = $data['state'];
        $team->zipcode    = $data['zip'];
        $team->commission = $data['commission'];
        $team->iduser     = $data['iduser'];
        $team->save();
        return response()->json($team, 201);
    }

    public function destroy(Request $id)
    {
        $team = Team::find($id['id']);
        $team->delete();
        return response()->json([], 200);
    }
}
