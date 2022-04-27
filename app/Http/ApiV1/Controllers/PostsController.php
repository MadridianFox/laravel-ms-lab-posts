<?php

namespace App\Http\ApiV1\Controllers;

use App\Domain\Posts\Actions\CreatePostAction;
use App\Domain\Posts\Models\Post;
use App\Http\ApiV1\Requests\CreateRequest;
use App\Http\ApiV1\Resources\PostDetailResource;
use App\Http\ApiV1\Resources\PostPreviewResource;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;

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

    public function create(CreateRequest $request, CreatePostAction $action): JsonResponse
    {
        $post = $action->execute($request->validated());

        return response()->json([
            'data' => [
                'id' => $post->id,
            ]
        ]);
    }
}
