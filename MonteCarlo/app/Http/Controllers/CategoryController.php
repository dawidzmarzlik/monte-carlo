<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories', compact('categories'));
    }

    public function update(Request $request, Category $category)
    {
        $category->price = $request->input('price');
        $category->save();
        return redirect()->route('admin.categories')->with('success', 'Category price updated successfully.');
    }
}
