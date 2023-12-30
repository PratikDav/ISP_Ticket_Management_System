<?php

namespace App\Http\Controllers;

use App\Models\SupportCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showCategory()
    {
        $category = SupportCategory::all();
        return view('admin.pages.category.support_category', compact('category'));
    }
    public function addCategory(Request $request)
    {

        $category = new SupportCategory();

        $request->validate([

            'category_name' => 'required',
            'category_type' => 'required',

        ]);

        $category->category = $request->category_name;
        $category->category_type = $request->category_type;
        if ($category->save()) {
            return redirect()->back()->with('success', 'Category Added Successfully!');
        } else {
            return redirect()->back()->with('failed', 'Something Went Wrong!');

        }

    }
    public function deleteCategory($id)
    {
        $category = SupportCategory::where('id', '=', $id);
        if (!is_null($category)) {
            $category->delete();
            return redirect()->back()->with('deleted', 'Deleted Successfully');
        }
        return redirect()->route('show.Category');

    }
}
