<?php

namespace App\Models;

use App\Models\User;
use App\Models\DepartmentUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'manager',
    ];

    function user(){
        return $this->belongsToMany(User::class,'department_users');
    }
    
    function deleteUser($id){
        $departmentsUser = DepartmentUser::where('user_id',$id)->first();
        $departmentsUser->delete();
        return true;
    }
}
