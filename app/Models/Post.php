<?php

namespace App\Models;

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
    protected $fillable = ['title', 'description', 'content', 'category_id'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

}
