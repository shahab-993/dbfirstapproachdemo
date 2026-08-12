<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubTotalsDemoController extends Controller
{
    public function index(){
        $newOrders=[];
        $grandTotl=0;
        $runningTotl=0;

        $Orders= DB::select('CALL USP_GetAllOrders()');

        foreach($Orders as $order){
            $grandTotl += $order->BillAmount;
            $runningTotl += $order->BillAmount;

            $newOrders[] = $this->pushData($order,$runningTotl);

        }
        return view('subtotaldemo.index',['Orders' => $newOrders, 'GrandTotal' => $grandTotl]);

    }

public function pushData($order,$runningTotl){
    return[
        'OrderID'=> $order->OrderID,
        'OrderDate' => $order->OrderDate,
        'CompanyName' => $order->CompanyName,
        'ProductName' => $order->ProductName,
        'UnitPrice' => $order->UnitPrice,
        'Quantity' => $order->Quantity,
        'BillAmount' => $order->BillAmount,
        'RunningTotal'=>$runningTotl,

    ];
}

}
