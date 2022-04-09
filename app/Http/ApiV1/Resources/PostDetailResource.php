<?php

namespace App\Http\ApiV1\Resources;

use App\Domain\Posts\Models\Post;
use App\Http\ApiV1\Support\Resources\BaseJsonResource;

/**
 * @mixin Post
 */
class PostDetailResource extends BaseJsonResource
{
    public function toArray($request): array
    {
        return array_merge(PostPreviewResource::make($this->resource)->toArray($request), [
            'text' => $this->text,
        ]);
    }
}
