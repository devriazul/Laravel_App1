@extends('layouts.backend')

@section('main')

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6">
                <h3 class="text-center mb-3">Order Details</h3>
{{--                <img src="{{ asset('uploads/users/' . auth()->user()->photo) }}" alt="" height="200px"--}}
{{--                     class="m-5">--}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
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
            <div class="col-md-6">
                <h3 class="text-center">Order Summary</h3>
                <table class="table">
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
                <form action="{{ route('admin.order.show',$order->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="status">Status</label>
                        <select name="status" id="status">
                            <option value="pending" {{$order->status == 'pending'?'selected':''}}>Pending</option>
                            <option value="confirmed" {{$order->status == 'confirmed'?'selected':''}}>Confirmed</option>
                            <option value="processing" {{$order->status == 'processing'?'selected':''}}>Processing</option>
                            <option value="delivered" {{$order->status == 'delivered'?'selected':''}}>Delivered</option>
                            <option value="completed" {{$order->status == 'completed'?'selected':''}}>Completed</option>
                            <option value="rejected" {{$order->status == 'rejected'?'selected':''}}>Rejected</option>
                        </select>
                    </div>
                    {{-- <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div> --}}
                    <a type="submit" class=" btn btn-sm btn-warning" href="{{ route('home') }}">Back</a>
                    <button type="submit" class="btn btn-sm btn-success">Order Manage</button>

                </form>
            </div>
        </div>
    </div>
@endsection
