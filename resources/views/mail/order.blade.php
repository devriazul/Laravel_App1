{{-- This is an Email Message Body --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmationa Mail!</title>
    <style>
        table, th, td{
            border: 1px solid green;
        }
        </style>
</head>
<body>
{{-- mail message --}}
    <h1>Order Successful!</h1>

    <div>
        <h3>Order Details</h3>
                <p><strong>Order No: </strong>{{$order->trace_no}}</p>
                <p><strong>Customer name: </strong>{{$order->name}}</p>
                <p><strong>Customer email: </strong>{{$order->email}}</p>
                <p><strong>Customer address: </strong>{{$order->address}}</p>
                <p><strong>Customer Phone: </strong>{{$order->phone}}</p>
                <p><strong>Total price: </strong>{{$order->price}}</p>
                <p><strong>Total quantity: </strong>{{$order->quantity}}</p>
                <p><strong>Status: </strong>{{$order->status}}</p>
                <p><strong>Payment Method: </strong>{{$order->payment_method}}</p>
                <p><strong>Transaction ID: </strong>{{$order->transaction_id}}</p>
                <p><strong>Order Date: </strong>{{$order->created_at}}</p>
    </div>

    <div>
        <h3>Order Summary</h3>
        <table>
            <thead>
            <tr>
                <th scope="col">Product name</th>
                <th scope="col">Unit Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order->details as $key=>$details)
                <tr>
                    <td>{{$details->product_name}}</td>
                    <td>{{$details->product_price}}</td>
                    <td>{{$details->quantity}}</td>
                    <td>{{$details->quantity * $details->product_price}}</td>
                </tr>
            @endforeach

            </tbody>
        </table>

    </div>

    <p>Thank You!</p>
</body>
</html>
