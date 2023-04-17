<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductMultipleImage;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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
            'products' => Product::with('RelationWithCategoryTable')->get(),
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
        $request->validate([
            'category_id' => 'required',
            'product_name' => 'required',
            'product_price' => 'required|numeric',
            'product_quantity' => 'required|numeric',
            'product_alert_quantity' => 'required|numeric',
        ]);
        $slug_link = Str::slug($request->product_name."-".Str::random(5));
        $product_id = Product::insertGetId($request->except('_token','product_multiple_photo') + [
            'slug' => $slug_link,
            'created_at' => Carbon::now()
        ]);
        if ($request->hasFile('product_thambnail_photo')) {
            $uploaded_photo = $request->file('product_thambnail_photo');
            $new_upload_name = $product_id . "." . $uploaded_photo->getClientOriginalExtension();
            $new_upload_location = 'public/uploads/product_photos/' . $new_upload_name;
            Image::make($uploaded_photo)->resize(600, 622)->save(base_path($new_upload_location), 50);
            Product::find($product_id)->update([
                'product_thambnail_photo' => $new_upload_name,
            ]);
        }
        if($request->hasFile('product_multiple_photo')){
            $flag = 1;
          foreach ($request->file('product_multiple_photo') as $single_photo) {
            $uploaded_photo = $single_photo;
            $new_upload_name = $product_id."-".$flag . "." . $uploaded_photo->getClientOriginalExtension();
            $new_upload_location = 'public/uploads/product_multiple_photos/' . $new_upload_name;
            Image::make($uploaded_photo)->resize(600, 622)->save(base_path($new_upload_location), 50);
            ProductMultipleImage::insert([
                'product_id' => $product_id,
                'prudct_multiple_image_name' => $new_upload_name,
                'created_at' => Carbon::now(),
            ]);
            $flag++;
          }
        }
      
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
