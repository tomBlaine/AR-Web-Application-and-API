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

        $checkedValue = "null";
        if($request->has('checkbox1'))
        {
            $checkboxes = $request->input('checkbox1'); // Get the array of checkboxes
        
            // Loop through the array to find the checked checkbox
            foreach ($checkboxes as $checkbox) {
            if ($checkbox) { // Assumes the checkbox value is a boolean
                $checkedValue = $checkbox;
                break; // Exit the loop after finding the checked checkbox
            }
        }
        }



        $a = new Slide;
        //hello
        
        $a->text1 = $request['boxColour3'];

        $a->text1Format = "S1";

        $a->obj=$checkedValue;
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
