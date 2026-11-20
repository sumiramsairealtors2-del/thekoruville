<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'meta_title',
        'meta_description',
        'canonical_url',
        'content',
        'image',
        'category_id',
        'tags',
        'schema',
        'is_published'
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    public static function publishedForWebsite(): Builder
    {
        $post = new static;

        if (config('database.connections.live_blog.database')) {
            $post->setConnection('live_blog');
        }

        return $post->newQuery()->where('is_published', true);
    }

    public function imageUrl(): string
    {
        if ($this->getConnectionName() === 'live_blog') {
            return rtrim(config('database.connections.live_blog.image_base_url'), '/').'/'.ltrim($this->image, '/');
        }

        return asset('storage/'.$this->image);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}