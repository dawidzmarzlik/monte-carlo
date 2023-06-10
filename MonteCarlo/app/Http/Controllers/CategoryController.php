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
        $name = "price".$category->id;

        $messages = [   
            "{$name}.required" => 'Pole jest wymagane.',     
        ];

        $request->validate([
            $name => 'required|numeric|min:0',
        ], $messages);

        if($request->input($name) == $category->price)
            return redirect()->route('admin.categories')->with('success_update', "Nie zmieniono ceny kategorii {$category->category}. Cena pozostała taka sama.");

        $category->price = $request->input($name);
        $category->save();
        return redirect()->route('admin.categories')->with('success_update', "Cena kategorii {$category->category} została zmieniona.");
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
        return redirect()->route('admin.categories')->with('success_add', "Kategoria {$category->category} została dodana.");
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories')->with('success_delete', "Kategoria {$category->category} została usunięta.");
    }
}
