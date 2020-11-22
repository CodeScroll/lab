<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    function index(){
        $skills = Skill::all();
        foreach($skills as $skill){
            dump($skill->users);
        }

        return true;
    }
}
