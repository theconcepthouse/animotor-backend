<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;

class NoteController extends Controller
{
     public function notes($driverId)
    {
        $driver = User::findOrFail($driverId);
        $notes = Note::where('driver_id', $driver->id)->get();
        return view('admin.driver.others.notes', compact('driver', 'notes'));
    }

    public function noteChat($driverId)
    {
        $driver = User::findOrFail($driverId);
        $notes = Note::where('driver_id', $driver->id)->latest()->get();
        $noteCount  = Note::where('read', 0)->where('driver_id', $driver->id)->count();
        return view('admin.driver.others.note-chat', compact('driver', 'notes', 'noteCount'));
    }

    public function viewNote($driverId, $noteId)
    {
        $driver = User::findOrFail($driverId);
        $note = Note::findOrFail($noteId);
        $noteCount  = Note::where('read', 0)->where('driver_id', $driver->id)->count();
        return view('admin.driver.others.note-chat-details', compact('note', 'driver', 'noteCount'));
    }

    public function saveNoteChat(Request $request)
    {
        $validated = request()->validate([
            'title' => 'required',
            'message' => 'required',
        ]);

        $validated['driver_id'] = $request->driver_id;
        $validated['action'] = 1;
        Note::create($validated);
        return redirect()->back()->with('message', 'Note created successfully.');
    }

    public function saveDraft($noteId)
    {
        $note = Note::findOrFail($noteId);
        $note->action = 2;
        $note->save();
        return redirect()->back()->with('message', 'Added to Draft.');
    }

    public function deleteNoteChat($noteId)
    {
        $note = Note::findOrFail($noteId);
        $note->delete();
        return redirect()->back()->with('message', 'Note deleted successfully.');
    }



}
