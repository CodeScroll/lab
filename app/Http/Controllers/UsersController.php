<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    function index(){
        $users = User::all();
        foreach($users as $user){
            dump($users->skills());
        }
        return response()->json([
            'users' => $users,
            'count' => $users->count()
        ]);
    }
}
