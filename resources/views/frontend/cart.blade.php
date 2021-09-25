@extends('layouts.frontend')
@section('main')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h3 class="text-center mt-3">Your cart</h3>
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
        </div>
    </div>
@endsection
