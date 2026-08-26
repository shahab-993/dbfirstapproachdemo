
@extends('layouts.app')
@section('content')
 <style>
    .my-icon{
        font-size: 14px;
        color: gray;
        cursor: pointer;
        margin-left: 10px;
    }
    #customers{
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }
    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }
    #customers tr:hover{
        background-color: #add;

    }

    #customers th {
        background-color: #ddd;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }
 </style>
 <div class="container">
    @foreach ($orders  as $order )
    <div class="" style="width: 97%;">

        <div class="accordion">
            <table id="customers">
                <thead>
                    <tr>
                        <th>Order ID </th>
                        <th>Order Date</th>
                        <th>Company Name</th>
                        <th style="width: 70%"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $order->OrderID }}</td>
                        <td>{{ $order->OrderDate }}</td>
                        <!-- <td>{{ $order->customer->CustomerName }}</td> -->
                         <td>{{ $order->customer->CustomerName }}<i id="OrderId-{{ $order->OrderID }}" class="my-icon fa fa-plus" onclick="appendTd(event, {{ $order->OrderID }})"></i>
                        </td>

                        <td>

                          <div class="">
                            <table v id="OrderDetails-{{ $order->OrderID }}" style="display:none">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Unit Price</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderDetails as $detail)
                                    @if ($detail->OrderID === $order->OrderID)
                                    <tr>
                                        <td>{{ $detail->product->ProductName }}</td>
                                        <td>{{ $detail->product->Price }}</td>
                                        <td>{{ $detail->Quantity }}</td>
                                    </tr>
                                    @endif
                                        
                                    @endforeach
                                </tbody>
                            </table>
                          </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
        
    @endforeach
 </div>
    
<script>
    function appendTd(event,index){
        var orders =document.getElementById("OrderDetails-"+index);
        orders.style.display=orders.style.display=== 'none' ? 'block': 'none';


        target=event.currentTarget;
        classList=target.classList;
        

    if(classList.contains("fa-plus")){
        classList.remove("fa-plus");
        classList.add('fa-minus');
    }else{
        classList.remove('fa-minus');
        classList.add('fa-plus');
    }



    }
</script>

@endsection