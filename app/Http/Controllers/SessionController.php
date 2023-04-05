<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\Slide;
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
            'session_type' => ['max:5']
        ]);

        $oldSession = Session::where('user_id', auth()->id())->get();
        $oldSession->delete();

        $a = new Session;
        $a->code=rand(100000, 999999);
        $a->user_id = auth()->id();
        $a->pres_id = $validatedData['pres_id'];
        $a->sessionType = $validatedData['session_type'];
        $a->currentSlide = 0;
        

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

    public function increment($id)
    {
        $session = Session::findOrFail($id);
        $count = Slide::where('pres_id', $session->pres_id)->count();
        if(($count-1) != $session->currentSlide)
        {
            $session->currentSlide = ($session->currentSlide) + 1;
            $session->save();
        }
        return redirect()->route('sessions.show', [$session->id]);
    }
    
    public function decrement($id)
    {
        $session = Session::findOrFail($id);
        if(($session->currentSlide)!=0)
        {
            $session->currentSlide = ($session->currentSlide) - 1;
            $session->save();
        }
        return redirect()->route('sessions.show', [$session->id]);
    }

}
