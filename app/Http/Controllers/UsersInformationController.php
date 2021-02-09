<?php

namespace App\Http\Controllers;

use App\Models\UsersInformation;
use App\Models\User;
use Illuminate\Http\Request;

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        return response()->json(UsersInformation::all());
    }

    /**
     * List of all records.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $user = new User([
            'name'     => $request->input('fname').' '.$request->input('lname'),
            'email'    => $request->input('email'),
            'password' => bcrypt('admin123')
        ]);

        $user->save();
        
        if(empty($user->id)) {
            return response()->json('The user was not successfully added');
        }

        $usersinformation = new UsersInformation([
            'user_id' => $user->id,
            'first_name' => $request->input('fname'),
            'middle_name' => $request->input('mname'),
            'last_name' => $request->input('lname'),
            'hired_date' => date('Y-m-d'),
            'employee_id' => $request->input('employeeid'),
            'birth_date' => date('Y-m-d',strtotime($request->input('birthdate'))),
            'gender' => $request->input('gender'),
            'address' => 'test',
            'profile_image' => 'test',
            'status' => 1,
        ]);

        if($usersinformation->save()){

            return response()->json('The user successfully added');
        } else {

            return response()->json('The user not successfully added');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UsersInformation  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = UsersInformation::find($id);
        return response()->json($data);
    }

    /**
     * Show the form for adding the specified resource.
     *
     * @param  \App\Models\UsersInformation  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $data = [
            'first_name' => $request->input('fname'),
            'middle_name' => $request->input('mname'),
            'last_name' => $request->input('lname'),
            'hired_date' => date('Y-m-d'),
            'employee_id' => $request->input('employeeid'),
            'birth_date' => date('Y-m-d',strtotime($request->input('birthdate'))),
            'gender' => $request->input('gender'),
            'address' => 'test',
            'profile_image' => 'test',
            'status' => 1,
        ];
        $data = UsersInformation::where('id',$id)->update($data);

        if ($data) {

            return response()->json('The Users Information successfully updated');
        } else {

            return response()->json('The Users Information not successfully updated');
        }
    }
    
    /**
     * Deleting record.
     *
     * @param  \App\Models\UsersInformation  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = UsersInformation::find($id);
        $data->delete();

        return response()->json('The Users Information successfully deleted');
    }
}
