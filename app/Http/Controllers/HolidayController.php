<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Holiday;

class HolidayController extends Controller
{
    // all holidays
    public function index()
    {
        $holidays = Holiday::all()->toArray();
        return array_reverse($holidays);
    }

    // add holiday
    public function add(Request $request)
    {
        $holiday = new Holiday([
            'name'      => $request->input('name'),
            'date'      => $request->input('date'),
            'remarks'   => $request->input('remarks')
        ]);
        $holiday->save();

        return response()->json('The holiday successfully added');
    }

    // edit holiday
    public function edit($id)
    {
        $holiday = Holiday::find($id);
        return response()->json($holiday);
    }

    // update holiday
    public function update($id, Request $request)
    {
        $holiday = Holiday::find($id);
        $holiday->update($request->all());

        return response()->json('The holiday successfully updated');
    }

    // delete holiday
    public function delete($id)
    {
        $holiday = Holiday::find($id);
        $holiday->delete();

        return response()->json('The holiday successfully deleted');
    }
}
