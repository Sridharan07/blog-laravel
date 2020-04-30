<?php

use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         App\Tag::insert([
              ['tag' => 'Sport','slug' => 'sport'],
              ['tag' => 'Magazine','slug' => 'magazine'],
              ['tag' => 'Travel','slug' => 'travel'],
              ['tag' => 'Health','slug' => 'health'],
              ['tag' => 'Other','slug' => 'other']
          ]);
    }
}
