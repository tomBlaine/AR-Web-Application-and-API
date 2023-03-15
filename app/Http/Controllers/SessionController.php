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


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pres_id' => ['max:10'],
        ]);

        $a = new Session;
        $a->code=rand(100000, 999999);
        $a->user_id = auth()->id();
        $a->pres_id = $validatedData['pres_id'];
        

        $a->save();

        //session()->flash('message', 'Presentation was created.');
        return redirect()->route('sessions.show', [$a->id]);
    }

    public function show($id)
    {
        $session = Session::findOrFail($id);
        $presentation = Presentation::findOrFail($session->pres_id);
        return view('sessions.show', ['presentation' => $presentation, 'session'=>$session]);
    }
    

}
