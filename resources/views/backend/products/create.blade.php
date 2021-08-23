@extends('layouts.backend')

@section('main')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2 class="text-center">Create new product</h2>
{{--                @if ($errors->any())--}}
{{--                    <div class="alert alert-danger">--}}
{{--                        <ul>--}}
{{--                            @foreach ($errors->all() as $error)--}}
{{--                                <li>{{ $error }}</li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                @endif--}}
                <form action="{{route('admin.product.create')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label" >Product Name</label>
                        <input value="{{old('name')}}" placeholder="Enter product name" type="text" class="form-control @error('name') is-invalid @enderror"  name="name" id="name" >
                        @error('name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label ">Product Price</label>
                        <input value="{{old('price')}}" type="number"  placeholder="Enter product price" class="form-control @error('name') is-invalid @enderror"  name="price" id="price" >
                        @error('price')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Product Description</label>
                        <textarea placeholder="Enter product description" class="form-control @error('name') is-invalid @enderror"  name="description" id="description" >{{old('description')}}</textarea>
                        @error('description')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="photo" class=""form-label>Product Photo</label>
                        <input type="file" class="form-control @error('name') is-invalid @enderror" name="photo" id="photo">
                        @error('photo')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Add item</button>
                </form>
            </div>
        </div>
    </div>
@endsection
