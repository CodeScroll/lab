<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Skill;
use Illuminate\Http\Request;

class UsersSkillsController extends Controller
{
    function index(){
        $users = User::all();
        $count = $users->count();
        foreach($users as $user){
            $user->skills = $user->skills;
        }
        return response()->json(compact('users','count'));
    }

    function store($user, Request $request){
        $user = User::find($user);
        //$skills = Skill::whereIn('id',json_decode($request->skills))->pluck('id')->toArray();
        $skills = Skill::whereIn('id',json_decode($request->skills))->get();
        $user->skills()->attach($skills);
        return response()->json(compact('skills'), 201);
    }
}
