<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MainController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        /** @var User $user */
        $user = Auth::user();
        $notes = $user->notes()->get();
        return view('home', compact('notes'));
    }

    public function newNote()
    {
        return view('note');
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'title' => 'required|string|max:150',
            'text' => 'required|string|max:255',
        ]);

        /** @var User $user */
        $user = Auth::user();
        $user->notes()->create($input);

        return redirect()->route('home');
    }

    public function delete($id)
    {
        $note = Note::findOrFail($id);
        $this->authorize('delete', $note);
        return view('deleteNote', compact('note'));
    }

    public function destroy($id)
    {
        $note = Note::findOrFail($id);
        $this->authorize('delete', $note);
        $note->delete();

        return redirect()->route('home');
    }

    public function edit($id)
    {
        $note = Note::findOrFail($id);
        $this->authorize('update', $note);
        return view('editNote', compact('note'));
    }

    public function update(Request $request, $id)
    {
        $note = Note::findOrFail($id);
        $this->authorize('update', $note);

        $input = $request->validate([
            'title' => 'required|max:150',
            'text' => 'required|max:255',
        ]);

        $note->update($input);
        return redirect()->route('home');
    }
}
