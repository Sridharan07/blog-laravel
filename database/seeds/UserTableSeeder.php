<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
        	'name' => 'admin',
        	'email' => 'admin@admin.com',
        	'password' => bcrypt('admin'),
            'slug' => 'Sridhar',
            'admin' => 1
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'about' => 'bla bla bla',
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.com',
            'avatar' => 'public/uploads/posts/1571153467cc.png'
        ]);
    }
}
