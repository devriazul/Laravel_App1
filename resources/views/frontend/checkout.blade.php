@extends('layouts.frontend')
@section('main')
    <div class="container">
        <div class="row mt-3">
            <h3 class="text-center ">Place Order</h3>
            <div class="col-md-6">
                <h3 class="text-center ">Cart Item</h3>

                <table class="table">
                    <thead>
                    <tr>
                        {{--                        <th scope="col">#</th>--}}
                        <th scope="col">Product name</th>
                        <th scope="col">Unit Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $total_quantity = 0;
                        $total_price = 0;
                    @endphp

                    @foreach($carts as $key=>$cart)
                        <tr>
                            {{--                          <th scope="row"></th>--}}
                            <td>{{$cart['name']}}</td>
                            <td>{{$cart['price']}} ৳</td>
                            <td>{{$cart['quantity']}}</td>
                            <td>{{$cart['quantity']*$cart['price']}} ৳</td>
                        </tr>
                        @php
                            $total_quantity +=  $cart['quantity'];
                            $total_price += $cart['quantity']*$cart['price'];
                        @endphp
                    @endforeach
                    <tr>
                        {{--                          <th scope="row"></th>--}}
                        <td></td>
                        <td>Total</td>
                        <td>{{$total_quantity}}</td>
                        <td>{{$total_price}}</td>
                    </tr>

                    </tbody>
                </table>
                @if($total_quantity == 0)
                    <div class="btn-warning">
                        <p  href="">No Product Found! Please add <a href="{{route('home')}}">Product!</a></p>
                    </div>
                @else
                    <a class="btn btn-sm btn-outline-success" href="{{route('home')}}">+ Add more</a>
                @endif

            </div>
            <div class="col-md-6">
                <h3 class="text-center mb-3">User Info</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('order')}}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Confirm Full Name</label>
                        <input name="name" type="text" class="form-control" id="name" placeholder="Enter full Name" value="{{auth()->user()->name}}">

                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Confirm Email Address</label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="Enter email" value="{{auth()->user()->email}}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="phone">Confirm Phone Number</label>
                        <input name="phone" type="text" class="form-control" id="phone" placeholder="Phone Number" value="{{auth()->user()->phone}}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="address">Your shipping address</label>
                        <textarea name="address" id="address" class="form-control" placeholder="Your address">{{auth()->user()->address}}</textarea>
                    </div>
                    {{-- <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div> --}}
                    <input type="hidden" name="price" value="{{$total_price}}">
                    <input type="hidden" name="quantity" value="{{$total_quantity}}">

                    <a type="submit" class="btn btn-sm btn-warning" href="{{ route('home') }}">Back</a>
                    <button type="submit" class="btn btn-sm btn-outline-danger">Place Order</button>

                </form>
            </div>
        </div>
    </div>
@endsection
