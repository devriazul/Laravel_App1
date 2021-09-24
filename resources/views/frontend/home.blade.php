@extends('layouts.frontend')
@section('main')

<section class="py-5 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Album example</h1>
            <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
            <p>
                <a href="{{route('cart')}}" class="btn btn-primary my-2">Show cart</a>
{{--                <a href="#" class="btn btn-secondary my-2">Secondary action</a>--}}
            </p>
        </div>
    </div>
</section>

<div class="album py-5 bg-light">
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach($products as $product)
            <div class="col">
                <div class="card shadow-sm">
                    <img src="{{asset('uploads/products/'.$product->photo)}}" alt="" height="200px">
                   <div class="card-body">
                       <h5 class="text-center mt-3 mb-2">{{$product->name}}</h5>
                       <p  class="text-center mt-3 mb-2">{{$product->description}} <a href="">Read more...</a></p>
                       <h6  class="text-center mt-3 mb-2">Price: {{$product->price}}</h6>
                       <div class="d-flex justify-content-between align-items-center">
                           <div class="btn-group">
                               <a href="{{route('add.cart',$product->id)}}" class="btn btn-sm btn-outline-secondary">Add to Cart</a>
                           </div>
                           <small class="text-muted">9 mins ago </small>
                       </div>
                   </div>

                </div>
            </div>
            @endforeach
    </div>
</div>
@endsection
