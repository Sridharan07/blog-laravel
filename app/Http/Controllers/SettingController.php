<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;


class SettingController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function index(){
    	$setting = Setting::first();
    	return view('admin.setting.index', compact('setting'));
    }

    public function update(Request $request, $id){
        
    	$this->validate($request, [
    		'site_name' => 'required|max:255',
    		'contact_number' => 'max:255',
    		'contact_email' => 'email|max:255',
    		'address' => 'max:255',
            'facebook' => 'max:255',
            'twitter' => 'max:255',
            'google' => 'max:255',
            'instagram' => 'max:255',
            'disqus' => 'max:255',
            'gmaps' => 'min:10',
            'about_us' => 'min:10',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'nav_logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'meta_description' => 'max:255',
            'meta_keywords' => 'max:255',
            'google_analystic' => 'min:10',

    	]);

        //dd($request->all());

        $setting = Setting::findorfail($id);

         if($request->hasFile('logo')){
            $this->unlink_image($setting);

            $picture = $request->logo;
            $slug = Str::Slug($picture->getClientOriginalName());
            $new_picture = time().$slug;
            Image::make($picture->getRealPath())->save('photos/shares/thumbnail/' . $new_picture);
       
            $setting->logo = 'photos/shares/thumbnail/'.$new_picture;


        }

        if($request->hasFile('nav_logo')){
            $this->unlink_image1($setting);

            $picture1 = $request->nav_logo;
            $slug1 = Str::Slug($picture1->getClientOriginalName());
            $new_picture1 = time().$slug1;
            Image::make($picture1->getRealPath())->save('photos/shares/thumbnail/' . $new_picture1);

            $setting->nav_logo = 'photos/shares/thumbnail/'.$new_picture1;

        }

    	
    	$setting->site_name = $request->site_name;
    	$setting->contact_number = $request->contact_number;
    	$setting->contact_email = $request->contact_email;
    	$setting->address = $request->address;
        $setting->facebook = $request->facebook;
        $setting->twitter = $request->twitter;
        $setting->google = $request->google;
        $setting->instagram = $request->instagram;
        $setting->disqus = $request->disqus;
        $setting->gmaps = $request->gmaps;
        $setting->about_us = $request->about_us;
        $setting->meta_description = $request->meta_description;
        $setting->meta_keywords = $request->meta_keywords;
        $setting->google_analystic = $request->google_analystic;

    	$setting->save();

    	return redirect()->back()->with('success','Site Settings Successfully Updated');

    }

    private function unlink_image($post){

        if ( file_exists($post->logo) ) unlink($post->logo);


    }

      private function unlink_image1($post){


        if ( file_exists($post->nav_logo) ) unlink($post->nav_logo);

    }
}
