<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function userProfile()
    {
        return view('frontend.profile');
    }
    public function editProfile(Request $request)
    {
            $request->validate([
                'name' => 'required',
                'phone' => 'required',
                'address' => 'required',
            ]);
            $user = auth()->user();
                $inputs = [

                    'name'=> $request->input('name'),
                    'phone'=> $request->input('phone'),
                    'address'=> $request->input('address'),
                ];
            $user->update($inputs);

            if ($request->file('photo')) {
                if (file_exists('uploads/users/' . $user->photo)) {
                    unlink('uploads/users/' . $user->photo);
                }

                $newName = 'user_' . time() . '.' . $request->file('photo')->getClientOriginalExtension();
                $request->photo->move('uploads/users/', $newName);
                $user->update(['photo' => $newName]);
            }
            return redirect()->back();
    }

    public function register()
    {
        if (auth()->user()){
            if (auth()->user()->role == 'admin'){
                    return redirect()->route('admin.dashboard');

                }
                return redirect()->route('home');
        }
        return view ('auth.register');
    }
    public function doRegister(Request $request)
    {
        $request->validate([
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required|min:3',
                'phone' => 'required',
                'address' => 'required',
            ]);
            $inputs = [
                'name'=> $request->input('name'),
                'email'=> $request->input('email'),
                'password'=>Hash::make ($request->input('password')),
                'phone'=> $request->input('phone'),
                'address'=> $request->input('address'),
                'role'=> 'customer',

            ];
            User::create($inputs);
            return redirect()->route('login');
    }
}