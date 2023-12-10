<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function loginCheck(Request $request)
    {
        $request->validate([
            'username' => 'required|max:200',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email_address' => $request->username, 'password' => $request->password])) {
            if (Auth::user()->user_type == 'Supplier') {
                
                return redirect('dashboard');
            }
            if (Auth::user()->user_type == 'User') {
                return redirect('home');
            }
        } 
        else{
            return redirect('/');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function dashboard()
    {
        $total_products = Product::where('status',1)->count();
        $total_orders = Order::count();
        $orders = Order::with('view_products')->with('view_users')->get();
        // dd($orders);
        return view('dashboard.dashboard')->with(compact('total_products','orders','total_orders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstName'=>'required|max:200',
            'lastName'=>'required',
            'gender'=>'required',
            'phoneNumber'=>'required',
            'deliveryAddress'=>'required',
            'billingAddress'=>'required',
            'emailAddress'=>'email:rfc,dns|required|unique:users,email_address',
            'password'=>'required|min:10',
        ]);
        $user=new User();
        $user->first_name = $request->firstName;
        $user->last_name = $request->lastName;
        $user->gender = $request->gender;
        $user->phone_number = $request->phoneNumber;
        $user->delivery_address = $request->deliveryAddress;
        $user->billing_address = $request->billingAddress;
        $user->email_address = $request->emailAddress;
        $user->password = Hash::make($request->password);
        $user->status = 'Active';
        $user->user_type = 'User';
        $user->save();
        return redirect('/');
    }
}
