<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Presentation;
use App\Models\Slide;
use Illuminate\Support\Facades\Auth;

class SlideController extends Controller
{
    /*
    public function store(Request $request, $id)
    {
        $validatedData = $request->validate([
            'text1' => ['required', 'string', 'max:2550'],
            'text2' => ['max:3000'],
            'text3' => ['max:3000'],
            'text1Format' => ['max:5'],
            'text2Format' => ['max:5'],
            'text3Format' => ['max:5'],
            'obj' =>['max:2000']
        ]);

        $text1 = $validatedData['text1'];

        //$text1 = $this->removeNewLines($validatedData['text1']);
        $text1 = $this->getBoxType($text1) . $text1;

        $text2 = "";
        if(strlen($validatedData['text2']) > 0){
            $text2 = $validatedData['text2'];
            $text2 =$this->getBoxType($text2) . $text2;

        }
        $text3="";
        if(strlen($validatedData['text3']) > 0){
            $text3 = $validatedData['text3'];
            //$text3 =$this->removeNewLines($validatedData['text3']);
            $text3 =$this->getBoxType($text3) . $text3;
        }

        $a = new Slide;
        $a->text1 = $text1;
        $a->text2 = $text2;
        $a->text3 = $text3;
        $a->text1Format = $validatedData['text1Format'];
        $a->text2Format = $validatedData['text2Format'];
        $a->text3Format = $validatedData['text3Format'];
        $a->obj=$validatedData['obj'];
        $a->user_id = auth()->id();
        $a->pres_id = $id;
        //comment

        $a->save();

        session()->flash('message', 'Slide was created.');
        return redirect()->route('presentations.show', ['id'=> $id]);
    }
    */

    public function store(Request $request, $id){


        $a = new Slide;
        $a->text1 = $request->input('grid1');

        $a->obj=$request->all();
        $a->user_id = auth()->id();
        $a->pres_id = $id;
        //comment

        $a->save();
    }

    private function removeNewLines($str){
        $str = preg_replace('/^\n+/', '', $str);
        $str = preg_replace('/\n+$/', '', $str);
        return $str;
    }

    private function getBoxType($str) {
        $result = "";
        $newlines = substr_count($str, "\n");

        if (strlen($str) < 150) {
            $result = 'F';
        } else {
            //if($newlines < 1){
            $result = 'P';
            //} else{
                //$result = 'L';
            //}
        }
        return $result;
    }

    public function edit($id)
    {
        $presentation = Presentation::findOrFail($id);
        $slides = Slide::where('pres_id', $presentation->id)->get();
        return view('slides.create', ['slides'=>$slides, 'presentation'=>$presentation]);
    }

    
}
