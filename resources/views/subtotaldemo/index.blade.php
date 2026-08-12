@extends('layouts.app')
@section('content')
<div class="container fluid">
    <div class="row">
        <h2>Orders list</h2>


        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Order Date</th>
                    <th>Company Name</th>
                    <th>Product Name</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Bill Amount</th>
                    <th>Running Total Per Report</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Orders as $order )
                <tr>
                    <td>{{ $order['OrderID'] }}</td>
                    <td>{{ $order['OrderDate'] }}</td>
                    <td>{{ $order['CompanyName'] }}</td>
                    <td>{{ $order['ProductName'] }}</td>
                    <td>{{ $order['UnitPrice'] }}</td>
                    <td>{{ $order['Quantity'] }}</td>
                    <td>{{ $order['BillAmount'] }}</td>
                    <td>{{ $order['RunningTotal'] }}</td>
                   
                </tr>
                    
                @endforeach
                <tr>
                    <td colspan="5"></td>
                    <td>Grand Total</td>
                    <td>{{ $GrandTotal }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
    
@endsection