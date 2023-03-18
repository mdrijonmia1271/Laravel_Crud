<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryForm;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    //

    public function index(){
        return view('category.index',[
            'categories' => Category::all()
        ]);
    }

    public function create(CategoryForm $request){
        // echo Auth::user()->email;
        // echo Auth::id();
        Category::insert([
            'category_name' => $request->category_name,
            'category_description' => $request->category_description,
            'user_id' => Auth::id(),
            'created_at' => Carbon::now(),
        ]);
        return back()->with('success',$request->category_name.' Category Successfully Added!');
    }
    public function delete($id){
        Category::find($id)->delete();
        return back()->with('delete','Successfully Data Deleted!');
    }
   
}
