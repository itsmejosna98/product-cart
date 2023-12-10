<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductDetails;
use Illuminate\Support\Facades\Session;

class ProductDetailsController extends Controller
{
    public function index()
    {
        $products = ProductDetails::with('view_products')->orderBy('created_at','desc')->get();
        return view('dashboard.view-product-details')->with(compact('products'));
    }
    public function create()
    {
        $allCategories = Product::get();
        return view('dashboard.add-product-details')->with(compact('allCategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg|max:512',
        ]);
        $current_quantity = ProductDetails::where('product_id',intval($request->product_id))->first();
        if($current_quantity){
            Session::flash('status','exists');
            return 1;
        }
        // $new_quantity = $current_quantity->quantity + $request->quantity;
        // if($new_quantity <=0){
        //     $new_quantity =0;
        // }
        $product=new ProductDetails();
        $product->product_id = intval($request->product_id);
        $product->price = $request->price;
        $product->quantity =  $request->quantity;
        $product->status = 1;
        $product->image = 0;
        $product->save();

        if($request->image)
        {
            $image=$request->file('image');
            $image_name='product_'.$product->id.'_image'.$image->getClientOriginalExtension();
            $destination_path=public_path('/product_image/');
            $image->move($destination_path,$image_name);
            $product->image="/product_image/".$image_name;
            $product->save();
            $last_insert_id = $product->id;
        }
        Session::flash('status','added');
        return 1;
    }

    public function edit($id)
    {
        // dd($id);
        $allCategories = Product::get();
        $product=ProductDetails::find($id);
        return view('dashboard.edit-product-details')->with(compact('product','id','allCategories'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'product_id'=>'required',
            'hdn_id'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'image'=>'required',
        ]);
        $current_quantity = ProductDetails::where('id','!=',intval($request->hdn_id))->where('product_id',intval($request->product_id))->first();
        if($current_quantity){
            Session::flash('status','exists');
            return 1;
        }
        // $new_quantity = $current_quantity->quantity + $request->quantity;
        // if($new_quantity <=0){
        //     $new_quantity =0;
        // }
        $product= ProductDetails::find($request->hdn_id);
        $product->product_id = intval($request->product_id);
        $product->price = $request->price;
        $product->quantity =  $request->quantity;
        $product->status = $request->status;
        $product->image = 0;
        $product->save();

        if ($request->hasFile('image'))
        {
            $image=$request->file('image');
            $image_name='product_'.$product->id.'_image'.$image->getClientOriginalExtension();
            $destination_path=public_path('/product_image/');
            $image->move($destination_path,$image_name);
            $product->image="/product_image/".$image_name;
            $product->save();
            $last_insert_id = $product->id;
        }
        else{
            $product->image=$request->image;
            $product->save();
        }
        Session::flash('status','updated');
        return 1;
    }

    public function delete($id)
    {
        $products=ProductDetails::find($id);
        if ($products) {
            $products->delete();
        }
        return 1;
    }
}
