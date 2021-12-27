<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Category::truncate();
        Post::truncate();

        $user = User::factory()->create();

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        $family = Category::create([
            'name' => 'Family',
            'slug' => 'family'
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'Work'
        ]);

        

        Post::create([
            'user_id' => $user->id,
            'category_id' => $family->id,
            'slug' => 'my family post',
            'title' => 'My Family Post',
            'excerpt' => 'family',
            'body' => 'this is body',
        ]);

         Post::create([
            'user_id' => $user->id,
            'category_id' => $family->id,
            'title' => 'hello',
            'slug' => 'my_first_blog',
            'excerpt' => '<p>my excerpt</p>',
            'body' => '<p>hello,i am here</p>'
        ]);
    }
}
