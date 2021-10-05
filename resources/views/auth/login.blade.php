@extends('layouts.frontend')

@section('main')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h3 class="text-center mb-3">Login Form</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Email address</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                            placeholder="Enter email">

                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputPassword1">Password</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1"
                            placeholder="Password">
                    </div>
                    {{-- <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div> --}}
                    <a type="submit" class="btn btn-sm btn-warning" href="{{ route('home') }}">Back</a>
                    <button type="submit" class="btn btn-sm btn-primary">Login</button>
                    <a type="submit" class="btn btn-sm btn-success" href="{{ route('register') }}">Register</a>

                </form>
                <br>
            </div>
        </div>
    </div>
@endsection
