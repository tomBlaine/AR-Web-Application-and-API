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


        $checkboxes = $request->input('checkbox1'); 
        $checkedValue1 = null; 
        if ($checkboxes && is_array($checkboxes)) {
            foreach ($checkboxes as $checkbox) {
                if ($checkbox) { 
                    $checkedValue1 = $checkbox;
                    break; 
                }    
            }
        }
        $checkboxes = $request->input('checkbox2'); 
        $checkedValue2 = null; 
        if ($checkboxes && is_array($checkboxes)) {
            foreach ($checkboxes as $checkbox) {
                if ($checkbox) { 
                    $checkedValue2 = $checkbox;
                    break; 
                }    
            }
        }
        $checkboxes = $request->input('checkbox3'); 
        $checkedValue3 = null; 
        if ($checkboxes && is_array($checkboxes)) {
            foreach ($checkboxes as $checkbox) {
                if ($checkbox) { 
                    $checkedValue3 = $checkbox;
                    break; 
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
        $a->text2 = $checkedValue2;
        $a->text3 = $checkedValue3;
        
        

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
