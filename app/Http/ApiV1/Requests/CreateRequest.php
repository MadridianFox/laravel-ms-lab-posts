<?php

namespace App\Http\ApiV1\Requests;

use App\Domain\Posts\Models\Post;
use App\Domain\Posts\Models\Tag;
use App\Http\ApiV1\Support\Requests\BaseFormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'code' => ['required', 'string', Rule::unique((new Post())->getTable(), 'code')],
            'title' => ['required', 'string'],
            'author' => ['required', 'string'],
            'author_id' => ['required', 'string'],
            'tags' => ['sometimes', 'array'],
            'tags.*' => ['integer', Rule::exists((new Tag())->getTable(), 'id')],
            'text' => ['required', 'string'],
        ];
    }
}
