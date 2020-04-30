<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Category;
use App\Tag;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $category_count = Category::count();
        $tag_count = Tag::count();
        $user_count = User::count();
        $post_count = Post::count();
        $user = User::all();
        $post = Post::orderBy('created_at', 'desc')->take(5)->get();
        return view('home', compact('post','user','post_count','user_count','tag_count','category_count'));  
    }

 }
