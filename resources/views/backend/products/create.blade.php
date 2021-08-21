@extends('layouts.backend')

@section('main')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2 class="text-center">Create new product</h2>
                <form action="{{route('admin.product.create')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" class="form-control"  name="name" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Product Price</label>
                        <input type="number" class="form-control"  name="price" id="price" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Product Description</label>
                        <textarea class="form-control"  name="description" id="description" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="photo" class=""form-label>Product Photo</label>
                        <input type="file" class="form-control" name="photo" id="photo">
                    </div>

                    <button type="submit" class="btn btn-primary">Add item</button>
                </form>
            </div>
        </div>
    </div>
@endsection
