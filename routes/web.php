<?php

use App\Http\Controllers\SubTotalsDemoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/subtotals',[SubTotalsDemoController::class,'index']);





