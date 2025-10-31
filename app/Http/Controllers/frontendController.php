<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Message;
use App\Models\Protfolio;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\Skill;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class frontendController extends Controller
{
    public function index()
    {
        $banner = Banner::first();
        $about = About::first();
        $skills = Skill::all();
        $services = Service::all();
        $protfolios = Protfolio::all();
       $blogs = Blog::all();
       $blogs = Blog::all();
      $setting = SiteSetting::first();
        return view('frontend.index', compact('banner', 'about','skills','services','protfolios','blogs','setting'));
    }

     public function contact()
    {
        $about = About::first();
        $setting = SiteSetting::first();

        return view('frontend.contact', compact('about', 'setting'));
    }
    public function contactStore(Request $request)
    {
        $contact = new Message();

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->message = $request->message;

        $contact->save();
        return back()->with('success','Message sent successfull');
    }
   public function portfolioDetails($id)
    {
        $banner = Banner::first();
        $protfolio = Protfolio::findOrFail($id);
        $testimonials = Testimonial::latest()->first();
        return view('frontend.portfolioDetails', compact('protfolio','banner', 'testimonials'));
    }

    public function serviceDetails($id)
{
    $service = Service::findOrFail($id);
    $banner = Banner::first();
    $about = About::first();
    $setting = SiteSetting::first();
    $testimonial = Testimonial::first();

    return view('frontend.serviceDetails', compact('banner', 'about', 'setting', 'service', 'testimonial'));
}
    public function blogDetails()
    {
        $banner = Banner::first();
    $about = About::first();
     $setting = SiteSetting::first();
    return view('frontend.blogDetails', compact('banner', 'about','setting'));
    }
    public function privacy()
    {
        $banner = Banner::first();
    $about = About::first();
     $setting = SiteSetting::first();
        return view('frontend.privacy',compact('banner', 'about','setting'));
    }

    public function starterPage()
    {
        $banner = Banner::first();
    $about = About::first();
     $setting = SiteSetting::first();
        return view('frontend.starter-page',compact('banner', 'about','setting'));
    }
    public function terms()
    {
        $banner = Banner::first();
    $about = About::first();
     $setting = SiteSetting::first();
        return view('frontend.terms',compact('banner', 'about','setting'));
    }
    public function error()
    {
        $banner = Banner::first();
    $about = About::first();
     $setting = SiteSetting::first();
        return view('frontend.404',compact('banner', 'about','setting'));
    }
}
