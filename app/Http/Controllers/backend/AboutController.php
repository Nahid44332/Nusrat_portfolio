<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Skill;
use Illuminate\Http\Request;

class AboutController extends Controller
{

    public function about()
{
    $about = About::first();
    $skills = Skill::all(); 
    return view('backend.about.about', compact('about', 'skills'));
}

 
    public function update(Request $request)
    {
        $about = About::first() ?? new About();

   
        $about->name = $request->name;
        $about->role = $request->role;
        $about->experience = $request->experience;
        $about->degree = $request->degree;
        $about->location = $request->location;
        $about->email = $request->email;
        $about->phone = $request->phone;
        $about->availability = $request->availability;
        $about->biography = $request->biography;

        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');

            if ($about->profile_picture && file_exists(public_path('backend/images/about/' . $about->profile_picture))) {
                unlink(public_path('backend/images/about/' . $about->profile_picture));
            }

            $imageName = rand() . '-about.' . $image->extension();
            $image->move(public_path('backend/images/about/'), $imageName);
            $about->profile_picture = $imageName;
        }


        if ($request->hasFile('cv_file')) {
            $cv = $request->file('cv_file');

            if ($about->cv_link && file_exists(public_path('backend/files/cv/' . $about->cv_link))) {
                unlink(public_path('backend/files/cv/' . $about->cv_link));
            }

            $cvName = rand() . '-cv.' . $cv->extension();
            $cv->move(public_path('backend/files/cv/'), $cvName);
            $about->cv_link = $cvName;
        }

        $about->save();

        return back()->with('success', 'About section updated successfully!');
    }


   public function storeSkill(Request $request)
{
    if ($request->has('skills')) {
        foreach ($request->skills as $skillData) {
            if (!empty($skillData['name'])) {
                \App\Models\Skill::updateOrCreate(
                    ['name' => $skillData['name']],
                    ['progress' => $skillData['progress'] ?? 0]
                );
            }
        }
    }
    return back()->with('success', 'Skills updated successfully!');
}



    public function deleteSkill($id)
    {
        $skill = Skill::findOrFail($id);
        $skill->delete();

        return back()->with('success', 'Skill deleted successfully!');
    }
}