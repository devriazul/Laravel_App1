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
                <form action="{{ route('userProfile') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="status">Status</label>
                        <select name="" id="">
                            <option value="pending">Pending</option>
                            <option value="confirmed">Confirmed</option>
                            <option value="processing">Processing</option>
                            <option value="delivered">Delivered</option>
                            <option value="completed">Completed</option>
                            <option value="rejected">Rejected</option>
                        </select>
                    </div>
                    {{-- <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div> --}}
                    <a type="submit" class="btn btn-sm btn-warning" href="{{ route('home') }}">Back</a>
                    <button type="submit" class="btn btn-sm btn-success">Submit</button>

                </form>
            </div>
        </div>
    </div>
@endsection
