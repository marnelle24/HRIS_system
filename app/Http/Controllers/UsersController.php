<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all()->toArray();
        
        return  response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    /**
     * Show the form for adding the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $user = new User([
            'name' => $request->input('name'),
            'author' => $request->input('author')
        ]);
        $user->save();

        return response()->json('The user successfully added');
    }


    /**
     * Show the form for adding the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $user = User::find($id);
        $user->update($request->all());

        return response()->json('The user successfully updated');
    }

    /**
     * Deleting record.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        return response()->json('The user successfully deleted');
    }
}
