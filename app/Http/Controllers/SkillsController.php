<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Requests\SkillsStoreRequest;
use App\Http\Requests\SkillsUpdateRequest;

class SkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skill::all();
        $count = $skills->count();
        foreach($skills as $skill){
            $skill->users = $skill->users;
        }

        return response()->json(compact('skills','count'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SkillsStoreRequest $request)
    {
        $skill = Skill::create($request->only('title'));
        return response()->json(compact('skill'), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        return response()->json(compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SkillsUpdateRequest $request, Skill $skill)
    {
        $skill->update($request->only('title'));
        return response()->json(null, 204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();
        return response()->json(null, 204);
    }
}
