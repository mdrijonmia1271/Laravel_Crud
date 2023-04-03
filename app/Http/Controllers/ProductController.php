<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.index', [
            'products' => Product::all(),
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create', [
            'active_categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slug_link = Str::slug($request->product_name."-".Str::random(5));

        $request->validate([
            'category_id' => 'required',
            'product_name' => 'required',
            'product_price' => 'required|numeric',
            'product_quantity' => 'required|numeric',
            'product_alert_quantity' => 'required|numeric',
        ]);
        Product::insert($request->except('_token') + [
            'slug' => $slug_link,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success', 'Successfully Data Inserted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
     //Model route binding-------------------
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit', [
            'active_categories' => Category::all(),
            'product_info' =>$product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->except('_token', '_method'));
        return redirect('product')->with('update', 'Successfully Data Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('delete', 'Successfully Data Deleted!');
    }
}
