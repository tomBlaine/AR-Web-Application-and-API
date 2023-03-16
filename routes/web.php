<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PresentationController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\SessionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/timeline', [PresentationController::class, 'index'])
    ->name('presentations.index');

Route::get('/sessions/create', [SessionController::class, 'create'])
    ->name('sessions.create')->middleware(['auth']);

Route::get('/sessions/{id}', [SessionController::class, 'show'])
    ->name('sessions.show')->middleware(['auth']);

Route::post('/sessions/{id}/plus', [SessionController::class, 'increment'])
    ->name('sessions.increment')->middleware(['auth']);

Route::post('/sessions/store', [SessionController::class, 'store'])
    ->name('sessions.store')->middleware(['auth']);



Route::get('/presentations/create', [PresentationController::class, 'create'])
    ->name('presentations.create')->middleware(['auth']);

Route::get('/presentations/{id}', [PresentationController::class, 'show'])
    ->name('presentations.show');

Route::get('/presentations/{id}/slide', [SlideController::class, 'edit'])
    ->name('slides.edit')->middleware(['auth']);

Route::post('/presentations/{id}', [SlideController::class, 'store'])
    ->name('slides.store')->middleware(['auth']);


Route::post('/timeline', [PresentationController::class, 'store'])
    ->name('presentations.store')->middleware(['auth']);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
