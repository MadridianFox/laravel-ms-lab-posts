<?php

namespace App\Http\ApiV1\Resources;

use App\Domain\Posts\Models\Tag;
use App\Http\ApiV1\Support\Resources\BaseJsonResource;

/**
 * @mixin Tag
 */
class TagResource extends BaseJsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
