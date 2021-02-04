<?php

namespace App\Http\Controllers;

use App\Models\UsersInformation;
use Illuminate\Http\Request;
use DB;

class UsersInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $usersinformation = new UsersInformation([
            'user_id' => 1123,
            'first_name' => $request->input('fname'),
            'middle_name' => $request->input('mname'),
            'last_name' => $request->input('lname'),
            'hired_date' => $request->input('birthdate'),
            'employee_id' => 101,
            'birth_date' => $request->input('birthdate'),
            'gender' => $request->input('gender'),
            'address' => 'test',
            'profile_image' => 'test',
            'status' => 1,
        ]);
        $usersinformation->save();
        return response()->json('The timesheet successfully added');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UsersInformation  $usersInformation
     * @return \Illuminate\Http\Response
     */
    public function show(UsersInformation $usersInformation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UsersInformation  $usersInformation
     * @return \Illuminate\Http\Response
     */
    public function edit(UsersInformation $usersInformation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UsersInformation  $usersInformation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UsersInformation $usersInformation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UsersInformation  $usersInformation
     * @return \Illuminate\Http\Response
     */
    public function destroy(UsersInformation $usersInformation)
    {
        //
    }
}
