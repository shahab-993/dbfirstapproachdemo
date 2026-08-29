<?php

namespace App\Http\Controllers;

use App\Models\SalesData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ChartDemoController extends Controller
{
    public function home()
    {
         return view('charts.index');
    }

public function getChartData(Request $request, $chartType){
    $salesData= SalesData::select('month', 'sales')->get();

    $chartData =[
        'labels' => $salesData->pluck('month')->toArray(),
        'data'=> $salesData->pluck('sales')->toArray(),
    ];
    return Response::json($chartData);


}

}
