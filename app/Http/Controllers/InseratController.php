<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Inserat;
use App\Studiengang;
use App\Schulfach;

class InseratController extends Controller
{
    /**
     * View inserate
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inserate = Inserat::orderBy('created_at', 'desc')->get();

        return view('inserat.index', compact('inserate'));
    }

    /**
     * Search inserate
     *
     * @return \Illuminate\Http\Response
     */
    public function search($art = null, $role = null, $subject = null)
    {
        $list = Inserat::orderBy('created_at', 'desc');
        if ($art == "suche") {
            $list->where('art', 0);
        } elseif ($art == "biete") {
            $list->where('art', 1);
        }

        if ($role == "student") {


            if ($subject !== null) {
                $list->whereHas('studiengaenge',function($q) use($subject)
                {
                    $q->where('studiengang_id', $subject);
                });
            }
        }

        if ($role == "schueler") {


            if ($subject !== null) {
                $list->whereHas('schulfaecher',function($q) use($subject)
                {
                    $q->where('schulfach_id', $subject);
                });
            }
        }

        $inserate = $list->get();

        return view('inserat.index', compact('inserate'));
    }

    /**
     * View single inserat
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$inserat = Inserat::findOrFail($id);

        return view('inserat.view', compact('inserat'));
    }

    /**
     * Show form for creating a new inserat
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $studiengaenge = Studiengang::orderBy('name')->get();
        $schulfaecher = Schulfach::orderBy('name')->get();

        return view('inserat.create', compact('studiengaenge', 'schulfaecher'));
    }

    /**
     * Saves a new inserat
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required|max:255|min:3',
            'body' => 'required|min:10',
            'art' => 'required|boolean',
            'schulfaecher' => 'nullable|array',
            'studiengaenge' => 'nullable|array',
        ]);

        $inserat = Inserat::create([
            'title' => request('title'),
            'user_id' => Auth::id(),
            'body' => request('body'),
            'art' => request('art'),
        ]);

        foreach (request('studiengaenge') as $studium) {
            $inserat->studiengaenge()->attach($studium);
        }
        foreach (request('schulfaecher') as $fach) {
            $inserat->schulfaecher()->attach($fach);
        }

        return redirect()->route('inserate')->with('status', 'Inserat erfolgreich angelegt.');
    }

    /**
     * Show own inserate
     *
     * @return \Illuminate\Http\Response
     */
    public function showOwn()
    {
        $inserate = Inserat::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();

        return view('inserat.own', compact('inserate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inserat = Inserat::findOrFail($id);
        $studiengaenge = Studiengang::orderBy('name')->get();
        $schulfaecher = Schulfach::orderBy('name')->get();

        return view('inserat.edit', compact('inserat', 'studiengaenge', 'schulfaecher'));
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
        $this->validate(request(), [
            'title' => 'required|max:255|min:3',
            'body' => 'required|min:10',
            'art' => 'required|boolean',
            'schulfaecher' => 'nullable|array',
            'studiengaenge' => 'nullable|array',
        ]);

        $inserat = Inserat::findOrFail($id);

        $inserat->title = request('title');
        $inserat->body = request('body');
        $inserat->art = request('art');

        if (request('studiengaenge') === null) {
            $inserat->studiengaenge()->detach();
        } else {
            $inserat->studiengaenge()->sync(request('studiengaenge'));
        }

        if (request('schulfaecher') === null) {
            $inserat->schulfaecher()->detach();
        } else {
            $inserat->schulfaecher()->sync(request('schulfaecher'));
        }

        $inserat->save();

        return redirect()->route('inserate_own')->with('status', 'Inserat erfolgreich bearbeitet.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inserat = Inserat::findOrFail($id);
        $inserat->delete();

        return redirect()->route('inserate_own')->with('status', 'Inserat erfolgreich gelöscht.');
    }
}
