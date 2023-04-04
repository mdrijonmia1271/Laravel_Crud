<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use Carbon\Carbon;
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
    public function contact()
    {
        return view('frontend.contact');
    }
    public function contactInsert(Request $request)
    {
        $contact_id = Contact::insertGetId($request->except('_token') + [
            'created_at' => Carbon::now(),
        ]);
        if ($request->hasFile('contact_attachment')) {
            // $uploaded_path = $request->file('contact_attachment')->store('contact_uploads');
            $path = $request->file('contact_attachment')->storeAs('contact_uploads', $contact_id . "." . $request->file('contact_attachment')->getClientOriginalExtension());
            Contact::find($contact_id)->update([
                'contact_attachment' => $path
            ]);
        }
        return back()->with('success', 'We Received Your Message!');
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