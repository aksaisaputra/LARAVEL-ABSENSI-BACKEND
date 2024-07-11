<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    //index
    public function index(Request $request)
    {
        //notes by user id
        $notes = Note::where('user_id', $request->user()->id)->orderBy('id', 'desc')->get();

        return response()->json(['notes' => $notes], 200);
    }

    //create
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'note' => 'required',
        ]);

        $note = new Note();
        $note->user_id = $request->user()->id;
        $note->title = $request->title;
        $note->note = $request->note;
        $note->save();

        return response()->json(['message' => 'Note created successfully'], 201);
    }

    //edit
    public function edit($id)
    {
        $note = Note::find($id);

        if ($note && $note->user_id == auth()->user()->id) {
            return response()->json(['note' => $note], 200);
        } else {
            return response()->json(['message' => 'Note not found or unauthorized'], 404);
        }
    }

    //update
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'note' => 'required',
        ]);

        $note = Note::find($id);

        if ($note && $note->user_id == auth()->user()->id) {
            $note->title = $request->title;
            $note->note = $request->note;
            $note->save();

            return response()->json(['message' => 'Note updated successfully'], 200);
        } else {
            return response()->json(['message' => 'Note not found or unauthorized'], 404);
        }
    }

    //destro
    public function destroy($id)
    {
        $note = Note::find($id);

        if ($note && $note->user_id == auth()->user()->id) {
            $note->delete();
            return response()->json(['message' => 'Note deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Note not found or unauthorized'], 404);
        }
    }
}
