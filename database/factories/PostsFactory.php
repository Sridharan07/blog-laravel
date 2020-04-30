<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
	$title = $faker->sentence;
	$slug = Str::slug($title, '-');
    $users = App\User::pluck('id')->toArray();
    $category = App\Category::pluck('id')->toArray();
    return [
        'title' => $title,
        'slug' => $slug,
        'content' => $faker->paragraph(60),
        'user_id' => $faker->randomElement($users),

        'category_id' => $faker->randomElement($category),
        'picture' => $faker->randomElement([
                'image_factory/thumbnail_demo1.jpg',
                'image_factory/thumbnail_demo2.jpg',
                'image_factory/thumbnail_demo3.jpg',
                'image_factory/thumbnail_demo4.jpg',
                'image_factory/thumbnail_demo5.jpg',
                'image_factory/thumbnail_demo6.jpg',
                'image_factory/thumbnail_demo7.jpg',
                'image_factory/thumbnail_demo8.jpg',
                'image_factory/thumbnail_demo9.jpg',
                'image_factory/thumbnail_demo10.jpg',

            ]),
        'large_size' => $faker->randomElement([
                'image_factory/large_size/thumbnail_demo1.jpg',
                'image_factory/large_size/thumbnail_demo2.jpg',
                'image_factory/large_size/thumbnail_demo3.jpg',
                'image_factory/large_size/thumbnail_demo4.jpg',
                'image_factory/large_size/thumbnail_demo5.jpg',
                'image_factory/large_size/thumbnail_demo6.jpg',
                'image_factory/large_size/thumbnail_demo7.jpg',
                'image_factory/large_size/thumbnail_demo8.jpg',
                'image_factory/large_size/thumbnail_demo9.jpg',
                'image_factory/large_size/thumbnail_demo10.jpg',

            ]),
        'medium_size' => $faker->randomElement([
                'image_factory/medium_size/thumbnail_demo1.jpg',
                'image_factory/medium_size/thumbnail_demo2.jpg',
                'image_factory/medium_size/thumbnail_demo3.jpg',
                'image_factory/medium_size/thumbnail_demo4.jpg',
                'image_factory/medium_size/thumbnail_demo5.jpg',
                'image_factory/medium_size/thumbnail_demo6.jpg',
                'image_factory/medium_size/thumbnail_demo7.jpg',
                'image_factory/medium_size/thumbnail_demo8.jpg',
                'image_factory/medium_size/thumbnail_demo9.jpg',
                'image_factory/medium_size/thumbnail_demo10.jpg',

            ]),
        'small_size' => $faker->randomElement([
                'image_factory/small_size/thumbnail_demo1.jpg',
                'image_factory/small_size/thumbnail_demo2.jpg',
                'image_factory/small_size/thumbnail_demo3.jpg',
                'image_factory/small_size/thumbnail_demo4.jpg',
                'image_factory/small_size/thumbnail_demo5.jpg',
                'image_factory/small_size/thumbnail_demo6.jpg',
                'image_factory/small_size/thumbnail_demo7.jpg',
                'image_factory/small_size/thumbnail_demo8.jpg',
                'image_factory/small_size/thumbnail_demo9.jpg',
                'image_factory/small_size/thumbnail_demo10.jpg',

            ]),
        'view' => 0
 
    ];
});
