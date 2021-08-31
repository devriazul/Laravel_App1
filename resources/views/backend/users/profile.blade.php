@extends('layouts.backend')

@section('main')
   <div class="container">
        <div class="row mt-5">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                    <div class="card border border-success" style="width: 18rem;">
                        <img class="card-img-top rounded-circle" src="..." alt="User profile photo">
                        <div class="card-body ">
                            <h5 class="card-title text-center">{{auth()->user()->name}}</h5>
                            <p class="card-text"> <strong>Phone: </strong> {{auth()->user()->phone}}</p>
                            <p class="card-text"> <strong>Email: </strong> {{auth()->user()->email}}</p>
                            <p class="card-text"> <strong>Adress: </strong> {{auth()->user()->address}}</p>
                            <a href="#" class="btn btn-warning ">Update info</a>
                        </div>
                    </div>
                </div>
        </div>
   </div>
@endsection