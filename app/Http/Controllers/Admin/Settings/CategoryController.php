<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CategoryFolder;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('folder')->get(); 
        $folders = CategoryFolder::all();

        return view('pages.settings.money.categories.index', compact('categories', 'folders'));
    }

    public function create()
    {
        $folders = CategoryFolder::all(); // Barcha folderlarni olish
        return view('pages.settings.money.categories.create', compact('folders'));
    }

    public function store(Request $request)
    {
        // Ma'lumotlarni tekshirish
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'folder_id' => 'required|exists:categories_folder,id',
            'description' => 'nullable|string',
        ]);

        // Yangi kategoriya qo'shish
        Category::create($request->only('name', 'folder_id', 'description'));

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $folders = CategoryFolder::all(); // Barcha folderlarni olish
        return view('pages.settings.money.categories.edit', compact('category', 'folders'));
    }

    public function update(Request $request, $id)
    {
        // Ma'lumotlarni tekshirish
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
            'folder_id' => 'nullable|exists:categories_folder,id',
            'description' => 'nullable|string',
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->only('name', 'folder_id', 'description'));

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }

}
