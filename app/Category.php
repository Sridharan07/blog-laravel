<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

	protected $table = 'categories';

    public function posts(){
    	//This category has many posts
    	return $this->hasMany('App\Post');
    }

    public function getRouteKeyName()
	{
		//Model binding to filter category variables sent in the URL in the category table slug column
	   return 'slug';
	}


}
