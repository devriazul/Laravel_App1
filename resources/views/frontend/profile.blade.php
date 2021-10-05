@extends('layouts.frontend')

@section('main')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6">
                <h3 class="text-center mb-3">Profile Details</h3>
                <img src="{{ asset('uploads/users/' . auth()->user()->photo) }}" alt="" height="200px"
                    class="m-5">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('userProfile') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Full Name</label>
                        <input name="name" type="text" class="form-control" id="name" placeholder="Enter full Name"
                            value="{{ auth()->user()->name }}">

                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email"
                            value="{{ auth()->user()->email }}" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label for="phone">Phone Number</label>
                        <input name="phone" type="text" class="form-control" id="phone" placeholder="Phone Number"
                            value="{{ auth()->user()->phone }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="address">Your address</label>
                        <textarea name="address" id="address" class="form-control"
                            placeholder="Your address">{{ auth()->user()->address }}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="photo">Profile Image</label>
                        <input name="photo" type="file" class="form-control" id="photo" placeholder="photo">
                    </div>
                    {{-- <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div> --}}
                    <a type="submit" class="btn btn-sm btn-warning" href="{{ route('home') }}">Back</a>
                    <button type="submit" class="btn btn-sm btn-success">Update</button>

                </form>
            </div>
            <div class="col-md-6">
                <h2 class="text-center">Order List</h2>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Serial No</th>
                        <th scope="col">Order No</th>
                        <th scope="col">Price</th>
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(auth()->user()->order as $key=>$order)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$order->trace_no}}</td>
                            <td>{{$order->price}}</td>
                            <td>
                                <p class="btn btn-outline-success">
                                    {{$order->created_at->format('Y-m-d')}}
                                </p>
                            </td>
                            <td>{{$order->status}}</td>
                            <td>
                                <a href="{{route('order.show',$order->id)}}" class="btn btn-sm btn-primary">View</a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
