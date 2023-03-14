<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\Presentation;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

/*
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pres_id' => ['required', 'int'],
        ]);

        $a = new Session;
        $a->code=1000;
        $a->user_id = auth()->id();
        $a->pres_id = $validatedData['pres_id'];
        

        $a->save();

        //session()->flash('message', 'Presentation was created.');
        return redirect()->route('presentations.index');
    }

    public function show($id)
    {
        $session = Session::findOrFail($id);
        $presentation = Presentation::findOrFail($session->pres_id);
        return view('sessions.show', ['presentation' => $presentation, 'session'=>$session]);
    }
*/
}
