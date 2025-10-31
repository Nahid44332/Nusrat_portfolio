<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Protfolio;
use Illuminate\Http\Request;

class ProtfolioController extends Controller
{
      public function protfolio()
    {
        $protfolios = Protfolio::all();
        $categories = Category::all();
        return view('backend.protfolio.protfolio', compact('protfolios', 'categories'));
    }

    // ✅ Store New Protfolio
    public function store(Request $request)
    {
        $filename = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/protfolios'), $filename);
        }

        $protfolio = new Protfolio();
        $protfolio->name = $request->name;
        $protfolio->category_id = $request->category_id;
        $protfolio->tools = $request->tools;
        $protfolio->description = $request->description;
        $protfolio->live_link = $request->live_link;
        $protfolio->github_link = $request->github_link;
        $protfolio->image = $filename;
        $protfolio->client = $request->client;
        $protfolio->date = $request->date;
        $protfolio->duration = $request->duration;
        $protfolio->overview = $request->overview;

    if ($request->has('key_highlights')) {
        $protfolio->key_highlights = json_encode($request->key_highlights);
    }
        $protfolio->save();

        return back()->with('success', 'Protfolio added successfully!');
    }

    // ✅ Edit Protfolio
    public function edit($id)
    {
        $protfolio = Protfolio::findOrFail($id);
        return view('backend.protfolio.edit', compact('protfolio'));
    }

    // ✅ Update Protfolio
    public function update(Request $request, $id)
    {
        $protfolio = Protfolio::findOrFail($id);

        if ($request->hasFile('image')) {
            // delete old file if exists
            if ($protfolio->image && file_exists(public_path('uploads/protfolios/' . $protfolio->image))) {
                unlink(public_path('uploads/protfolios/' . $protfolio->image));
            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/protfolios'), $filename);
            $protfolio->image = $filename;
        }

        $protfolio->name = $request->name;
        $protfolio->category_id = $request->category_id;
        $protfolio->tools = $request->tools;
        $protfolio->description = $request->description;
        $protfolio->live_link = $request->live_link;
        $protfolio->github_link = $request->github_link;
        $protfolio->client = $request->client;
        $protfolio->date = $request->date;
        $protfolio->duration = $request->duration;
        $protfolio->save();

        return redirect()->back()->with('success', 'Protfolio updated successfully!');
    }

    // ✅ Delete Protfolio
    public function destroy($id)
    {
        $protfolio = Protfolio::findOrFail($id);

        if ($protfolio->image && file_exists(public_path('uploads/protfolios/' . $protfolio->image))) {
            unlink(public_path('uploads/protfolios/' . $protfolio->image));
        }

        $protfolio->delete();

        return back()->with('success', 'Protfolio deleted successfully!');
    }
}
