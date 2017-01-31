<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InseratController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show form for creating a new inserat
     *
     * @return \Illuminate\Http\Response
     */
    public function createNew()
    {
        return view('create_inserat');
    }
}
