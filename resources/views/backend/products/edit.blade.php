@extends('layouts.backend')

@section('main')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2 class="text-center">Edit product</h2>
                <form action="{{route('admin.product.edit',$product->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" class="form-control"  name="name" id="name" required value="{{$product->name}}">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Product Price</label>
                        <input type="number" class="form-control"  name="price" id="price" required value="{{$product->price}}">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Product Description</label>
                        <textarea class="form-control"  name="description" id="description" required>{{$product->description}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="photo" class=""form-label>Product Photo</label>
                        <input type="file" class="form-control" name="photo" id="photo">
                        <img src="{{asset('uploads/products/'.$product->photo)}}" alt="" height="100px">
                    </div>

                    <button type="submit" class="btn btn-warning">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
