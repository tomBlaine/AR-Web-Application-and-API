<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PresentationController;

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



Route::get('/presentations/create', [PresentationController::class, 'create'])
    ->name('presentations.create')->middleware(['auth']);

Route::get('/presentations/{id}', [PresentationController::class, 'show'])
    ->name('presentations.show');

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
