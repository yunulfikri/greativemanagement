<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Models\TeamUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class AccountController extends Controller
{
    //
    public function index(){
        $teamUser = TeamUser::where('role', 'member')
                    ->join('users', 'users.id', '=', 'teams_users.user_id')
                    ->join('teams', 'teams.id', '=', 'teams_users.team_id')
                    ->select('users.*', DB::raw('GROUP_CONCAT(teams.name) as teamname'))
                    ->groupBy('teams_users.user_id')
                    ->get();
        return Inertia::render('Account/Show', ['datamember' => $teamUser]);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ])->validate();
       

        $current_team_id = '1';
        if ($request->creavora == true) {
            # code...
            $current_team_id = '2';
        } 
        if ($request->greative == true) {
            # code...
            $current_team_id = '1';

        }

        $user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'member',
            'current_team_id' => $current_team_id
        ]);


        if ($request->creavora == true) {
            # code...
            TeamUser::create([
                'team_id' => 2,
                'user_id' => $user->id
            ]);
        } 
        if ($request->greative == true) {
            # code...
            TeamUser::create([
                'team_id' => 1,
                'user_id' => $user->id
            ]);   
        }

        return 'sukses';
    }
}
