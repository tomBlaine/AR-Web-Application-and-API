<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Presentation;
use App\Models\Slide;
use App\Models\Session;

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

    public function editSlide(Request $request, $id)
    {

        $validatedData = $request->validate([
            'scale' => ['required', 'numeric'],
        ]);
        

        $slide = Slide::findOrFail($id);
        $slide->objScale = $validatedData['scale'];
        $slide->save();
        return response()->json(['message' => 'Float saved successfully']);
    }

    public function showSessionSlides($code)
    {
        $session = Session::where('code', $code)->get()->first();
        return Slide::where('pres_id', $session->pres_id)->orderBy('created_at', 'asc')->get();
    }

    public function showSessionInfo($code)
    {
        return Session::where('code', $code)->get()->first();
    }

    public function showSlideNumber($code)
    {
        $session = Session::where('code', $code)->get()->first();
        return $session->currentSlide;
    }
}
