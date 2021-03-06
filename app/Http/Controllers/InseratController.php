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
        $inserate = Inserat::orderBy('created_at', 'desc')->paginate(10);

        $art = null; // Search filter are null on index
        $role = null;
        $subject = null;

        return view('inserat.index', compact('inserate', 'art', 'role', 'subject'));
    }

    /**
     * Search inserate
     *
     * @return \Illuminate\Http\Response
     */
    public function filter($art = null, $role = null, $subject = null)
    {
        $list = Inserat::orderBy('created_at', 'desc');

        // Filter Suche/Biete
        if ($art == "suche") {
            $list->where('art', 0);
        } elseif ($art == "biete") {
            $list->where('art', 1);
        }

        // Filter Student/Schueler && Studiengang/Fach
        if ($role == "student") {
            $list->has('studiengaenge');

            if ($subject !== null) {
                $list->whereHas('studiengaenge',function($q) use($subject)
                {
                    $q->where('studiengang_id', $subject);
                });
            }
        }

        if ($role == "schueler") {
            $list->has('schulfaecher');

            if ($subject !== null) {
                $list->whereHas('schulfaecher',function($q) use($subject)
                {
                    $q->where('schulfach_id', $subject);
                });
            }
        }

        $inserate = $list->paginate(10);

        $studiengaenge = Studiengang::orderBy('name')->get(); // Sorted for list of filter
        $schulfaecher = Schulfach::orderBy('name')->get();

        $studium = Studiengang::all(); // to get the name of the current filter
        $schule = Schulfach::all();

        return view('inserat.index', compact('inserate', 'art', 'role', 'subject', 'studiengaenge', 'schulfaecher', 'studium', 'schule'));
    }

    /**
     * View single inserat
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$inserat = Inserat::findOrFail($id);
        $user_id = Auth::id();

        return view('inserat.view', compact('inserat', 'user_id'));
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
            'schulfaecher' => 'array|required_without:studiengaenge',
            'studiengaenge' => 'array|required_without:schulfaecher',
        ]);

        $inserat = Inserat::create([
            'title' => request('title'),
            'user_id' => Auth::id(),
            'body' => request('body'),
            'art' => request('art'),
        ]);

        if (request('studiengaenge') !== null) {
            foreach (request('studiengaenge') as $studium) {
                $inserat->studiengaenge()->attach($studium);
            }
        }
        
        if (request('schulfaecher') !== null) {
            foreach (request('schulfaecher') as $fach) {
                $inserat->schulfaecher()->attach($fach);
            }
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
        $inserate = Inserat::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(10);

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

        if ($inserat->user_id == Auth::id()) { //check if user is allowed to edit this post
            $studiengaenge = Studiengang::orderBy('name')->get();
            $schulfaecher = Schulfach::orderBy('name')->get();

            return view('inserat.edit', compact('inserat', 'studiengaenge', 'schulfaecher'));            
        }

        abort(403); //Forbidden action
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

        if ($inserat->user_id == Auth::id()) { //check if user is allowed to edit this post
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

        abort(403); //Forbidden action
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

        if ($inserat->user_id == Auth::id()) { //check if user is allowed to delete this post
            $inserat->delete();

            return redirect()->route('inserate_own')->with('status', 'Inserat erfolgreich gelöscht.');
        }

        abort(403); //Forbidden action
    }
}
