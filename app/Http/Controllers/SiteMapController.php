<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class SiteMapController extends Controller
{
    public function index()
	{
	  $post = Post::orderBy('updated_at', 'DESC')->first();
	  $category = Category::orderBy('updated_at', 'DESC')->first();

	  return response()->view('sitemap.index', [
	    'post' => $post,
	    'category' => $category
	  ])->header('Content-Type', 'text/xml');
	}

	public function posts()
	{
	  $posts = Post::all();
	  return response()->view('sitemap.posts', [
	    'posts' => $posts,
	  ])->header('Content-Type', 'text/xml');
	}

	public function categories()
	{
	  $categories = Category::all();
	  return response()->view('sitemap.categories', [
	    'categories' => $categories,
	  ])->header('Content-Type', 'text/xml');
	}
}
