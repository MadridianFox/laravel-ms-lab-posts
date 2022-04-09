<?php

namespace App\Domain\Posts\Models;

use App\Domain\Posts\Tests\Factories\PostFactory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $code
 * @property string $title
 * @property string $text
 * @property string $author
 * @property string $author_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Collection|Tag[] $tags
 */
class Post extends Model
{
    public static function factory(): PostFactory
    {
        return PostFactory::new();
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
