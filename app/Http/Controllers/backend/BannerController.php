<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function banner()
    {
        $banner = Banner::first(); // শুধুমাত্র একটাই ব্যানার ধরে নিলাম
        return view('backend.banner.banner', compact('banner'));
    }

    // Update Banner
    public function update(Request $request)
    {
        $banner = Banner::first();

        if (!$banner) {
            $banner = new Banner();
        }

        $banner->title = $request->title;
        $banner->subtitle = $request->subtitle;
        $banner->button_text = $request->button_text;
        $banner->button_link = $request->button_link;
        $banner->facebook = $request->facebook;
        $banner->instagram = $request->instagram;
        $banner->twitter = $request->twitter;
        $banner->linkedin = $request->linkedin;

        // Image Upload
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('backend/images/banner/'), $filename);
            $banner->image = $filename;
        }

        $banner->save();

        return back()->with('success', '💾 Banner updated successfully!');
    }
}
