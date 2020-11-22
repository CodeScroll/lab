<?php

namespace App\Http\Controllers;

use App\Models\User;
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
}
