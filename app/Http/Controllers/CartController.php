<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class CartController extends Controller
{

    public function index(){
        return view('frontend.cart');
    }

    public function store(Request $request)
    {
        if (Cookie::get('g_cart_id')) {
            $ganerated_cart_id = Cookie::get('g_cart_id');
        } else {
            $ganerated_cart_id = Str::random(7) . rand(1, 1000);
            Cookie::queue('g_cart_id', $ganerated_cart_id, 1440);
        }
        if (Cart::where('ganerated_cart_id', $ganerated_cart_id)->where('product_id', $request->product_id, )->exists()) {
            Cart::where('ganerated_cart_id', $ganerated_cart_id)->where('product_id', $request->product_id, )->increment('product_quantity', $request->product_quantity);
        } else {
            Cart::insert([
                'ganerated_cart_id' => $ganerated_cart_id,
                'product_id' => $request->product_id,
                'product_quantity' => $request->product_quantity,
                'created_at' => Carbon::now(),
            ]);
        }
        return back();
    }

    public function remove($cart_id){
        Cart::find($cart_id)->delete();
        return back()->with('remove', 'Product Removed From Cart!');
    }
    public function update(Request $request){
       foreach ($request->product_info as $cart_id => $product_quantity) {
        Cart::find($cart_id)->update([
            'product_quantity' => $product_quantity,
        ]);
       }
       return back()->with('update', 'Product Updated!');
    }
}