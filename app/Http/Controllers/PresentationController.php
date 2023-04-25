<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Presentation;
use App\Models\Slide;
use Illuminate\Support\Facades\Auth;

class PresentationController extends Controller
{


    public function create()
    {
        return view('presentations.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string', 'max:3000'],
        ]);

        $a = new Presentation;
        $a->title = $validatedData['title'];
        $a->text = $validatedData['body'];
        $a->user_id = auth()->id();
        

        $a->save();

        //session()->flash('message', 'Presentation was created.');
        return redirect()->route('presentations.show', ['id'=>$a->id]);
    }

    public function index()
    {
        $presentations = Presentation::where('user_id', auth()->id())->get();
        return view('presentations.index', ['presentations' => $presentations]);
    }

    public function show($id)
    {
        $presentation = Presentation::findOrFail($id);
        $slides = Slide::where('pres_id', $id)->get();
        return view('presentations.show', ['presentation' => $presentation, 'slides'=>$slides]);
    }

    public function destroy($id)
    {
        $presentation = Presentation::findOrFail($id);
        $presentation->delete();
        return redirect()->route('presentations.index')->with('message', 'Post was deleted.');
    }


}
