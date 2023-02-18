<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Presentation;
use App\Models\Slide;
use Illuminate\Support\Facades\Auth;

class SlideController extends Controller
{
    public function store(Request $request, $id)
    {
        $validatedData = $request->validate([
            'text1' => ['required', 'string', 'max:255'],
            'text2' => ['max:3000'],
            'text3' => ['max:3000'],
            'obj' =>['max:2000']
        ]);

        //$text1 = $validatedData['text1'];

        //$text1 = $this->removeNewLines($validatedData['text1']);
        $text1 = $this->getBoxType($text1) . $text1;

        //if(strlen($validatedData['text2']) > 0){
            //$text2 = removeNewLines($validatedData['text2']);
            //$text2 = getBoxType($text2) . $text2;
        //}
        //if(strlen($validatedData['text3']) > 0){
        //    $text3 = removeNewLines($validatedData['text3']);
        //    $text3 = getBoxType($text3) . $text3;
        //}

        $a = new Slide;
        $a->text1 = $text1;
        $a->text2 = $text1;
        $a->text3 = $text1;
        $a->obj=$validatedData['obj'];
        $a->user_id = auth()->id();
        $a->pres_id = $id;
         

        $a->save();

        session()->flash('message', 'Post was created.');
        return redirect()->route('presentations.show', ['id'=> $id]);
    }

    private function removeNewLines($str){
        $str = preg_replace('/^\n+/', '', $str);
        // remove new lines from end of string
        $str = preg_replace('/\n+$/', '', $str);
        // return modified string
        return $str;
    }

    private function getBoxType($str) {
        $result = "";

        if (strlen($str) < 150) {
            $result = 'F';
        } else {
            $length = strlen($str);
            $newLines = 0;
            for ($i = 0; $i < $length; $i++) {
                if ($str[$i] == "\n") {
                    $newLines = 1;
                }
            }
            if($newLines==0){
                $result = 'P';
            } else{
                $result = 'L';
            }
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
