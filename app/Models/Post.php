<?php

namespace App\Models;

use App\Enums\PostStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static insert(array $array)
 * @method static where(string $string, string $string1, $id)
 * @method static create(mixed $validated)
 */
class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'content', 'category_id', 'status', 'user_id'];

    protected $casts = [
        'status' => PostStatusEnum::class,
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /** @noinspection PhpUnused */
    public function scopePublished($query): void
    {
        $query->where('status', PostStatusEnum::PUBLISHED->value);
    }

}
