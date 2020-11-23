<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vacation;
use Illuminate\Http\Request;
use App\Http\Requests\UserVacationStoreRequest;
use App\Http\Requests\UserVacationUpdateRequest;

class UsersVacationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        return response()->json([
            'vacations' => $user->vacations,
            'status' => 201
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($user, UserVacationStoreRequest $request)
    {   
        $user = User::find($user);
        $vacation = new Vacation();
        $vacation->from = $request->from;
        $vacation->to = $request->to;
        $vacation->user_id = $user->id;
        $vacation->save();

        return response()->json([
            'vacations' => $user->vacations,
            'status' => 201
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($user, $vacation, UserVacationUpdateRequest $request)
    {
        $user = User::find($user);
        $vacation = Vacation::find($vacation);
        if($user->vacations->contains($vacation)){
            $vacation->from = $request->from;
            $vacation->to = $request->to;
            $vacation->save();
        }

        return response()->json(null, 204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
