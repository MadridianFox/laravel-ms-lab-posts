<?php

namespace App\Http\ApiV1\Controllers;

use App\Domain\Posts\Models\Post;
use App\Http\ApiV1\Resources\PostDetailResource;
use App\Http\ApiV1\Resources\PostPreviewResource;
use Illuminate\Contracts\Support\Responsable;

class PostsController
{
    public function list(): Responsable
    {
        $posts = Post::query()
            ->with('tags')
            ->get();

        return PostPreviewResource::collection($posts);
    }

    public function detail(string $code): Responsable
    {
        /** @var Post $post */
        $post = Post::query()
            ->where('code', $code)
            ->with('tags')
            ->firstOrFail();

        return PostDetailResource::make($post);
    }
}
