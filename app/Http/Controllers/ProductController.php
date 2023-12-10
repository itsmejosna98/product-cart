<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductDetails;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at','desc')->get();
        return view('dashboard.view-products')->with(compact('products'));
    }

    public function create()
    {
        return view('dashboard.add-products');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product'=>'required',
        ]);
        $product = new Product();
        $product->name = $request->product;
        $product->status = 1;
        $product->save();
        Session::flash('status','added');
        return 1;
    }

    public function edit($id)
    {
        $products=Product::find($id);
        return view('dashboard.edit-product')->with(compact('products','id'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'product'=>'required',
            'hdn_id'=>'required',
        ]);
        $product = Product::find($request->hdn_id);
        $product->name = $request->product;
        $product->status = $request->status;
        $product->save();
        Session::flash('status','updated');
        return 1;
    }

    public function delete($id)
    {
        $products=Product::find($id);
        if ($products) {
            $products->delete();
        }
        return 1;
    }
}
