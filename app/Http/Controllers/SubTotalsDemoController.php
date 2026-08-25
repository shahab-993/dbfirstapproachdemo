<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubTotalsDemoController extends Controller
{
    public function index()
    {
        $newOrders = [];
        $grandTotl = 0;
        $runningTotl = 0;
        $runningOrderTotal = 0;
        $previousOrderId = 0;

        $Orders = DB::select('CALL USP_GetAllOrders()');

        foreach ($Orders as $order) {

            if ($previousOrderId == 0) {
                $previousOrderId=$order->OrderID;

                $grandTotl += $order->BillAmount;
                $runningTotl += $order->BillAmount;
                $runningOrderTotal += $order->BillAmount;
                $newOrders[] = $this->pushData($order, $runningTotl,$runningOrderTotal);
            } elseif ($previousOrderId == $order->OrderID) {
                $grandTotl += $order->BillAmount;
                $runningTotl += $order->BillAmount;
                $runningOrderTotal += $order->BillAmount;
                $newOrders[] = $this->pushData($order, $runningTotl,$runningOrderTotal);
            } else {
                $newOrders[] = $this->pushData(0, 0,$runningOrderTotal);

                $previousOrderId=$order->OrderID;
                $runningOrderTotal=0;
                $grandTotl += $order->BillAmount;
                $runningTotl += $order->BillAmount;
                $runningOrderTotal += $order->BillAmount;
                $newOrders[] = $this->pushData($order, $runningTotl,$runningOrderTotal);
            }


        }
                $newOrders[] = $this->pushData(0, 0,$runningOrderTotal);

        return view('subtotaldemo.index', ['Orders' => $newOrders, 'GrandTotal' => $grandTotl]);
    }

    public function pushData($order, $runningTotl,$runningOrderTotal)
    {
   if ($order === 0) {
    return [
        'OrderID' => '',
        'OrderDate' => '',
        'CompanyName' => '',
        'ProductName' => '',
        'UnitPrice' => '',
        'Quantity' => '',
        'BillAmount' => '',
        'RunningTotal' =>$runningOrderTotal,
        'RunningOrderTotal' => '',
    ];
}
        return [
            'OrderID' => $order->OrderID,
            'OrderDate' => $order->OrderDate,
            'CompanyName' => $order->CompanyName,
            'ProductName' => $order->ProductName,
            'UnitPrice' => $order->UnitPrice,
            'Quantity' => $order->Quantity,
            'BillAmount' => $order->BillAmount,
            'RunningTotal' => $runningTotl,
            'RunningOrderTotal'=>$runningOrderTotal,

        ];
    }
}
