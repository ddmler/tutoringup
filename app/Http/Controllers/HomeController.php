<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application homepage
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inserate = \App\Inserat::all();

        return view('home', compact('inserate'));
    }
}
