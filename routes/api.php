<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PresentationController;
use App\Http\Controllers\APIAuth;
use App\Http\Controllers\APIController;
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

Route::get('/sayhello', function(){
    return "hello";
});

Route::post('/slides/{id}/edit', [APIController::class, 'editSlide']);

Route::get('/presentations/{id}', [APIController::class, 'showPres']);

Route::get('/slides/{id}', [APIController::class, 'showSlides']);

Route::get('/sessions/{code}/slides', [APIController::class, 'showSessionSlides']);

Route::get('/sessions/{code}/info', [APIController::class, 'showSessionInfo']);

Route::get('/sessions/{code}/getSlideNumber', [APIController::class, 'showSlideNumber']);
//protected routes
Route::group(['middleware' => ['auth:sanctum']], function() {
    
    Route::post('/logout', [APIAuth::class, 'logout']);
    
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//a938d9527eb14bdfb9efe45073fa9c18

//1e7143dfafd04ff4891efcb06949a0b4