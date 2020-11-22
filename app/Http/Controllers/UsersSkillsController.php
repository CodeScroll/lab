<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersSkillsController extends Controller
{
    function index($id){
        $user = User::findorfail($id);
        dump($user->skills);
        return true;
    }
}
