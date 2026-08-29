<?php

use App\Http\Controllers\AccordionDemoController;
use App\Http\Controllers\CalculateController;
use App\Http\Controllers\ChartDemoController;
use App\Http\Controllers\SubTotalsDemoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/subtotals',[SubTotalsDemoController::class,'index']);



Route::get('/twolevelaccordion',[AccordionDemoController::class,'twoLevelAccordionDemo']);
Route::get('/multilevelaccordion', [AccordionDemoController::class, 'multiLevelAccordionDemo']);


Route::get('/calculate',[CalculateController::class,'index']);
Route::post('/calculate',[CalculateController::class,'calculate'])->name('calculate');

Route::get('/charts',[ChartDemoController::class,'home']);
Route::get('/get-chart-data/{chartType}', [ChartDemoController::class, 'getChartData']);


