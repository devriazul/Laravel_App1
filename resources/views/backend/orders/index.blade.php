@extends('layouts.backend')

@section('main')
    <div class="container mt-3">
        <table class="table">
            <h2 class="text-center">Orders List</h2>
            <thead>
            <tr>
                <th scope="col">Serial No:</th>
                <th scope="col">Order Date</th>
                <th scope="col">Order No</th>
                <th scope="col">Customer Email</th>
                <th scope="col">Price</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $key=>$order)
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <th><span class="btn btn-sm btn-outline-success">
                            {{$order->created_at->format('d-m-Y')}}
                        </span></th>
                    <th>{{$order->trace_no}}</th>
                    <th>{{$order->email}}</th>
                    <th>{{$order->price}}</th>
                    <th>{{$order->status}}</th>

                    <td>
                        <a href="{{route('admin.order.show',$order->id)}}" class="btn btn-sm btn-warning">View</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$orders->links()}}
    </div>

@endsection
