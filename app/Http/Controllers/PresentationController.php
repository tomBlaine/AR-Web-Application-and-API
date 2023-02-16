<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PresentationController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string', 'max:3000'],
        ]);

        $a = new Post;
        $a->title = $validatedData['title'];
        $a->text = $validatedData['body'];
        $a->user_id = auth()->id();
        

        $a->save();

        session()->flash('message', 'Presentation was created.');
        return redirect()->route('presentations.store');
    }


    public function index()
    {
        $presentations = Presentations::orderBy('created_at', 'desc')->simplePaginate(5);
        return view('presentations.index', ['presentations' => $presentations]);
    }
}
