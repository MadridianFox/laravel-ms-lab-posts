<?php

namespace App\Domain\Posts\Tests\Factories;

use App\Domain\Posts\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    protected $model = Tag::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word(),
        ];
    }
}
