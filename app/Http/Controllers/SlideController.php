<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Presentation;
use App\Models\Slide;

class SlideController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'text1' => ['required', 'string', 'max:255'],
            'text2' => ['string', 'max:3000'],
            'text3' => ['string', 'max:3000'],
            'obj' =>['max:2000']
        ]);

        $a = new Slide;
        $a->text1 = $validatedData['text1'];
        $a->text2 = $validatedData['text2'];
        $a->text3 = $validatedData['text3'];
        $a->obj=$validatedData['obj'];
        $a->user_id = auth()->id();
        $a->pres_id = $id;
         

        $a->save();

        session()->flash('message', 'Post was created.');
        return redirect()->route('presentations.index');
    }
}
