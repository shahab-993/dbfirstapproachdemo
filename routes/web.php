<?php

use App\Http\Controllers\AccordionDemoController;
use App\Http\Controllers\SubTotalsDemoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/subtotals',[SubTotalsDemoController::class,'index']);



Route::get('/twolevelaccordion',[AccordionDemoController::class,'twoLevelAccordionDemo']);





