<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

          App\Category::insert([
              ['name_category' => 'News','slug' => 'news','created_at' => date('Y-m-d H:i:s')],
              ['name_category' => 'Article', 'slug' => 'article','created_at' => date('Y-m-d H:i:s')],
              ['name_category' => 'Trending', 'slug' => 'trending','created_at' => date('Y-m-d H:i:s')],
              ['name_category' => 'Health', 'slug' => 'health','created_at' => date('Y-m-d H:i:s')],
              ['name_category' => 'Education', 'slug' => 'education','created_at' => date('Y-m-d H:i:s')]
          ]);
    }
}
