<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'parent_id' => 'nullable|exists:categories,id',
            'name' => 'required|string|max:255|unique:categories',
        ]);

        $category = Category::create([
            'parent_id' => $validated['parent_id'],
            'user_id' => Auth::user()->id,
            'name' => $validated['name'],
        ]);

        return redirect()->route('dashboard')->with('sucess', 'Categoria cadastrada');
    }

    public function show(string $id)
    {
        $category = Category::where('id', $id)->first();

        return view('categories.show', compact('category'));
    }

    public function edit(string $id)
    {
        $categories = Category::getExcludingParentAndChildren($id);

        $category = Category::where('id', $id)->first();

        return view('categories.edit', compact('categories', 'category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        $category->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('dashboard')->with('success', 'Alterações realizadas');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('dashboard')->with('success', 'Categoria deletada');
    }
}
