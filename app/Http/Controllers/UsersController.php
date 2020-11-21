<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    function index(){
        $users = [
            'frank',
            'brock',
            'jameson',
            'jack'
        ];

        return response()->json([
            'users' => $users,
            'count' => count($users)
        ]);
    }
}
