<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Presentation;
use App\Models\Slide;

class APIController extends Controller
{
    public function show($id)
    {
        return Presentation::findOrFail($id);
    }
}
