<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::paginate(8);
//        dd($orders);
        return view('backend.orders.index',compact('orders'));

    }
    public function show($id)
    {
        $order = Order::where('id',$id)->with('details')->first();
        return view('backend.orders.show',compact('order'));
    }

    public function update(Request $request, $id)
    {
//        dd($request->all());
        $order = Order::find($id);
        $order->update(['status'=>$request->input('status')]);
        return redirect()->back();
    }
}
