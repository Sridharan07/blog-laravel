<?php

namespace App\Http\Controllers;
use App\Setting;
use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class BlogController extends Controller
{
    protected $limit = 5;

    public function index(){
        
        $site_setting = Setting::take(1)->get();
        $og_meta = array();
        foreach($site_setting as $key => $setting){
            
                $og_meta = array(
                    'og_title' => $setting->site_name,
                    'og_description' => $setting->meta_description,
                    'og_image' => asset($setting->logo),
                    'og_url' => url('')                
                );
                           
        }

        $post_first =  Post::where('status','1')->with('user','category')->latest()->first();
        $post_second = Post::where('status','1')->with('user','category')->latest()->skip(1)->take(2)->get();
        $post_third = Post::where('status','1')->with('user','category')->latest()->skip(3)->take(4)->get();
        $post_fourth = Post::where('status','1')->with('user','category')->latest()->skip(8)->take(6)->get();

        $post = Post::where('status','1')->get();
    	return view('blog.index', compact('post','post_first','post_second','post_third','post_fourth','og_meta'));   
         	
    }

    public function isi_blog($slug){

        $post = Post::where('status','1')->with('user','category','tags')->where('slug', $slug)->firstOrFail();

        $og_meta = array();
        
        $content = strip_tags($post->content);
        $og_meta = array(
            'og_title' => $post->title,
            'og_description' => Str::limit($content , 150),
            'og_image' => asset($post->picture),
            'og_url' => url($post->slug)                
        );                         
        
        $blogKey = 'blog_' . $post->id;

        if (!Session::has($blogKey)) {
            $post->increment('view');
            Session::put($blogKey,1);
        }

        return view('blog.isi_blog', compact('post','og_meta'));
    }

    
    public function list_category(Category $category){
        //retrieve the name of the category already blocked 
        $title = 'CATEGORY : '.$category->name_category;
        //Using a binding model getRouteKeyName()
        $posts = $category->posts()->with('user','category')->where('status','1')->latest()->paginate(5);

        $og_meta = array();
        $og_meta = array(
            'og_title' => $category->name_category,
            'og_description' => $category->name_category,
            'og_image' => '',
            'og_url' => url('category/'.$category->slug)                
        );
                           
       
        //send post and title data
        return view('blog.list_all', compact('posts','title','og_meta'));
    }

    public function list_tag(Tag $tag){

        //take the name of the tag that has been valued
        $title = 'TAG : '.$tag->tag;
        //Using a binding model getRouteKeyName()
        $posts = $tag->post()->with('user','category')->where('status','1')->latest()->paginate(5);

        $og_meta = array();
        $og_meta = array(
            'og_title' => $tag->tag,
            'og_description' => $tag->tag,
            'og_image' => '',
            'og_url' => url('tag/'.$tag->slug)                
        );

        return view('blog.list_all', compact('posts','title','og_meta'));
    }

    public function list_blog(){
        $title = 'POST';
        $posts = Post::with('user','category')->where('status','1')->filter(request()->only(['term', 'year', 'month']))->latest()->paginate($this->limit);

        $og_meta = array();
        $og_meta = array(
            'og_title' => 'list post',
            'og_description' => 'list post',
            'og_image' => '',
            'og_url' => url('list/post')                
        );

        return view('blog.list_all', compact('posts','title','og_meta'));
    }

     public function list_author(User $user){
        $title = 'AUTHOR : '.$user->name;

        $posts = $user->post()->with('category')->where('status','1')->latest()->paginate(5);

        $og_meta = array();
        $og_meta = array(
            'og_title' => 'list post of'.$user->name,
            'og_description' => 'list post'.$user->name,
            'og_image' => '',
            'og_url' => url('author/'.$user->slug)                
        );

        return view('blog.list_all', compact('posts','title','og_meta'));
    }

    public function search_blog(Request $request){
        //dd($request->all());
        $title = 'RESULT : '.$request->search;
        $posts = Post::with('user','category')->where('title', $request->search)->orWhere('title', 'like', '%' . $request->search . '%')->where('status','1')->paginate($this->limit);

        $og_meta = array();
        $og_meta = array(
            'og_title' => 'list post',
            'og_description' => 'list post',
            'og_image' => '',
            'og_url' => url('list/post')                
        );

        return view('blog.list_all', compact('posts','title','og_meta'));
    }

    public function contact_us(){
        $og_meta = array();
        $og_meta = array(
            'og_title' => 'Contact Us',
            'og_description' => 'Contact Us',
            'og_image' => '',
            'og_url' => url('contact/us')                
        );

        return view('blog.contact_us',compact('og_meta'));
    }

    public function about_us(){
        $og_meta = array();
        $og_meta = array(
            'og_title' => 'About Us',
            'og_description' => 'About Us',
            'og_image' => '',
            'og_url' => url('about/us')                
        );

        return view('blog.about_us',compact('og_meta'));
    }

}
