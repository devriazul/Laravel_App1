@extends('layouts.backend')
 @section('main')
     {{-- <div class="container mt-3">
         <table class="table">
             <h2 class="text-center">Products List</h2>
             <a href="{{route('admin.product.create')}}" class="btn btn-success">add new item</a>
             <thead>
             <tr>
                 <th scope="col">Serial No:</th>
                 <th scope="col">Product Name</th>
                 <th scope="col">Price</th>
                 <th scope="col">Description</th>
                 <th scope="col">Photo</th>
                 <th scope="col">Action</th>
             </tr>
             </thead>
             <tbody>
             @foreach($products as $key=>$product)
             <tr>
                 <th scope="row">{{$key+1}}</th>
                 <td>{{$product->name}}</td>
                 <td>{{$product->price}} BDT</td>
                 <td>{{$product->description}}</td>
                 <td>
                     <img src="{{asset('uploads/products/'.$product->photo)}}" alt="" height="50px">
                 </td>
                 <td>
                     <a href="{{route('admin.product.edit',$product->id)}}" class="btn btn-warning">Edit</a>
                     <a href="{{route('admin.product.delete',$product->id)}}" class="btn btn-danger">Delete</a>
                 </td>
             </tr>
             @endforeach
             </tbody>
         </table>
         {{$products->links()}}
     </div> --}}
     <div class="container mt-3">
        <h2 class="text-center">Products List</h2>

        <table id="table_id" class="display">
            <thead>
                <tr>
                    <th scope="col">Serial No:</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $key=>$product)
                 <tr>
                     <th scope="row">{{$key+1}}</th>
                     <td>{{$product->name}}</td>
                     <td>{{$product->price}} BDT</td>
                     <td>{{$product->description}}</td>
                     <td>
                         <img src="{{asset('uploads/products/'.$product->photo)}}" alt="" height="50px">
                     </td>
                     <td>
                         <a href="{{route('admin.product.edit',$product->id)}}" class="btn btn-warning">Edit</a>
                         <a href="{{route('admin.product.delete',$product->id)}}" class="btn btn-danger">Delete</a>
                     </td>
                 </tr>
                 @endforeach
            </tbody>
        </table>
     </div>
 @endsection
