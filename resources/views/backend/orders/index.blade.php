@extends('layouts.backend')

@section('main')
    <div class="container mt-3">
        <table class="table">
            <h2 class="text-center">Orders List</h2>
            <a href="{{route('admin.product.create')}}" class="btn btn-success">add new item</a>
            <thead>
            <tr>
                <th scope="col">Serial No:</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $key=>$order)
                <tr>
                    <th scope="row">{{$key+1}}</th>

                    <td>
                        <a href="" class="btn btn-warning">Edit</a>
                        <a href="" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
