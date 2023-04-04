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
        $prodtct_info = Product::where('slug', $slug)->firstOrfail();
        $related_product = Product::where('category_id', $prodtct_info->category_id)->where('id', '!=', $prodtct_info->id)->get();

        return view('frontend.single_product_details', [
            'product_info' => $prodtct_info,
            'related_products' => $related_product,
        ]);

    }


}