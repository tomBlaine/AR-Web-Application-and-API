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


        $checkboxes1 = $request->input('checkbox3'); 
        $checkedValue1 = null; 
        if ($checkboxes1 && is_array($checkboxes1)) {
            foreach ($checkboxes1 as $checkbox1) {
                if ($checkbox1) { 
                    $checkedValue1 = $checkbox1;
                    break; 
                }    
            }
        }
        
        $checkboxes2 = $request->input('checkbox2'); 
        $checkedValue2 = null; 
        if ($checkboxes2 && is_array($checkboxes2)) {
            foreach ($checkboxes2 as $checkbox2) {
                if ($checkbox2) { 
                    $checkedValue2 = $checkbox2;
                    break; 
                }    
            }
        }
        $checkboxes3 = $request->input('checkbox3'); 
        $checkedValue3 = null; 
        if ($checkboxes3 && is_array($checkboxes3)) {
            foreach ($checkboxes3 as $checkbox3) {
                if ($checkbox3) { 
                    $checkedValue3 = $checkbox3;
                    break; 
                }    
            }
        }
        



        $a = new Slide;
        //hello
        
        $a->text1 = $checkedValue1;

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
