<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Presentation;
use App\Models\Slide;

class APIController extends Controller
{
    public function showPres($id)
    {
        return Presentation::findOrFail($id);
    }

    public function showSlides($id)
    {
        return Slide::where('pres_id', $id)->orderBy('created_at', 'asc')->get();
    }

    public function editSlide(Request $request)
    {
        $validatedData = $request->validate([
            'scale' => ['required', 'float'],
        ]);

        $slide = Slide::findOrFail($id);
        $slide->objScale = $validatedData['scale'];
        $slide->save();
    }
}
