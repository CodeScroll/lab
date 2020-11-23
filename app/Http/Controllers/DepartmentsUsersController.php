<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentsUsersController extends Controller
{
    function store($department, $user){
        $user = User::find($user);
        $department = Department::find($department);
        $department->user()->save($user);
        return response()->json(compact('department'), 201);

    }

    function delete(){
        
    }
}
