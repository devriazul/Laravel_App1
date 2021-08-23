<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;
use function GuzzleHttp\Promise\exception_for;

class ProductController extends Controller
{
    public function index()
    {
        $product=Product::orderBy('id','desc')->get();

        return view('backend.products.index',compact('product'));
    }

    public function create()
    {
        return view('backend.products.create');
    }

    public function store(Request $request)
    {
        try{
            $request->validate([
                'name'=>'required|min:5|max:30',
                'price'=>'required',
                'description'=>'required',
                'photo'=>'required|image',

            ]);
            $newName = 'product_'.time().'.'.$request->file('photo')->getClientOriginalExtension();
            $request->photo->move('uploads/products/',$newName);

            $data = [
                'name'=> $request ->input('name'),
                'price'=> $request ->input('price'),
                'description'=> $request ->input('description'),
                'photo'=> $newName

            ];
            Product::create($data);
            return redirect()->route('admin.product');
        }catch (\Exception $exception){

            $errors =  $exception->validator->getMessageBag();
            return redirect()->back()->withErrors($errors)->withInput();
        }
    }
    public function edit($id)
    {
        $product = Product::find($id);
        return view('backend.products.edit',compact('product'));
    }

    public function update(Request $request, $id)
    {
        try{
            $request->validate([
                'name'=>'required|min:5|max:30',
                'price'=>'required',
                'description'=>'required',
                'photo'=>'image',

            ]);
        $product =Product::find($id);
        $data = [
            'name'=> $request ->input('name'),
            'price'=> $request ->input('price'),
            'description'=> $request ->input('description'),
        ];
        $product->update($data);

        if ($request->file('photo')) {
            if (file_exists('uploads/products/'.$product->photo)) {
                unlink('uploads/products/'.$product->photo);

            }

            $newName = 'product_'.time().'.'.$request->file('photo')->getClientOriginalExtension();
            $request->photo->move('uploads/products/',$newName);
            $product->update(['photo'=>$newName]);
        }

        return redirect()->route('admin.product');
        }catch (\Exception $exception){

            $errors =  $exception->validator->getMessageBag();
            return redirect()->back()->withErrors($errors)->withInput();
        }
    }

    public function delete($id)
    {
        $product= Product::find($id);
        if (file_exists('uploads/products/'.$product->photo)) {
            unlink('uploads/products/'.$product->photo);

        }
        $product->delete();
        return redirect()->back();

//        product::where('id',$id)->delete();
//        return redirect()->route('admin.product');
    }
}
