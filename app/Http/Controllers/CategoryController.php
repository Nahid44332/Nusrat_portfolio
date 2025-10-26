<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function category()
    {
        $categories = Category::latest()->get();
        $tags = Tag::latest()->get();

        return view('backend.category.category', compact('categories', 'tags'));
    }

    // -------- CATEGORY CRUD ----------
    public function storeCategory(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->description = $request->description;
        $category->save();

        return back()->with('success', '✅ Category added successfully!');
    }

    public function updateCategory(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->description = $request->description;
        $category->save();

        return back()->with('success', '✏️ Category updated successfully!');
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return back()->with('success', '🗑 Category deleted!');
    }

    // -------- TAG CRUD ----------
    public function storeTag(Request $request)
    {
        $tag = new Tag();
        $tag->name = $request->name;
        $tag->slug = Str::slug($request->name);
        $tag->save();

        return back()->with('success', '✅ Tag added successfully!');
    }

    public function updateTag(Request $request, $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->name = $request->name;
        $tag->slug = Str::slug($request->name);
        $tag->save();

        return back()->with('success', '✏️ Tag updated successfully!');
    }

    public function deleteTag($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        return back()->with('success', '🗑 Tag deleted!');
    }
}
