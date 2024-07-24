<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Blog;
use App\Models\Post;;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        User::factory(1)->create();

        Blog::factory(10)->create()->each(function ($blog) {
            $blog->posts()->createMany(Post::factory(5)->make()->toArray());
        });
    }
}
