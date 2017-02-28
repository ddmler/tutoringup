<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Upload;
use App\Studiengang;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($subject = null)
    {
        $list = Upload::orderBy('created_at', 'desc');
        
        if ($subject !== null) {
            $list->whereHas('studiengaenge',function($q) use($subject)
                {
                    $q->where('studiengang_id', $subject);
                });
        }
        $uploads = $list->paginate(10);

        $studium = Studiengang::all(); // to get the name of the current filter

        $studiengaenge = Studiengang::orderBy('name')->get(); // Sorted for List to choose

        return view('upload.index', compact('uploads', 'studium', 'studiengaenge', 'subject'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $studiengaenge = Studiengang::orderBy('name')->get();

        return view('upload.create', compact('studiengaenge'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required|max:255|min:3',
            'upload_file' => 'required|file|mimes:jpeg,png,pdf',
            'studiengaenge' => 'required|array',
        ]);

        $path = request()->file('upload_file')->store('altklausur', 'public');



        $inserat = Upload::create([
            'title' => request('title'),
            'user_id' => Auth::id(),
            'filename' => $path,
        ]);

        foreach (request('studiengaenge') as $studium) {
            $inserat->studiengaenge()->attach($studium);
        }

        return redirect()->route('uploads')->with('status', 'Altklausur erfolgreich hochgeladen.');
    }

    /**
     * Show own inserate
     *
     * @return \Illuminate\Http\Response
     */
    public function showOwn()
    {
        $uploads = Upload::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(10);

        return view('upload.own', compact('uploads'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $upload = Upload::findOrFail($id);

        if ($upload->user_id == Auth::id()) { //check if user is allowed to delete this post
            $upload->delete();

            return redirect()->route('upload_own')->with('status', 'Altklausur erfolgreich gelöscht.');
        }

        abort(403); //Forbidden action
    }
}
