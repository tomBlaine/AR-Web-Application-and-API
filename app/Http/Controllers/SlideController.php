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


        $checkboxes1 = $request->input('checkbox1'); 
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

        
        $a->text1 = $request->input('grid1_data', "");
        $a->text1Format = $checkedValue1.($request->input('boxPos1', ""));

        $a->text2 = $request->input('grid2_data', "");
        $a->text2Format = $checkedValue2.($request->input('boxPos2', ""));

        $a->text3 = $request->input('grid3_data', "");
        $a->text3Format = $checkedValue3.($request->input('boxPos3', ""));

        $string = $request['obj'];
        $parts = explode('-', $string);
        
        $a->obj= end($parts);
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

    public function destroy($id)
    {
        
        $slide = Slide::findOrFail($id);
        $presentationID = $slide->pres_id;
        $slide->delete();
        return redirect()->route('presentations.show', ['id'=>$presentationID])->with('message', 'slide was deleted.');
    }

    public function update(Request $request, $id)
    {
        
        $slide = Slide::findOrFail($id);

        

        $checkboxes1 = $request->input('editCheckbox1'); 
        $selectedBox = null; 
        if ($checkboxes1 && is_array($checkboxes1)) {
            foreach ($checkboxes1 as $checkbox1) {
                if ($checkbox1) { 
                    $selectedBox = $checkbox1;
                    break; 
                }    
            }
        }
        if($selectedBox == null)
        {
            $selectedBox = substr(($slide->text1Format),0,1);
        }
        
        
        $newBoxPos1 = null;
        if($request->has('editBoxPos1'))
        {
            $newBoxPos1 = $request->input('editBoxPos1', null);
        }

        if($newBoxPos1==null || $newBoxPos1=="")
        {
            $newBoxPos1 = substr(($slide->text1Format),1,1);
        }

        if(($selectedBox.$newBoxPos1)!=$slide->text1Format)
        {
            $slide->text1Format = $selectedBox.$newBoxPos1;
            
        }


        $checkboxes2 = $request->input('editCheckbox2'); 
        $selectedBox2 = null; 
        if ($checkboxes2 && is_array($checkboxes2)) {
            foreach ($checkboxes2 as $checkbox2) {
                if ($checkbox2) { 
                    $selectedBox2 = $checkbox2;
                    break; 
                }    
            }
        }
        if($selectedBox2 == null)
        {
            $selectedBox2 = substr(($slide->text2Format),0,1);
        }
        
        
        $newBoxPos2 = null;
        if($request->has('editBoxPos2'))
        {
            $newBoxPos2 = $request->input('editBoxPos2', null);
        }

        if($newBoxPos2==null || $newBoxPos2=="")
        {
            $newBoxPos2 = substr(($slide->text2Format),1,1);
        }

        if(($selectedBox2.$newBoxPos2)!=$slide->text2Format)
        {
            $slide->text2Format = $selectedBox2.$newBoxPos2;
            
        }


        $checkboxes3 = $request->input('editCheckbox3'); 
        $selectedBox3 = null; 
        if ($checkboxes3 && is_array($checkboxes3)) {
            foreach ($checkboxes3 as $checkbox3) {
                if ($checkbox3) { 
                    $selectedBox3 = $checkbox3;
                    break; 
                }    
            }
        }
        if($selectedBox3 == null)
        {
            $selectedBox3 = substr(($slide->text3Format),0,1);
        }
        
        
        $newBoxPos3 = null;
        if($request->has('editBoxPos3'))
        {
            $newBoxPos3 = $request->input('editBoxPos3', null);
        }

        if($newBoxPos3==null || $newBoxPos3=="")
        {
            $newBoxPos3 = substr(($slide->text3Format),1,1);
        }

        if(($selectedBox3.$newBoxPos3)!=$slide->text3Format)
        {
            $slide->text3Format = $selectedBox3.$newBoxPos3;
            
        }


        $slide->text1 = $request->input('text1');
        $slide->text2 = $request->input('text2');
        $slide->text3 = $request->input('text3');

        

        $slide->save();
        
        

        return redirect()->route('presentations.show', ['id'=>$slide->pres_id])->with('message', 'slide was updated.');
    }

    
}
