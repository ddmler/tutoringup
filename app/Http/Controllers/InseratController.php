<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InseratController extends Controller
{
    /**
     * View inserate
     *
     * @return \Illuminate\Http\Response
     */
    public function list($role = null, $subject = null)
    {
        $inserate = \App\Inserat::all();

        return view('inserat.list', compact('inserate'));
    }

    /**
     * View single inserat
     *
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
		$inserat = \App\Inserat::find($id);

        return view('inserat.view', compact('inserat'));
    }

    /**
     * Show form for creating a new inserat
     *
     * @return \Illuminate\Http\Response
     */
    public function createForm()
    {
        return view('inserat.create');
    }

    /**
     * Saves a new inserat
     *
     * @return \Illuminate\Http\Response
     */
    public function createNew()
    {
        return redirect()->route('home');
    }

    /**
     * Show own inserate
     *
     * @return \Illuminate\Http\Response
     */
    public function viewOwn()
    {
        return view('inserat.own');
    }
}
