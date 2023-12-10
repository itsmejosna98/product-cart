<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;
use Carbon\Carbon;
use App\Models\ProductDetails;

class CartController extends Controller
{
    public function addCart(Request $request)
    {
        if(Auth::id())
        {
            $price = $request->price;
            $total_price = $price*$request->purchase_quantity;

            if($request->purchase_quantity > $request->available_quantity){
                return redirect('home');
            }

            $cart = new Cart;
            $cart->user_id = Auth::id();
            $cart->product_id = $request->product_id;
            $cart->quantity = $request->purchase_quantity;
            $cart->price = $request->price;
            $cart->total_price = $total_price;
            $cart->save() ;
            return redirect('home');
        }
    }

    public function create()
    {
        $carts = Cart::where('user_id', Auth::id())->with('view_products')->get();
        // dd($carts);
        return view('website.cart')->with(compact('carts'));
    }

    public function placeOrder(Request $request)
    {
        // dd($request->all());
        $test = Auth::user()->delivery_address;
        $time = Carbon::now()->format('Y-m-d');
        $x = $request->count;
        $user_id = Auth::user()->id;

        // dd($x);

        for ($i = 0; $i < $x; $i++) {

            $product_details = ProductDetails::where('product_id',$request->productId[$i])->first();
            $new_quantity = ($product_details->quantity) - ($request->quantity[$i]);
            if($new_quantity <= 0){
                $new_quantity = 0;
            }
        $product_details->quantity = $new_quantity;
        $product_details->save();

            $insertArray = ['user_id' => $user_id,'order_date' => $time,'delivery_address' => $test, 'product_id' => $request->productId[$i], 'price' => $request->price[$i], 'quantity' => $request->quantity[$i],'created_at' => Carbon::now(),'updated_at' => Carbon::now()];
            Order::insert($insertArray);
        }
        $carts= Cart::where('user_id', '=', Auth::id())->delete();
        return redirect('home');
    }
}
