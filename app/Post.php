<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use Sluggable;
	use SoftDeletes;
    

	protected $fillable = [
		'title','slug','content','category_id','picture','user_id','large_size','medium_size','small_size'
	];

    public function category(){
        //important .. after defining the category name then relation, foreign key -> primary key
        return $this->belongsTo('App\Category','category_id','id');
    }

    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }

    public function tags(){
    	return $this->belongsToMany('App\Tag');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public static function archives()
    {
        if (env("DB_CONNECTION") === 'mysql') {
            return static::selectRaw('count(id) as post_count, extract(year from created_at) as year, extract(month from created_at) as month')
                            ->where('status', 1)
                            ->groupBy('year', 'month')
                            ->orderByRaw('min(created_at) desc')
                            ->get();
        }
        else {
            return static::selectRaw('count(id) as post_count, year(created_at) year, month(created_at) month')
                            ->where('status', 1)
                            ->groupBy('year', 'month')
                            ->orderByRaw('min(created_at) desc')
                            ->get();

        }
    }

    public function scopeFilter($query, $filter)
    {
        if (isset($filter['month']) && $month = $filter['month']) {
            if (env('DB_CONNECTION') === 'mysql') {
                $query->whereRaw('extract(month from created_at) = ?', [$month]);
            }
            else {
                $query->whereRaw('month(created_at) = ?', [$month]);
            }
        }

        if (isset($filter['year']) && $year = $filter['year']) {
            if (env('DB_CONNECTION') === 'mysql') {
                $query->whereRaw('extract(year from created_at) = ?', [$year]);
            }
            else {
                $query->whereRaw('year(created_at) = ?', [$year]);
            }
        }

        // check if any term entered
        if (isset($filter['term']) && $term = strtolower($filter['term']))
        {
            $query->where(function($q) use ($term) {
                $q->orWhere('title', 'LIKE', "%{$term}%");
                $q->orWhere('excerpt', 'LIKE', "%{$term}%");
            });
        }
    }   

}
