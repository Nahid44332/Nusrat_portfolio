<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
 public function testimonial()
    {
        $testimonials = Testimonial::latest()->get();
        return view('backend.testimonial.testimonial', compact('testimonials'));
    }

    // Store testimonial
    public function store(Request $request)
    {
        $testimonial = new Testimonial();
        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->message = $request->message;

        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/testimonials'), $filename);
            $testimonial->photo = $filename;
        }

        $testimonial->save();
        return back()->with('success', '✅ Testimonial added!');
    }

    // Update testimonial
    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->message = $request->message;

        if($request->hasFile('photo')){
            // Delete old photo if exists
            if($testimonial->photo && file_exists(public_path('uploads/testimonials/'.$testimonial->photo))){
                unlink(public_path('uploads/testimonials/'.$testimonial->photo));
            }
            $file = $request->file('photo');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/testimonials'), $filename);
            $testimonial->photo = $filename;
        }

        $testimonial->save();
        return back()->with('success', '✏️ Testimonial updated!');
    }

    // Delete testimonial
    public function delete($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        if($testimonial->photo && file_exists(public_path('uploads/testimonials/'.$testimonial->photo))){
            unlink(public_path('uploads/testimonials/'.$testimonial->photo));
        }
        $testimonial->delete();
        return back()->with('success', '🗑 Testimonial deleted!');
    }
}
