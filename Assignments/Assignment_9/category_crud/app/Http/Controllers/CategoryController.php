<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('category.index', compact('category'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {;

        Category::create([
            'name' => $request->name,
            'desc' => $request->desc,
        ]);

        return redirect()->route('category.index');
    }

    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        
        $category->update([
            'name' => $request->name,
            'desc' => $request->desc,
        ]);

        return redirect()->route('category.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index');
    }
}
