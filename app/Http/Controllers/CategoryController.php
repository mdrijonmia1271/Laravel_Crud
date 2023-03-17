<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryForm;

class CategoryController extends Controller
{
    //

    public function index(){
        return view('category.index');
    }

    public function addCategory(CategoryForm $request){
        echo "Category Name : ".$request->category_name."</br>";
        echo "Category Description : ".$request->category_description;
    }
}
