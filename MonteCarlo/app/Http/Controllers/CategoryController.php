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
        $messages = [
            'category.required' => 'Pole jest wymagane. Uzupełnij dane.',     
            'price.required' => 'Pole jest wymagane. Uzupełnij dane.',      
        ];

        $request->validate([
            'category' => 'required|string|max:3|unique:courserecords',
            'price' => 'required|numeric|min:0',
        ], $messages);

        $category->price = $request->input('price');
        $category->save();
        return redirect()->route('admin.categories')->with('success', 'Category price updated successfully.');
    }

    public function store(Request $request)
    {
        $messages = [
            'category.required' => 'Pole jest wymagane. Uzupełnij dane.',     
            'price.required' => 'Pole jest wymagane. Uzupełnij dane.',      
        ];

        $request->validate([
            'category' => 'required|string|max:3|unique:courserecords',
            'price' => 'required|numeric|min:0',
        ], $messages);

        $category = new Category;
        $category->category = $request->input('category');
        $category->price = $request->input('price');
        $category->save();
        return redirect()->route('admin.categories')->with('success', 'Category created successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories')->with('success', 'Category deleted successfully.');
    }
}
