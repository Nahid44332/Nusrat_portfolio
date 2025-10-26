<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogCrontroller extends Controller
{
   public function blog()
    {
        $blogs = Blog::latest()->get();
        $categories = Category::latest()->get();
        return view('backend.blog.blog', compact('blogs', 'categories'));
    }

    public function store(Request $request)
    {
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->category_id = $request->category_id;
        $blog->content = $request->content;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/blog'), $filename);
            $blog->image = $filename;
        }

        $blog->save();
        return back()->with('success', '✅ Blog added successfully!');
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->category_id = $request->category_id;
        $blog->content = $request->content;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/blog'), $filename);
            $blog->image = $filename;
        }

        $blog->save();
        return back()->with('success', '✏️ Blog updated successfully!');
    }

    public function delete($id)
    {
        $blog = Blog::findOrFail($id);
        if($blog->image && file_exists(public_path('uploads/blog/'.$blog->image))){
            unlink(public_path('uploads/blog/'.$blog->image));
        }
        $blog->delete();
        return back()->with('success', '🗑 Blog deleted!');
    }
}
