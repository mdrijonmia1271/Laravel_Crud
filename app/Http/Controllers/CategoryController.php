<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryForm;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    //

    public function index()
    {
        return view('admin/category.index', [
            'categories' => Category::all(),
            'deleted_categories' => Category::onlyTrashed()->get()
        ]);
    }

    public function addIndex(){
        return view('admin/category.create');
    }

    //Add Category Function-----------
    public function create(CategoryForm $request)
    {
        $category_id = Category::insertGetId([
            'category_name' => $request->category_name,
            'category_description' => $request->category_description,
            'user_id' => Auth::id(),
            'created_at' => Carbon::now(),
        ]);
        if ($request->hasFile('category_photo')) {
            $uploaded_photo = $request->file('category_photo');
            $new_upload_name = $category_id . "." . $uploaded_photo->getClientOriginalExtension();
            $new_upload_location = 'public/uploads/category_photos/' . $new_upload_name;
            Image::make($uploaded_photo)->resize(200, 200)->save(base_path($new_upload_location), 50);
            Category::find($category_id)->update([
                'category_photo' => $new_upload_name,
            ]);
        }
        return back()->with('success', $request->category_name . ' Category Successfully Added!');
    }

    public function delete($id)
    {
        Category::find($id)->delete();
        return back()->with('delete', 'Successfully Data Deleted!');
    }
    public function deletedCategory()
    {
        return view('admin/category/Delete_data',[
            'deleted_categories' => Category::onlyTrashed()->get()
        ]);
    }

    public function edit($id)
    {
        return view('admin/category/edit', [
            'categories' => Category::find($id)
        ]);
    }
    public function update(Request $request)
    {
        $request->validate([
            'category_name' => 'unique:categories,category_name,' . $request->category_id
        ]);
        Category::find($request->category_id)->update([
            'category_name' => $request->category_name,
            'category_description' => $request->category_description,
        ]);
        return redirect('category/index')->with('update', 'Successfully Data Updated!');
        ;
    }
    public function restore($id)
    {
        Category::withTrashed()->find($id)->restore();
        return back()->with('restore', 'Successfully Data Restore!');
    }
    public function forceDelete($id)
    {
        Category::withTrashed()->find($id)->forceDelete();
        return back()->with('forceDelete', 'Successfully Data Permanently Deleted!');
    }
    public function markDelete(Request $request)
    {
        if (isset($request->category_id)) {
            foreach ($request->category_id as $cate_id) {
                Category::find($cate_id)->delete();
            }
        }
        return back()->with('delete', 'Successfully Data Deleted!');
    }
    public function markRestore(Request $request)
    {
        if (isset($request->delete_category_id)) {
            if ($request['Restore_All']) {
                Category::withTrashed()->whereIn('id', $request->delete_category_id)->restore();
                return back()->with('restore', 'Successfully Data Restore!');
            }
            if ($request['Delete_All']) {
                Category::withTrashed()->whereIn('id', $request->delete_category_id)->forceDelete();
                return back()->with('forceDelete', 'Successfully Data Permanently Deleted!');
            }
        }
        return back();
        // dd($request);
    }

}