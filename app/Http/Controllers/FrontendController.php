<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order_detail;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index', [
            'active_categories' => Category::all(),
            'active_products' => Product::latest()->get(),
        ]);
    }
   
    public function productDetails($slug)
    {
        $product_info = Product::where('slug', $slug)->firstOrfail();
        $related_product = Product::where('category_id', $product_info->category_id)->where('id', '!=', $product_info->id)->limit(4)->get();

        $show_review_form = 0;
        if(Order_detail::where('user_id', Auth::id())->where('product_id', $product_info->id)->whereNull('review')->exists()){
            $order_details_id = Order_detail::where('user_id', Auth::id())->where('product_id', $product_info->id)->whereNull('review')->first()->id;
            $show_review_form = 1;
        }else{
            $order_details_id = 0;
            $show_review_form = 2;
        }
        $reviews = Order_detail::where('product_id', $product_info->id)->whereNotNull('review')->get();
        return view('frontend.single_product_details', [
            'product_info' => $product_info,
            'related_products' => $related_product,
            'show_review_form' => $show_review_form,
            'order_details_id' => $order_details_id,
            'reviews' => $reviews 
        ]); 

    }

    public function shop(){
        return view('frontend.shop',[
            'categories' => Category::all(),
            'products' => Product::all(),
        ]);
    }

    public function customerRegister(){
        return view('frontend.customerRegister');
    }
    public function customerRegisterPost(Request $request){
        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 2,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
        ]);
        if(Auth::attempt(['email' =>$request->email, 'password' => $request->password ])){
            return redirect('customer/home');
        }
        return back();
    }


    public function reviewPost(Request $request){
        Order_detail::find($request->order_details_id)->update([
            'stars' => $request->stars,
            'review' => $request->review,
        ]);
        return back();
    }


}