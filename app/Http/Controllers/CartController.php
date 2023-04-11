<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public function index($coupon_name = "")
    {
        $error_message = "";
        $discount_amount = 0;
        if ($coupon_name == "") {
            $error_message = "";
        } else {
            if (!Coupon::where('coupon_name', $coupon_name)->exists()) {
                $error_message = "This coupon you have provided does not match";
            } else {
                if (Carbon::now()->format('Y-m-d') > Coupon::where('coupon_name', $coupon_name)->first()->validity_till) {
                    $error_message = "This coupon has been expired";
                } else {
                    $sub_total = 0;
                    foreach (cart_items() as $cart_item) {
                        echo $sub_total += ($cart_item->product_quantity * $cart_item->product->product_price);
                    }
                    if (Coupon::where('coupon_name', $coupon_name)->first()->minimum_purchase_amount > $sub_total) {
                        $error_message = "You have to shop more than or equal " . Coupon::where('coupon_name', $coupon_name)->first()->minimum_purchase_amount;
                    } else {
                        echo "Good";
                        $discount_amount = Coupon::where('coupon_name', $coupon_name)->first()->discount_amount;
                    }

                }
            }
        }
        $valid_coupons = Coupon::where('validity_till', '>=', Carbon::now()->format('Y-m-d'))->get();
        return view('frontend.cart', compact('error_message', 'discount_amount', 'coupon_name','valid_coupons'));

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

    public function remove($cart_id)
    {
        Cart::find($cart_id)->delete();
        return back()->with('remove', 'Product Removed From Cart!');
    }
    public function update(Request $request)
    {
        foreach ($request->product_info as $cart_id => $product_quantity) {
            Cart::find($cart_id)->update([
                'product_quantity' => $product_quantity,
            ]);
        }
        return back()->with('update', 'Product Updated!');
    }
}