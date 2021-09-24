@extends('layouts.frontend')

@section('main')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h3 class="text-center mb-3">Registration Form</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Full Name</label>
                        <input name="name" type="text" class="form-control" id="name" placeholder="Enter full Name">

                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email Address</label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="Enter email">
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <div class="form-group mb-3">
                        <label for="phone">Phone Number</label>
                        <input name="phone" type="text" class="form-control" id="phone" placeholder="Phone Number">
                    </div>
                    <div class="form-group mb-3">
                        <label for="address">Your address</label>
                        <textarea name="address" id="address" class="form-control" placeholder="Your address"></textarea>
                    </div>
                    {{-- <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div> --}}
                    <a type="submit" class="btn btn-sm btn-warning" href="{{ route('home') }}">Back</a>
                    <button type="submit" class="btn btn-sm btn-success">Register</button>

                </form>
            </div>
        </div>
    </div>
@endsection
