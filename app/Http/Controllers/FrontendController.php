<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

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

        return view('frontend.single_product_details', [
            'product_info' => $product_info,
            'related_products' => $related_product,
        ]);

    }

    public function shop(){
        return view('frontend.shop',[
            'categories' => Category::all(),
            'products' => Product::all(),
        ]);
    }


}