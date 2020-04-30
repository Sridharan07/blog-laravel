<?php


namespace App\Http\View\Composers;


use Illuminate\View\View;

use App\Setting;
use App\Category;
use App\Post;
use App\Tag;

class BlogComposer
{
	public function compose(View $view){

		$view->with('site_setting', $this->site_setting());
		$view->with('categories', $this->categories());
		$view->with('popular_post', $this->popular_post());
		$view->with('tags', $this->tags());
		$view->with('archives', $this->archives());
		$view->with('meta', $this->meta());

	}
	
	private function site_setting(){
		return Setting::first();
	}

	private function categories(){
		return Category::all();
	}

	private function popular_post(){
		return Post::with('user','category')->where('status', 1)->orderby('view','desc')->take(5)->get();
	}

	private function tags(){
		return Tag::all();
	}

	private function archives()
    {
        $archives = Post::archives();
        return $archives;

    }

    private function meta(){

    	$site_setting = Setting::take(1)->get();
    	$data = array();
        foreach($site_setting as $key => $setting){
        	
        		$data = array(
        			'meta_d' => $setting->meta_description,
        			'meta_r' => $setting->meta_keywords,       			
        		);
            	           
        }
        //dd($data) ;
        return $data;
    }


}

