<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EleveController;
use App\Http\Middleware\VerifierAge;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('eleve', EleveController::class)->middleware('VerifierAge');