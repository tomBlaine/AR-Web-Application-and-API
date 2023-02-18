<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PresentationController;
use App\Http\Controllers\APIAuth;
use App\Models\Presentation;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::get('/index', [PresentationController::class, 'index']);


Route::post('/register', [APIAuth::class, 'register']);
Route::post('/login', [APIAuth::class, 'login']);

Route::get('/presentations/{id}', function(){
    return Presentation::where('id', $id)->get();
});

//protected routes
Route::group(['middleware' => ['auth:sanctum']], function() {
    
    Route::post('/logout', [APIAuth::class, 'logout']);
    
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
