<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Presentation;
use App\Models\Slide;
use Illuminate\Support\Facades\Auth;

class SlideController extends Controller
{


    public function store(Request $request, $id){

        
        $boxType = $request->input('checkbox1');
        if($boxType!=null)
        {
            $boxType = substr($boxType, 2, 1);
        }

        $a = new Slide;
        //hello
        
        $a->text1 = json_encode($request->all());

        $a->text1Format = "S1";

        $a->obj=$boxType;
        $a->user_id = auth()->id();
        $a->pres_id = $id;
        
        

        $a->save();

        session()->flash('message', 'Slide was created.');
        return redirect()->route('presentations.show', ['id'=> $id]);
    }


    public function edit($id)
    {
        $presentation = Presentation::findOrFail($id);
        $slides = Slide::where('pres_id', $presentation->id)->get();
        return view('slides.create', ['slides'=>$slides, 'presentation'=>$presentation]);
    }

    
}
