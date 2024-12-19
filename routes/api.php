<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CovidSurveyController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/covid-survey', [CovidSurveyController::class, 'index']);
Route::post('/covid-survey', [CovidSurveyController::class, 'store']);