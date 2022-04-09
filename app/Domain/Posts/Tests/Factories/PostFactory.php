<?php

namespace App\Domain\Posts\Tests\Factories;

use App\Domain\Posts\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            'code' => "post_" . $this->faker->unique()->numberBetween(1, 1000),
            'title' => $this->faker->sentence(),
            'text' => $this->faker->realTextBetween(500, 4000),
            'author' => $this->faker->name(),
            'author_id' => "author_" . $this->faker->numberBetween(1, 50)
        ];
    }
}
