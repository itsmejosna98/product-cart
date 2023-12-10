<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductDetails;
use Illuminate\Support\Facades\Auth;

class WebsiteController extends Controller
{
    public function index(){
        $products = ProductDetails::leftJoin('products','product_details.product_id','products.id')
        ->orderBy('product_details.created_at','desc')
        ->select(
            'products.id',
            'product_details.image',
            'product_details.price',
            'product_details.quantity',
            'products.created_at',
            'products.name as product_name'
        )
        ->get();
        return view('website.home',compact('products'));
    }

    public function view($id){
        $product=ProductDetails::leftJoin('products','product_details.product_id','products.id')
        ->where('products.id',$id)
        ->select(
            'products.id',
            'product_details.image',
            'product_details.price',
            'product_details.quantity',
            'products.created_at',
            'products.name as product_name'
        )
        ->first();
        return view('website.view-product-details')->with(compact('product'));
    
    }
}
