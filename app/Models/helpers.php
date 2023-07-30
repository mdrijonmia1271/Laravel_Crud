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
function review_count($product_id){
    return App\Models\Order_detail::where('product_id', $product_id)->whereNotNull('review')->count();
}
function averge_stars($product_id){
    $count_review = App\Models\Order_detail::where('product_id', $product_id)->whereNotNull('review')->count();
    $sum_review = App\Models\Order_detail::where('product_id', $product_id)->whereNotNull('review')->sum('stars');
    if($sum_review == 0){
        return 0;
    }else{

        return round($sum_review/$count_review);
    }
}