<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $fillable = ['tag','slug'];

    public function post(){
    	return $this->belongsToMany('App\Post');
    }

    public function getRouteKeyName()
	{
		//Model binding for filtering tag variables sent in the URL in the table tag slug column
	   return 'slug';
	}
}
