<?php

namespace App\Domain\Posts\Actions;

use App\Domain\Posts\Models\Post;
use DB;

class CreatePostAction
{
    public function execute(array $data): Post
    {
        return DB::transaction(function () use ($data) {
            $tags = $data['tags'];
            unset($data['tags']);

            $post = new Post();
            $post->fill($data);
            $post->save();

            foreach ($tags as $tagId) {
                $post->tags()->attach($tagId);
            }

            return $post;
        });
    }
}
