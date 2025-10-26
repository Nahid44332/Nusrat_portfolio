<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
     public function setting()
    {
        $setting = SiteSetting::first();
        return view('backend.settings.setting', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = SiteSetting::first() ?? new SiteSetting();

        $setting->title = $request->title;
        $setting->footer_text = $request->footer_text;
        $setting->facebook = $request->facebook;
        $setting->twitter = $request->twitter;
        $setting->instagram = $request->instagram;
        $setting->linkedin = $request->linkedin;
        $setting->email = $request->email;
        $setting->phone = $request->phone;
        $setting->address = $request->address;

        // ✅ Upload favicon
        if ($request->hasFile('favicon')) {
            $faviconName = 'favicon_' . time() . '.' . $request->favicon->extension();
            $request->favicon->move(public_path('uploads/settings'), $faviconName);
            $setting->favicon = 'uploads/settings/' . $faviconName;
        }

        // ✅ Upload logo
        if ($request->hasFile('logo')) {
            $logoName = 'logo_' . time() . '.' . $request->logo->extension();
            $request->logo->move(public_path('uploads/settings'), $logoName);
            $setting->logo = 'uploads/settings/' . $logoName;
        }

        $setting->save();

        return back()->with('success', '✅ Site settings updated successfully!');
    }
}
