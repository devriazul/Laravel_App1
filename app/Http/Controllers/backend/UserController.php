<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

// use GuzzleHttp\Psr7\Request;



class UserController extends Controller
{
    public function index()
    {
        // return "Riaz";

        $users = User::all();
        return view('backend.users.index', compact('users'));
    }
    public function create()
    {
        return view('backend.users.create');
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'email' => 'required | unique:users,email',
                'password' => 'required | confirmed',
            ]);
            $inputs = [
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'role' => 'admin',

            ];

            User::create($inputs);
            return redirect()->route('admin.user');
        } catch (\Exception $exception) {
            $error = $exception->validator->getMessageBag();
            return redirect()->back()->withErrors($error)->withInput();
        }
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('backend.users.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        // $user = User::find($id);
        $inputs = [
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => 'admin',

        ];
        User::where('id', $id)->update($inputs);
        return redirect()->route('admin.user');
    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }
}
