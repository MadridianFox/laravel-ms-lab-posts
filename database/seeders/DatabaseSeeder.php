<?php

namespace Database\Seeders;

use App\Domain\Posts\Models\Post;
use App\Domain\Posts\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        /** @var Collection|Tag[] $tags */
        $tags = Tag::factory()
            ->count(50)
            ->create();

        for($i = 0; $i < 1000; $i++) {
            /** @var Post $post */
            $post = Post::factory()->create();
            /** @var Collection|Tag[] $postTags */
            $postTags = $tags->shuffle()->take(random_int(1, 5));

            $post->tags()->sync($postTags->pluck('id')->all());
        }
    }
}
