<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostFactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Post::class, 16)->create();
    }
}
