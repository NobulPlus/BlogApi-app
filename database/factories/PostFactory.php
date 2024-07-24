<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'blog_id' => Blog::factory(), // Create a new Blog and use its id
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
        ];
    }
}
