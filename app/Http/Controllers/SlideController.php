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


        $checkboxes = $request->input('checkbox1'); // Get the array of checkboxes

        $checkedValue = null; // Set a default value for checked value
        
        if ($checkboxes && is_array($checkboxes)) { // Check if checkboxes array is not empty and is an array
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
        
        $a->text1 = $request->input('boxColour3',null);

        $a->text1Format = "S1";

        $a->obj=$request->input('grid1_data', null);
        $a->user_id = auth()->id();
        $a->pres_id = $id;
        $a->text2 = $checkedValue;
        
        

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
