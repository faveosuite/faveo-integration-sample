<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout.integrationIntroduction');
});

Route::get('/configuring', function () {
    return view('layout.configuring');
});
Route::get('/callingFunction', function () {
    return view('layout.callingFunction');
});
Route::get('/updateCalling',function (){
    return view('layout.updateCallingFunction');
});
Route::get('/updateConfiguring', function () {
    return view('layout.updateConfiguring');
});
Route::get('/includeFiles', function () {
    return view('layout.includeFiles');
});
Route::get('/encoding',function (){
    return view('layout.encoding');
});
Route::get('/apis/{id}', [ApiController::class,'getApiDetails']);
Route::post('/sendRequest', [ApiController::class,'sendRequest']);
Route::post('/updateApiSetting', [ApiController::class,'updateApiSetting']);
Route::get('/apiList',[ApiController::class,'listApi']);
Route::get('/getSettings',[ApiController::class,'getSettings']);
Route::post('/hashGenerator',[ApiController::class,'hashGenerator']);
