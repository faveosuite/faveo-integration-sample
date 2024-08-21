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
Route::get('/updateConfiguring', function () {
    return view('layout.updateConfiguring');
});
Route::get('/includeFiles', function () {
    return view('layout.includeFiles');
});
Route::get('/apis/{id}', [ApiController::class,'getApiDetails']);
Route::post('/sendRequest', [ApiController::class,'sendRequest']);
Route::get('/apiList/{category_id}',[ApiController::class,'listApi']);
Route::get('/apiCategories',[ApiController::class,'getApiCategories']);
