<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class AccordionDemoController extends Controller
{
    public function twoLevelAccordionDemo(){
        $orders=Order::whereBetween('OrderID',[10248,10255])->with('customer')->orderBy('OrderID')->get();
        $orderDetails= OrderDetail::whereIn('OrderID',$orders->pluck('OrderID'))->with('product')->orderBy('OrderID')->get();

        return view('accprdopmdemos.twolevelaccordion',[
            'orders'=>$orders,
            'orderDetails'=>$orderDetails,
        ]);

    }
}
 