@extends('layouts.app')
@section('content')
    <style>
        .my-icon {
            font-size: 14px;
            color: gray;
            cursor: pointer;
            margin-left: 10px;
        }

        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
    <div class="container mt-4">

        <button class="btn btn-primary" type="button" onclick="toggleAll(1)">Expand All</button>
        <button class="btn btn-primary" type="button" onclick="toggleAll(2)">Collapse All</button>
        <button class="btn btn-primary" type="button" onclick="toggleAll(3)">Expand All Orders</button>
        <button class="btn btn-primary" type="button" onclick="toggleAll(4)">Collapse All Orders</button>
        <button class="btn btn-primary" type="button" onclick="toggleAll(5)">Expand All Order Details</button>
        <button class="btn btn-primary" type="button" onclick="toggleAll(6)">Collapse All Order Details</button>

        <table id="customers">
            <thead>
                <tr>
                    <th>Employee ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr valign="top">
                        <td>{{ $employee->EmployeeID }}</td>
                        <td>{{ $employee->FirstName }}</td>
                        {{-- <td>{{ $employee->LastName }}</td> --}}
                        <td>{{ $employee->LastName }}
                            <i id="EmployeeId-{{ $employee->employeeid }}"
                                onclick="appendTd(event, {{ $employee->EmployeeID }}, 1)"
                                class="my-icon fa fa-solid fa-plus"></i>
                        </td>

                        <td>
                            <table id="Orders_{{ $employee->EmployeeID }}" class="table" style="display:none">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Order Date</th>
                                        <th>Company Name</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($orders as $order)
                                        @if ($order->EmployeeID == $employee->EmployeeID)
                                            <tr>
                                                <td>{{ $order->OrderID }}</td>
                                                <td>{{ $order->OrderDate }}</td>
                                                {{-- <td>{{ $order->customer->CustomerName }}</td> --}}
                                                <td>{{ $order->customer->CustomerName }}
                                                    <i id="OrderId-{{ $order->OrderID }}"
                                                        onclick="appendTd(event, {{ $order->OrderID }}, 2)"
                                                        class="my-icon fa fa-solid fa-plus"></i>
                                                </td>
                                                <td>

                                                    <table id="OrderDetails_{{ $order->OrderID }}" class="table"
                                                        style="display:none">
                                                        <thead>
                                                            <tr>
                                                                <th>Product Name</th>
                                                                <th>Unit Price</th>
                                                                <th>Quantity</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($order_details as $order_detail)
                                                                @if ($order_detail->OrderID == $order->OrderID)
                                                                    <tr>
                                                                        <td>{{ $order_detail->product->ProductName }}</td>
                                                                        <td>{{ $order_detail->product->Price }}</td>
                                                                        <td>{{ $order_detail->Quantity }}</td>
                                                                    </tr>
                                                                @endif
                                                            @endforeach

                                                        </tbody>
                                                    </table>





                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>









                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <script>
        function appendTd(event, index, level) {
            if (level === 1) {
                const orders = document.getElementById("Orders_" + index);
                orders.style.display = orders.style.display === 'none' ? 'block' : 'none';
            } else if (level === 2) {
                const orderDetails = document.getElementById("OrderDetails_" + index);
                orderDetails.style.display = orderDetails.style.display === 'none' ? 'block' : 'none';
            }

            const target = event.currentTarget;
            target.classList.toggle("fa-plus");
            target.classList.toggle("fa-minus");


        }

        function toggleAll(index) {
            const ordersTables = $('table[id^="Orders_"]');
            const orderDetailsTables = $('table[id^="OrderDetails_"]');
            const employeeIcons = $('i[id^="EmployeeId"]');
            const orderIcons = $('i[id^="OrderId"]');

            if (index === 1) {
                ordersTables.show();
                orderDetailsTables.show();
                employeeIcons.addClass("fa-minus").removeClass("fa-plus");
                orderIcons.addClass("fa-minus").removeClass("fa-plus");
            } else if (index === 2) {
                ordersTables.hide();
                orderDetailsTables.hide();
                employeeIcons.addClass("fa-plus").removeClass("fa-minus");
                orderIcons.addClass("fa-plus").removeClass("fa-minus");
            } else if (index === 3) {
                ordersTables.show();
                orderDetailsTables.hide();
                employeeIcons.addClass("fa-minus").removeClass("fa-plus");
                orderIcons.addClass("fa-minus").removeClass("fa-plus");
            } else if (index === 4) {
                ordersTables.hide();
                orderDetailsTables.hide();
                employeeIcons.addClass("fa-plus").removeClass("fa-minus");
                orderIcons.addClass("fa-plus").removeClass("fa-minus");
            } else if (index === 5) {
                orderDetailsTables.show();
                orderIcons.addClass("fa-minus").removeClass("fa-plus");
            } else if (index === 6) {
                orderDetailsTables.hide();
                orderIcons.addClass("fa-plus").removeClass("fa-minus");
            }




        }
    </script>
@endsection
