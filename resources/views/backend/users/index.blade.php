@extends('layouts.backend')
 @section('main')
     <div class="container mt-3">
         <table class="table">
             <h2 class="text-center">User List</h2>
             <a href="{{route('admin.user.create')}}" class="btn btn-success">add new user</a>
             <thead>
             <tr>
                 <th scope="col">Sl No:</th>
                 <th scope="col">Name</th>
                 <th scope="col">Email</th>
                 <th scope="col">Phone</th>
                 <th scope="col">Address</th>
                 <th scope="col">Role</th>
                 <th scope="col">Action</th>
             </tr>
             </thead>
             <tbody>
             @foreach($users as $key=>$user)
             <tr>
                 <th scope="row">{{$key+1}}</th>
                 <td>{{$user->name}}</td>
                 <td>{{$user->email}}</td>
                 <td>{{$user->phone}}</td>
                 <td>{{$user->address}}</td>
                 <td>{{$user->role}}</td>
                 {{-- <td>
                     <img src="{{asset('uploads/products/'.$product->photo)}}" alt="" height="50px">
                 </td> --}}
                 <td>
                     <a href="{{route('admin.user.edit',$user->id)}}" class="btn btn-sm btn-warning">Edit</a>
                     <a href="{{route('admin.user.delete',$user->id)}}" class="btn btn-sm btn-danger">Delete</a>
                 </td>
             </tr>
             @endforeach
             </tbody>
         </table>
     </div>
 @endsection
