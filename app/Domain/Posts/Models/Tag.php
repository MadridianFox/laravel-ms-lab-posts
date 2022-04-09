<?php

namespace App\Domain\Posts\Models;

use App\Domain\Posts\Tests\Factories\TagFactory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Collection|Post[] $posts
 */
class Tag extends Model
{
    public static function factory(): TagFactory
    {
        return TagFactory::new();
    }

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }
}
