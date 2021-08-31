@extends('layouts.backend')

@section('main')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2 class="text-center">Edit user</h2>
               {{-- @if ($errors->any())
                   <div class="alert alert-danger">
                       <ul>
                           @foreach ($errors->all() as $error)
                               <li>{{ $error }}</li>
                           @endforeach
                       </ul>
                   </div>
               @endif --}}
                <form action="{{route('admin.user.edit',$user->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label" > Name</label>
                        <input value="{{$user->name}}" type="text" class="form-control @error('name') is-invalid @enderror"  name="name" id="name" >
                        @error('name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label ">Phone</label>
                        <input value="{{$user->phone}}" type="text"   class="form-control @error('phone') is-invalid @enderror"  name="phone" id="phone" >
                        @error('phone')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class=""form-label>Email</label>
                        <input value="{{$user->email}}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email">
                        @error('email')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Adress</label>
                        <textarea class="form-control @error('address') is-invalid @enderror"  name="address" id="description" >{{$user->address}}</textarea>
                        @error('address')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class=""form-label>Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                        @error('password')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class=""form-label>Confirm Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" id="password_confirmation">
                        @error('password_confirmation')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Edit user</button>
                </form>
            </div>
        </div>
    </div>
@endsection
