<?php

namespace App\Http\Controllers;

use App\Models\Tab;
use Illuminate\Http\Request;
use DB;

class TabsController extends Controller
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
        $data = DB::select("SELECT `id`,`name`,`path`,`component` FROM tabs");
        return response()->json($data);
    }
    
}
