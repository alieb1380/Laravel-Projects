<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;


class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $notes = Note::query()->orderBy('created_at', 'desc')->get();
        $notes = Note::query()
        ->where('user_id', request()->user()->id)
        ->orderBy('created_at', 'desc')
        ->paginate();
        
        // this is a helper function that print the variable and die right here
        // dd($notes);
        // return view('note.index');

        return view('note.index', ['notes' => $notes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('note.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $data = $req->validate([
            'note' => ['required', 'string']
        ]);

        $data['user_id'] = $req->user->id;
        $note = Note::create($data);

        return to_route('note.show', $note)->with('message', 'Note was created');
    }

    /**
     * Display the specified resource.
     */

    /*  public function show (string $id)
    {
        return 'show' . $id;**/
     public function show(Note $note)
    {
        if ($note->user_id !== request()->user()->id) {
            abort(403);
        }

        return view('note.show', ['note' => $note]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        if ($note->user_id !== request()->user()->id) {
            abort(403);
        }

        return view('note.edit', ['note' => $note]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, Note $note)
    {
        if ($note->user_id !== request()->user()->id) {
            abort(403);
        }

        $data = $req->validate([
            'note' => ['required', 'string']
        ]);

        $note->update($data);

        return to_route('note.show', $note)->with('message', 'Nate was Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        if ($note->user_id !== request()->user()->id) {
            abort(403);
        }
        
        $note->delete();

        return to_route('note.index')->with('message','Note was deleted!');
    }
}
