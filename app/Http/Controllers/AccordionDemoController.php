<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class AccordionDemoController extends Controller
{
    public function twoLevelAccordionDemo(){
        $orders=Order::whereBetween('OrderID',[10248,10255])->with('customer')->orderBy('OrderID')->get();
        $orderDetails= OrderDetail::whereIn('OrderID',$orders->pluck('OrderID'))->with('product')->orderBy('OrderID')->get();

        return view('accordopmdemos.twolevelaccordion',[
            'orders'=>$orders,
            'orderDetails'=>$orderDetails,
        ]);

    }
        public function multiLevelAccordionDemo() {
        $employeesList = Employee::orderBy( 'EmployeeID' )->get();

        $orderIds = Order::whereIn( 'EmployeeID', $employeesList->pluck( 'EmployeeID' ) )
        ->whereBetween( 'OrderID', [ 10248, 10270 ] )
        ->pluck( 'OrderID' );

        $orders = Order::whereIn( 'OrderID', $orderIds )->orderBy( 'OrderID' )->get();

        $orderDetailsList = OrderDetail::whereIn( 'OrderID', $orderIds )->orderBy( 'OrderID' )->get();

        return view( 'accordopmdemos.multilevelaccordion', [
            'employees' => $employeesList,
            'orders' => $orders,
            'order_details' => $orderDetailsList,
        ] );

    }
}
