<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use App\Models\Client;
use App\Models\Slider;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Website;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $category = 0;
        $post = 0;
        $user = 0;
        $slider = 0;
        $partners = 0;
        $service = 0;
        $clients = 0;

        return view('admin.dashboard', compact(['post', 'category', 'user', 'slider','partners','service','clients']));
    }
    public function profile()
    {
        $user = User::find(auth()->user()->id);
        return view('admin.profile', compact('user'));
    }
    public function User_update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'nullable',
            'password' => 'nullable|confirmed'
        ]);
        $user = User::find($id);
        if ($request->image != NULL) {
           
            $user->images = $request->image;
        } else {
            $user->name = $request->name;
            if ($request->password != NULL)
                $user->password = $request->password;
        }
        $user->save();
        return redirect()->back()->with('success', 'Profile Image Updated Successfully');
    }

    public function about()
    {
        $about = DB::table('abouts')->first(); 
        return view('admin.about',compact('about') );
    }

    public function about_update(Request $request)
    {
        $about = DB::table('abouts')->where('id',1)->update([
            'image' => $request->image,
            'title' => $request->title,
            'stitle' => $request->stitle,         
        ]);
        return redirect()->back()->with('success', 'About Updated Successfully');
    }
    
}
