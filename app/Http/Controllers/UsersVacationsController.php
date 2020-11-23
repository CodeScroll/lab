<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vacation;
use Illuminate\Http\Request;

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
    public function store($user, Request $request)
    {
        $user = User::find($user);
        $vacations = Vacation::whereIn('id',json_decode($request->vacations))->get();
        $user->vacations()->attach($vacations);

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
    public function update(Request $request, $id)
    {
        //
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
