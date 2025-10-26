<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Experence;
use App\Models\Experience;
use Illuminate\Http\Request;
use SebastianBergmann\Exporter\Exporter;

class EduExpController extends Controller
{
    public function education()
    {
        $educations = Education::latest()->get();
        $experiences = Experience::latest()->get();
        return view('backend.education.education', compact('educations', 'experiences'));
    }

    // 🏫 Education CRUD
    public function storeEducation(Request $request)
    {
        $edu = new Education();
        $edu->degree = $request->degree;
        $edu->institution = $request->institution;
        $edu->year = $request->year;
        $edu->description = $request->description;
        $edu->save();

        return back()->with('success', '✅ Education added!');
    }

    public function updateEducation(Request $request, $id)
    {
        $edu = Education::findOrFail($id);
        $edu->degree = $request->degree;
        $edu->institution = $request->institution;
        $edu->year = $request->year;
        $edu->description = $request->description;
        $edu->save();

        return back()->with('success', '✏️ Education updated!');
    }

    public function deleteEducation($id)
    {
        $edu = Education::findOrFail($id);
        $edu->delete();

        return back()->with('success', '🗑 Education deleted!');
    }

    // 💼 Experience CRUD
    public function storeExperience(Request $request)
    {
        $exp = new Experience();
        $exp->title = $request->title;
        $exp->company = $request->company;
        $exp->year = $request->year;
        $exp->description = $request->description;
        $exp->save();

        return back()->with('success', '✅ Experience added!');
    }

    public function updateExperience(Request $request, $id)
    {
        $exp = Experience::findOrFail($id);
        $exp->title = $request->title;
        $exp->company = $request->company;
        $exp->year = $request->year;
        $exp->description = $request->description;
        $exp->save();

        return back()->with('success', '✏️ Experience updated!');
    }

    public function deleteExperience($id)
    {
        $exp = Experience::findOrFail($id);
        $exp->delete();

        return back()->with('success', '🗑 Experience deleted!');
    }
}
