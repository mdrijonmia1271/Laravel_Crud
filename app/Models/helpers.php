<?php

use Illuminate\Support\Facades\Cookie;

function product_total_count(){
    return  App\Models\Product::count();
}
function cart_count(){
    return App\Models\Cart::where('ganerated_cart_id', Cookie::get('g_cart_id'))->count();
}
function cart_items(){
    return App\Models\Cart::where('ganerated_cart_id', Cookie::get('g_cart_id'))->get();
}