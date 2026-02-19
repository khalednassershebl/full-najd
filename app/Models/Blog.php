<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    protected $table = 'blogs';

    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'excerpt',
        'content',
        'image',
        'is_published',
        'published_at',
        'sort_order',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
        'sort_order' => 'integer',
        'views' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Blog $blog) {
            if (empty($blog->slug)) {
                $blog->slug = Str::slug($blog->title);
            }
        });

        static::updating(function (Blog $blog) {
            if ($blog->isDirty('title') && !$blog->isDirty('slug')) {
                $blog->slug = Str::slug($blog->title);
            }
        });
    }

    /**
     * Scope to get only published blogs, ordered by published_at desc then sort_order.
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true)
            ->orderByRaw('COALESCE(published_at, created_at) DESC')
            ->orderBy('sort_order')
            ->orderBy('id');
    }

    public function blogCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

    /**
     * Get categories that have at least one published blog (for front filter).
     */
    public static function publishedCategories()
    {
        return BlogCategory::whereHas('blogs', function ($q) {
            $q->where('is_published', true);
        })->orderBy('sort_order')->orderBy('name')->get();
    }
}
