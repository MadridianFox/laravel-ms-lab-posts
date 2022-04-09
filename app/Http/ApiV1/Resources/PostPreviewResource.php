<?php

namespace App\Http\ApiV1\Resources;

use App\Domain\Posts\Models\Post;
use App\Http\ApiV1\Support\Resources\BaseJsonResource;

/**
 * @mixin Post
 */
class PostPreviewResource extends BaseJsonResource
{
    public function toArray($request): array
    {
        return [
            'code' => $this->code,
            'title' => $this->title,
            'author' => $this->author,
            'author_id' => $this->author_id,
            'tags' => TagResource::collection($this->tags),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
