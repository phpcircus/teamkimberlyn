<?php

namespace App\Models;

use App\Models\Traits\Slug\HasSlug;
use App\Models\Traits\Slug\SlugOptions;
use App\Models\Traits\Uuid\HasUuids;
use Illuminate\Support\Str;
use Wink\WinkAuthor;

class News extends Model
{
    use HasSlug, HasUuids;

    /** @var string */
    protected $table = 'news';

    /** @var string */
    protected $primaryKey = 'id';

    /** @var string */
    protected $keyType = 'string';

    /** @var bool */
    public $incrementing = false;

    /** @var array */
    protected $appends = [
        'readable_created_at',
        'excerpt',
    ];

    /**
     * Get the slug options.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    /**
     * Get a human readable version of created_at date.
     */
    public function getReadableCreatedAtAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    /**
     * Get a the excerpt attribute for the post.
     */
    public function getExcerptAttribute(): string
    {
        return Str::limit($this->attributes['body'], 100);
    }

    /**
     * The news author.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(WinkAuthor::class, 'author_id');
    }

    /**
     * Create a news item.
     *
     * @param  string  $title
     * @param  string  $body
     */
    public function createNews(string $title, string $body, string $authorId): self
    {
        return $this->create([
            'title' => $title,
            'body' => $body,
            'author_id' => $authorId,
        ]);
    }
}
