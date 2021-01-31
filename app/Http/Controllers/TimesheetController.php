<?php

namespace App\Http\Controllers;

use App\Models\Timesheet;
use Illuminate\Http\Request;

class TimesheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timesheet = Timesheet::all()->toArray();
        
        return  response()->json($timesheet);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Timesheet  $timesheet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $timesheet = Timesheet::find($id);
        return response()->json($timesheet);
    }

    /**
     * Show the form for adding the specified resource.
     *
     * @param  \App\Models\Timesheet  $timesheet
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $timesheet = new Timesheet([
            'name' => $request->input('name'),
            'author' => $request->input('author')
        ]);
        $timesheet->save();

        return response()->json('The timesheet successfully added');
    }


    /**
     * Show the form for adding the specified resource.
     *
     * @param  \App\Models\Timesheet  $timesheet
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $timesheet = Timesheet::find($id);
        $timesheet->update($request->all());

        return response()->json('The timesheet successfully updated');
    }

    /**
     * Deleting record.
     *
     * @param  \App\Models\Timesheet  $timesheet
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $timesheet = Timesheet::find($id);
        $timesheet->delete();

        return response()->json('The timesheet successfully deleted');
    }
}
