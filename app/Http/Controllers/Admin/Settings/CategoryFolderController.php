<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryFolder;

class CategoryFolderController extends Controller
{
    public function index()
    {
        $folders = CategoryFolder::all();
        return view('pages.settings.money.categoriesFolder.index', compact('folders'));
    }

    public function create()
    {
        return view('pages.settings.money.categoriesFolder.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'folder_name' => 'required|string|max:255|unique:categories_folder,folder_name',
            'description' => 'nullable|string',
        ]);

        CategoryFolder::create($request->only('folder_name', 'description'));
        
        return redirect()->back()->with('success', 'Folder created successfully!');

        return redirect()->route('category-folders.index')->with('success', 'Category Folder created successfully.');
    }

    public function edit($id)
    {
        $folder = CategoryFolder::findOrFail($id);
        return view('pages.settings.money.categoriesFolder.edit', compact('folder'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'folder_name' => 'required|string|max:255|unique:categories_folder,folder_name,' . $id,
            'description' => 'nullable|string',
        ]);

        $folder = CategoryFolder::findOrFail($id);
        $folder->update($request->only('folder_name', 'description'));

        return redirect()->route('category-folders.index')->with('success', 'Category Folder updated successfully.');
    }

    public function destroy($id)
    {
        $folder = CategoryFolder::findOrFail($id);
        $folder->delete();

        return redirect()->route('category-folders.index')->with('success', 'Category Folder deleted successfully.');
    }
}
